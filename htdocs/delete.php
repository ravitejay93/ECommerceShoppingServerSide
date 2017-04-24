<?php
require "conn.php";

$id="2";//$_POST['id'];//similar to the post variable in java";

$result = mysqli_query($localhost,"Delete from address_user where personal_id = ".$id."" )or die(mysqli_error($localhost));

$q = "DELETE FROM ecommerce.order_user WHERE customer_id = ".$id."";

$result1= mysqli_query($localhost,$q)or die(mysqli_error($localhost));

$result2= mysqli_query($localhost,"delete from cart where cart_customer_id=".$id."")or die(mysqli_error($localhost));

$result4= mysqli_query($localhost,"delete from customer where customer_id=".$id."")or die(mysqli_error($localhost));

$result3= mysqli_query($localhost,"delete from user where user_id=".$id."")or die(mysqli_error($localhost));
  
 if($result==true && $result1==true && $result2==true && $result3==true && $result4==true)
 {
	$response["success"] = 1;
     // echoing JSON response
    echo json_encode($response);
 }
 else
 {
	$response["success"] = 0;
     // echoing JSON response
    echo json_encode($response);
}
  
  ?>