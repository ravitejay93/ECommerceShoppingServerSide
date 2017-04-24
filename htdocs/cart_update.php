<?php
require "conn.php";

$cust_id=$_POST["customer_id"];
$product_id=$_POST["product_id"];
$quantity_item=$_POST["quantity"];
$result_query = mysqli_query($localhost,"update cart set quantity_item=$quantity_item where cart_product_id=$product_id and cart_customer_id=$cust_id ")or die(mysqli_error($localhost));

if ($result_query ==true )
{
$response["success"] = 1;
$response["data"]="Successfully updated";
$response['quantity'] = $product_id;
echo json_encode($response);
}
 else
 {
$response["success"]=0;
$response["data"]="not updated";
  //echo "sucnotcessfull";
  echo json_encode($response);

 }