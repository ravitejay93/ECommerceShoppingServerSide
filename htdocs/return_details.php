<?php 
require "conn.php";
$order = $_POST['order'];
$product = $_POST['product'];

$result_order_quant = mysqli_query($localhost,"select * from order_user where order_id ='$order' " )or die(mysqli_error());
$result = mysqli_query($localhost,"select * from return_user where order_id ='$order'" )or die(mysqli_error());
$result_user = mysqli_query($localhost,"select * from order_user where order_id ='$order'" )or die(mysqli_error());

$row_user = mysqli_fetch_array($result_order_quant);
$order_details = mysqli_fetch_array($result_user);
$sql = "UPDATE order_quantity set order_quantity.return = '1' , order_quantity.status = '0' where order_id ='$order' and product_id = '$product'";
$result_query = mysqli_query($localhost,$sql)or die(mysqli_error($localhost));
if($result_query == TRUE){
	$response['data']="Return status updated Successfully...!!!";
	$response['success'] = 1;
	
	echo json_encode($response);
}
else{
	$response['data']="return status update failed....!!!!";
	$response['success'] = 0;
	
	echo json_encode($response);
}
   
$shipper = $row_user['shipper_id'];
$user = $order_details['customer_id'];

if($row = mysqli_fetch_array($result) < 1){
	
	$sql_insert = "INSERT INTO return_user (order_id, shipper_id,user_id) VALUES ('$order','$shipper',$user)";
	$result_query1 = mysqli_query($localhost,$sql_insert)or die(mysqli_error($localhost));
	if($result_query1 ==TRUE){
		$response['data']="Return status updated Successfully...!!!";
		$response['success'] = 1;		
        echo json_encode($response);
	}
    else{
		
		$response['data']="INSERT FAILED...TRy Again..!!!";
		$response['success'] = 0;		
        echo json_encode($response);
	}
}
?>
   