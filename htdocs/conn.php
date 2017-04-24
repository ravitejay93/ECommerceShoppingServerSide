<?php
$hostname_localhost ="localhost";
$database_localhost ="ecommerce";
$username_localhost ="root";
$password_localhost ="rithwik11";
$localhost = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost);
mysqli_select_db($localhost,$database_localhost);
if($localhost){
//echo "Connection Established";
}
else{
//echo "Connection not Established";
}
?>