<?php
require "conn.php";

$id =$_POST['cid'];//similar to the post variable in java";
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$result_query1 = mysqli_query($localhost,"update customer set first_name='$fname' , last_name='$lname' , phone='$phone' , email='$email'  where customer_id= '$id' ")or die(mysqli_error($localhost));
$result_query2 = mysqli_query($localhost,"update user set email='$email'  where user_id= '$id'" )or die(mysqli_error($localhost));

if ($result_query1==true && $result_query2==true)
{
$response["success"] = 1;
$response["message"]="Successfully updated";
//echo "successfull";
}
 else
 {
$response["success"]=0;
$response["message"]="not updated";
  //echo "sucnotcessfull";

 }
   

?>