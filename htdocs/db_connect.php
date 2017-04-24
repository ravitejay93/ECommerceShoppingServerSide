<?php
$hostname_localhost ="localhost";
$database_localhost ="test";
$username_localhost ="root";
$password_localhost ="rithwik11";
$localhost = mysqli_connect("127.0.0.1",$username_localhost,$password_localhost)
or
trigger_error(mysql_error(),E_USER_ERROR);
mysqli_select_db($localhost,$database_localhost);

$query_search = "SELECT * FROM user";
//echo $query_search;
$query_exec = mysqli_query($localhost,$query_search) or die(mysqli_error($localhost));
$rows = mysqli_num_rows($query_exec);
//echo $rows;
if($rows == 0)
 { 
echo "No Such User Found"; 
}
else  {
echo "User Found"; 
}
$query_search = "INSERT INTO user(iduser,user_name,user_pass,first_name,last_name) VALUES (6,'f','456','a','b')";
$query_exec = mysqli_query($localhost,$query_search) or die(mysqli_error($localhost));
?>
