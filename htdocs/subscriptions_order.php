<?php 
require "conn.php";

$frequency = $_POST["frequency"];
$sid = $_POST["sid"];

$result_update = mysqli_query($localhost,"UPDATE subscriptions set frequency = '$frequency' where sid = '$sid'")or die(mysqli_error($localhost));

 if ($result_update == true) {
	$response["data"] = "Updated Frequency";    
	$response["success"] = 1;
	echo json_encode($response);
	
    // echoing JSON response
        
       
} else {
	
	$response["data"] = "Subscription Error";
	$response["success"] = 0;
	echo json_encode($response);
}