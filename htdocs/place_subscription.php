<?php 
require "conn.php";

$address_id = $_POST["aid"];
$frequency = $_POST["frequency"];
$cust_id = $_POST["uid"];

$datetime = new DateTime();
$date_add = "+".$frequency." months";
$datetime->modify($date_add);
$date = $datetime->format('Y-m-d H:i:s');
$result_add = mysqli_query($localhost,"INSERT INTO subscriptions(address_id,next_order_date,frequency,user_id) VALUES('$address_id','$date','$frequency','$cust_id') ")or die(mysqli_error($localhost));
$result2 = mysqli_query($localhost,"select  * from subscriptions where user_id = '$cust_id' order by creationdate desc" )or die(mysqli_error($localhost));
$row_order= mysqli_fetch_array($result2); 
$order_id=$row_order['sid'];
echo $order_id;

$cart_items = mysqli_query($localhost,"select * from cart where cart_customer_id = '$cust_id'" )or die(mysqli_error($localhost));
if (mysqli_num_rows($cart_items) > 0) {
    while ($row = mysqli_fetch_array($cart_items)) {
        
    $cart_productid = $row["cart_product_id"];
    $quantity = $row["quantity_item"];
    echo $cart_productid;
    echo $quantity;
    $result3 = mysqli_query($localhost,"insert into subscription_quantity (sub_id,product_id,quantity) values('$order_id','$cart_productid', '$quantity');")or die(mysqli_error($localhost));
 
    }
}
     	               
// delete the cart items 
$delete=mysqli_query($localhost,"delete from cart where cart_customer_id='$cust_id'") or die(mysqli_error());
   
if($result_add){
	$response["data"] = "You Have Subscribed";
	$response["success"] = 1;
	echo json_encode($response);
}
else{
	$response["data"] = "Subscription Error";
	$response["success"] = 0;
	echo json_encode($response);
}
