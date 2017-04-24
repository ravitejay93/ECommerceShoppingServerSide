<?php
$product_id=$_POST["product_id"];
$cust_id=$_POST["customer_id"];
$cart_quantity=$_POST["number"];


require "conn.php";

$qry = mysqli_query($localhost,"select quantity from product where product_id = '$product_id'" )or die(mysqli_error());
$quantity = mysqli_fetch_array($qry);
$product_quantity=$quantity['quantity'];

if($cart_quantity<$product_quantity)
{

	$sql = "INSERT INTO cart(cart_product_id,cart_customer_id,quantity_item)
	VALUES ('$product_id','$cust_id','$cart_quantity')";
 
	$result_query = mysqli_query($localhost,$sql)or die(mysqli_error($localhost));

	if ($result_query ==true )
	{
		$updatequantity = mysqli_query($localhost,"update product set quantity=quantity-$cart_quantity where product_id='$product_id'" )or die(mysqli_error());

		$response["success"] = 1;
		$response["data"]="Successfully registered";
		//echo "successfull";
	}
	else
	{
		$response["success"]=0;
		$response["data"]="not registered";
		//echo "sucnotcessfull";
	}
}
else
{
	$response["success"]=0;
	$response["data"]="quantity not sufficient";
	//echo "sucnotcessfull";
}
?>