<?php
require "conn.php";

$sub_id = $_POST["sid"];

$result = mysqli_query($localhost,"select * from subscription_quantity where sub_id = '$sub_id'")or die(mysqli_error($localhost));

if (mysqli_num_rows($result) > 0 )
{
	$response['data']=array();
	while($row = mysqli_fetch_array($result)){
		$order = array();
		$query_name = mysqli_query($localhost,"select * from ecommerce.product where product_id = '".$row['product_id']."'" )or die(mysqli_error());
		$order['product_id'] = $row['product_id'];
		$row_info = mysqli_fetch_array($query_name);
		$order['status'] = "none";
		$order['product_name'] = $row_info['product_name'];
		$order['quantity'] = $row['quantity'];
		array_push($response['data'],$order);
	}
	$response["success"] = 1;
	
	echo json_encode($response);
}
else
{
	$response["success"]=0;
	$response["data"]="not updated";
	//echo "sucnotcessfull";
	echo json_encode($response);

}