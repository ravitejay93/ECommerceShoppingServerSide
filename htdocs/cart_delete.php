<?php 
require "conn.php";
$cust_id=$_POST["customer_id"];
$product_id=$_POST["product_id"];


$resultcart = mysqli_query($localhost,"select quantity_item from cart where cart_customer_id = '$cust_id' and cart_product_id= '$product_id'" )or die(mysqli_error($localhost));
$cart_quantity = mysqli_fetch_array($resultcart);
$cartquantity=$cart_quantity['quantity_item'];
   

$result = mysqli_query($localhost,"delete from cart where cart_customer_id = '$cust_id' and cart_product_id= '$product_id'" )or die(mysqli_error());
$updatequantity = mysqli_query($localhost,"update product set quantity=quantity+$cartquantity where product_id='$product_id'" )or die(mysqli_error());

if ($result==true)
{
  $response["success"]=1;
  $response["data"]="Items are deleted";
  echo json_encode($response);  
}

else{
   $response["success"]=0;
   $response["data"]="Items are not deleted";
   echo json_encode($response);
}
    
?>