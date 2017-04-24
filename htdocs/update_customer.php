<?php
require "conn.php";

$customer_id=$_POST['cid'];//similar to the post variable in java";

$result_query = mysqli_query($localhost,"select * from user where user_id=".$customer_id."" )or die(mysql_error());
$result_query2=mysqli_query($localhost,"select * from customer where customer_id=".$customer_id."" )or die(mysql_error());
$result_query3=mysqli_query($localhost,"select * from address_user where personal_id=".$customer_id."" )or die(mysql_error());

 if ( mysqli_num_rows($result_query2) > 0 && mysqli_num_rows($result_query) > 0 && mysqli_num_rows($result_query3) > 0) {
	$response["data"] = array();

	$row = mysqli_fetch_array($result_query);
	$row2 = mysqli_fetch_array($result_query2);
	$row3 = mysqli_fetch_array($result_query3);
	// temp user array
	$result = array();
	$result["username"] = $row["username"];
	$result["password"] = $row["password"];
	$result["email"] = $row["email"];
	$result["first_name"] = $row2["first_name"];
	$result["last_name"] = $row2["last_name"];
	$result["phone"] = $row2["phone"];
	$result["address"] = $row3["address"];
	$result["zip"] = $row3["zip"];
	
	array_push($response["data"], $result);  
        
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);

	
}else {
    // no products found
    $response["success"] = 0;
    echo json_encode($response);
}

?>
