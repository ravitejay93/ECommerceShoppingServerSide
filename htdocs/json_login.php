<?php
require "conn.php";

/*$username="ravi";//$_POST['cid'];//similar to the post variable in java";
$password="123";//$_POST['pwd'];*/

$username= $_POST['user_name'];//similar to the post variable in java";
$password= $_POST['password'];


$result = mysqli_query($localhost,"select * from user where username='$username' and password='$password'" )or die(mysqli_error($localhost));

 if (mysqli_num_rows($result) > 0) {
	$response["data"] = array();
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $user = array();
        $user = $row;
        array_push($response["data"], $user);
    }
 
     // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
	$response["data"] = "User not regitered";
    echo json_encode($response);
}

?>
