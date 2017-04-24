
<?php 
$sname=$_GET["uname"];
$pwd=$_GET["psw"];

require "conn.php";
$result = mysqli_query($localhost,"select  shipper_id from shipper where username='$sname' and password='$pwd'" )or die(mysqli_error());
 if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result) ;
    $id=$row['shipper_id'];
  //echo $id;
 // echo "Succefully logged in ";
   header("Location:index.php?id=$id");
    }
    else
    {
      $response["success"] = 0;
$response["message"]="No such Shipper exists ";
    }
 ?> 