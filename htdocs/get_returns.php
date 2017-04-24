<?php
require "conn.php";

$cust_id= $_POST["customer_id"];
$result = mysqli_query($localhost,"select  * from return_user where user_id = '$cust_id'" )or die(mysqli_error($localhost));


if (mysqli_num_rows($result) > 0 )
{
	$response['data']=array();
	while($row = mysqli_fetch_array($result)){
		$order = array();
		$order['return_id'] = $row['return_id'];
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