<?php
require "conn.php";

$id =$_POST['cid'];//similar to the post variable in java";
$address=$_POST['address'];

$result_query1 = mysqli_query($localhost,"update address_user set address='$address' where personal_id=$id ")or die(mysqli_error($localhost));

if ($result_query1==true )
{
$response["success"] = 1;
$response["message"]="Successfully updated";
echo "successfull";
}
 else
 {
$response["success"]=0;
$response["message"]="not updated";
  //echo "sucnotcessfull";

 }
