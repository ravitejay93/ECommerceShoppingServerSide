<?php 
require "conn.php";
$customer_id=$_POST["cid"];
$address = $_POST["address"];
$zip = $_POST["zip"];

$result = mysqli_query($localhost,"INSERT INTO address_user(personal_id,address,zip) VALUES('$customer_id','$address','$zip')");

 if ($result == true) {
	 
	$response["data"] = "Address Updated";    
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);    
       
} else {
    
	$response["data"] = "Error occured";
    $response["success"] = 0;
    echo json_encode($response);
}