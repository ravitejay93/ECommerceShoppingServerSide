<?php
require "conn.php";

$cust_id= $_POST["uid"];
$result = mysqli_query($localhost,"select  * from subscriptions where user_id = '$cust_id'" )or die(mysqli_error());

if (mysqli_num_rows($result) > 0 )
{
	$response['data']=array();
	while($row = mysqli_fetch_array($result)){
		$order = array();
		$order['order_id'] = $row['sid'];
		$order_id = $row['sid'];
		$order['frequency'] = $row['frequency'];
		$order_details = mysqli_query($localhost,"select * from order_user where order_id = '$order_id'")or die(mysqli_error($localhost));
		$row_order = mysqli_fetch_array($order_details);
		$order['status'] = "none";
		$order['price'] = $row_order['price'];
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