<?php 
require "conn.php";
$address_id=$_POST["aid"];
$user_id = $_POST["cid"];
$result = mysqli_query($localhost,"delete from address_user where address_id =".$address_id." and personal_id = ".$user_id."");

 if ($result == true) {
	 
	$response["data"] = "Address Deleted";    
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);    
       
} else {
    
	$response["data"] = "Error occured";
    $response["success"] = 0;
    echo json_encode($response);
}