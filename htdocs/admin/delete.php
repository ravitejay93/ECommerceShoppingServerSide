<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="thankyou.html" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="index.html" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    <li>
                        <a href="customer_details.php"><i class="fa fa-table "></i>Customer Details </a>
                    </li>
                    <li>
                        <a href="product_details.php"><i class="fa fa-edit "></i>Product details</a>
                    </li>
<li>
                        <a href="subcriptions.php"><i class="fa fa-edit "></i>Subscriptions</a>
                    </li>

                    <li>
                        <a href="shipper_details.php"><i class="fa fa-qrcode "></i>Shipper details</a>
                    </li>
                    <li>
                        <a href="order_details.php"><i class="fa fa-qrcode"> </i>Orders and shipping details</i></a>
                    </li>
                     <li>
                        <a href="return_orders.php"><i class="fa fa-qrcode"></i> Return orders </i></a>
                    </li>
                   <li>
                        <a href="assign_shipper.html"><i class="fa fa-edit "></i>ZIP Table</a>
                    </li>

                     <li>
                    <a href="enter_product.html"><i class="fa fa-qrcode"></i> Enter Products </i></a>
                     </li> 
                       <li>
                    <a href="shipper_register.html"><i class="fa fa-qrcode"> </i>Enter Shipper Details </i></a>
                     </li>                                                                              </div>
                     </ul>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>  Customer Delete </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
        <?php
require "conn.php";

$id=$_GET['id'];//similar to the post variable in java";

$result = mysqli_query($localhost,"Delete from address_user where personal_id = ".$id."" )or die(mysqli_error($localhost));

$q = "DELETE FROM ecommerce.order_user WHERE customer_id = ".$id."";

$result1= mysqli_query($localhost,$q)or die(mysqli_error($localhost));

$result2= mysqli_query($localhost,"delete from cart where cart_customer_id=".$id."")or die(mysqli_error($localhost));

 
$result6= mysqli_query($localhost,"delete from order_user where customer_id=".$id."")or die(mysqli_error($localhost));
$result7= mysqli_query($localhost,"delete from return_user where user_id=".$id."")or die(mysqli_error($localhost));
 
$result5= mysqli_query($localhost,"delete from address_user where personal_id=".$id."")or die(mysqli_error($localhost));
$result4= mysqli_query($localhost,"delete from customer where customer_id=".$id."")or die(mysqli_error($localhost));

$result3= mysqli_query($localhost,"delete from user where user_id=".$id."")or die(mysqli_error($localhost));
$result8= mysqli_query($localhost,"delete from subscriptions where user_id=".$id."")or die(mysqli_error($localhost));

  
  if($result==true && $result1==true && $result2==true && $result3==true && $result4==true)
 {
	$response["success"] = 1;
     // echoing JSON response
   // echo json_encode($response);
	echo "Successful";
 }
 else
 {
	$response["success"] = 0;
     // echoing JSON response
   // echo json_encode($response);
	echo " Not Successful";
}
  
  ?>
                        </div>
                    </div>
                    </div>
        
                     
                  </div>
              </div>
                 <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                                  </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
