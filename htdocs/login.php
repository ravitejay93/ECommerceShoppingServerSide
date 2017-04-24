<?php
require "conn.php";
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];
$query = "select * from user_credentials where user_name like '$user_name' and user_pass like '$user_pass';";
//$query = "SELECT * FROM user";

$result = mysqli_query($localhost,$query);
$rows = mysqli_num_rows($result);
//echo $rows;
if( $rows > 0){
	echo "login success";
}
else{
	echo "login not success";
}
?>