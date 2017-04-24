<?php 
require "conn.php";
$cust_id=$_POST["customer_id"];
$result = mysqli_query($localhost,"select  * from cart where cart_customer_id = '$cust_id'" )or die(mysqli_error());

$response['data']=array();
 if (mysqli_num_rows($result) > 0) {
      
      while ($row = mysqli_fetch_array($result)) {
         $cart = array();
         $cart["cart_product_id"] = $row["cart_product_id"];
         $temp = $cart["cart_product_id"];
         $result1 = mysqli_query($localhost,"select  * from product where product_id = '$temp'" )or die(mysqli_error());
         $row1 = mysqli_fetch_array($result1);
         $cart["product_name"] = $row1["product_name"];
         $cart["unitprice"] = $row1["unitprice"];
         $cart["quantity_item"] = $row["quantity_item"];
         array_push($response['data'], $cart);
         }
         
         $response["success"]=1;
         
         echo json_encode($response);
 }

else{
   $response["success"]=0;
   $response["data"]="No items in the cart for the given Customer";
  echo json_encode($response);
 }
 

    
?>