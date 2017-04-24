
<?php

/*
* Following code will create a new product row
* All product details are read from HTTP Post Request
*/

//array for JSON response
//echo $query_search;
//echo $rows;
require "conn.php";


// check for required fields
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['phone'])&& isset($_POST['address'])&& isset($_POST['zip'])&& isset($_POST['user_name']))
{
	$customer_id;
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$username = $_POST['user_name'];
	$pwd = $_POST['password'];
	$zip = $_POST['zip'];

/*
$customer_id;
$first_name = "ravi teja";
$last_name = "yaramaneni";
$phone= 2162750246;
$email = "rxy160030@utdallas.edu";
$address ="Texas";
$username = "ravi";
$pwd = "456";
$zip = 75252;*/
//$zip_int = intval($zip);
//$phone_int = intval($phone);

//handle already existing user name

	$check_user_name = mysqli_query($localhost,"SELECT * from user where username='$username' or email='$email'");
	if(mysqli_num_rows($check_user_name) == 0){

		$result = mysqli_query($localhost,"INSERT INTO user(username,email,password) VALUES('$username','$email', '$pwd')");

		$get_customer_id = mysqli_query($localhost,"select * from user where username='$username'" )or die(mysqli_error($localhost));
		$row = mysqli_fetch_array($get_customer_id);
		$customer_id = $row["user_id"];

		$result1 = mysqli_query($localhost, "INSERT INTO customer(customer_id,first_name,last_name,email,phone) VALUES('$customer_id','$first_name', '$last_name','$email','$phone')");

		$result2 = mysqli_query($localhost,"INSERT INTO address_user(personal_id,address,zip) VALUES('$customer_id','$address','$zip')");

		// check if row inserted or not
		if ($result==true && $result1==true && $result2==true) {
			// successfully inserted into database
			$response["success"] = 1;
			$response["data"] = array();
			$user = array();
			$user["user_id"] = $customer_id;
			array_push($response["data"],$user);

			// echoing JSON response
			echo json_encode($response);
		} else {
			// failed to insert row
			$response["success"] = 0;
			$response["data"] = "Error occurred while creation";

			// echoing JSON response
			echo json_encode($response);
		}
	}
	else{
		$response["success"] = 0;
		$response["data"] = "User already exists";

		// echoing JSON response
		echo json_encode($response);
	}


} else {
	// required field is missing
	$response["success"] = 0;
	$response["data"] = "Required field(s) is missing";

	// echoing JSON response
	echo json_encode($response);
}
?>