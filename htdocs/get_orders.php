<?php
require "conn.php";

$cust_id=$_POST["customer_id"];
$result = mysqli_query($localhost,"select  * from order_user where customer_id = '$cust_id' order by create_time desc" )or die(mysqli_error());

if (mysqli_num_rows($result) > 0 )
{
	$response['data']=array();
	while($row = mysqli_fetch_array($result)){
		$order = array();
		$order['order_id'] = $row['order_id'];
		$order['status'] = $row['status'];
		$order['price'] = $row['price'];
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