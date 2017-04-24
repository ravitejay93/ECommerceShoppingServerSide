<?php
require "conn.php";
$user_name = 1;
//$user_pass = $_POST["user_pass"];
$query = "select * from user_products where product_user='$user_name';";
//$query = "SELECT * FROM user";

$result = mysqli_query($localhost,$query);
$rows = mysqli_num_rows($result);

if( $rows > 0){
	//echo "login success";
	for($i = 0; $i < $rows;$i++){
		$row = mysqli_fetch_array($result);
		echo $row['product_name'];
		echo "$";
	}
}
else{
	//echo "login not success";
}
?>