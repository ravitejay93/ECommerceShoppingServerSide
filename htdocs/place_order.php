<?php
require "conn.php";
$cust_id=$_POST["cust_id"];
$address_id=$_POST["address_id"];
$price = $_POST["price"];
$status="0";
$status1="-1";

        //zip selection         
$resultzip=mysqli_query($localhost,"select * from address_user where address_id='$address_id' " )or die(mysqli_error());
$rowzip=mysqli_fetch_array($resultzip);
$zip=$rowzip['zip'];
 
        //assigning the shipper
 
$resultz = mysqli_query($localhost,"select  * from zip_table " )or die(mysqli_error());
while ($row1 = mysqli_fetch_array($resultz)) {
	$max=$row1['zip_number_max'];
        
	$min=$row1['zip_number_min'];
        
	if($zip>=$min && $zip<=$max)
	{
		$shipper_id=$row1['shipper_id'];
	}
}
 
      //order creation   
$create_order = mysqli_query($localhost,"INSERT INTO order_user(customer_id,status,shipper_id,address_id,price)
    VALUES('$cust_id','$status1', '$shipper_id','$address_id','$price')");
$result2 = mysqli_query($localhost,"select  * from order_user where customer_id = '$cust_id'
        order by create_time desc" )or die(mysqli_error());
$row_order= mysqli_fetch_array($result2); 
$order_id=$row_order['order_id'];
echo $order_id;
     
        //populating itmes of cart into order_quantity   
$cart_items = mysqli_query($localhost,"select * from cart where cart_customer_id = '$cust_id'" )or die(mysqli_error());
         
if (mysqli_num_rows($cart_items) > 0) {
    while ($row = mysqli_fetch_array($cart_items)) {
         
		$cart_productid = $row["cart_product_id"];
		$quantity = $row["quantity_item"];
        $return=0;
        echo $cart_productid;
        echo $quantity;
        echo $status;
        $result3 = mysqli_query($localhost,"insert into order_quantity (order_id,product_id,quantity,`return`,status) values('$order_id','$cart_productid', '$quantity','$return','$status1');");
 
    }
}
     	               
      // delete the cart items 
$delete=mysqli_query($localhost,"delete from cart where cart_customer_id='$cust_id'") or die(mysqli_error());
      
       
      
    