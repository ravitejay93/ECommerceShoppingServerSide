<?php
require "conn.php";
$user_name = 1;
//$user_pass = $_POST["user_pass"];
$query = "select * from user_products where product_user='$user_name';";
//$query = "SELECT * FROM user";

$result = mysqli_query($localhost,$query);
$rows = mysqli_num_rows($result);

if( $result){
	//echo "login success";
	while($row = mysqli_fetch_array($result)){
		$flag[] = $row; 
	}
	print(json_encode($flag));
}
else{
	//echo "login not success";
}
?>