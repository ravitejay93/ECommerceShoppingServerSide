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
                        <a href="shipper_details.php"><i class="fa fa-qrcode "></i>Shipper details</a>
                    </li>
                    <li>
                        <a href="order_details.php"><i class="fa fa-qrcode"></i> Orders and shipping details</i></a>
                    </li>
                     <li>
                        <a href="return_orders.php"><i class="fa fa-qrcode"></i> Return orders </i></a>
                    </li>
<li>
                        <a href="assign_shipper.html"><i class="fa fa-edit "></i>ZIP Table</a>
                    </li>
                   <li>
                    <a href="subscriptions.php"><i class="fa fa-qrcode"></i> Subcriptions </i></a>
                     </li>
                     <li>
                    <a href="enter_product.html"><i class="fa fa-qrcode"></i> Enter Products </i></a>
                     </li>
                       <li>
                    <a href="shipper_register.html"><i class="fa fa-qrcode"></i> Enter Shipper Details </i></a>
                     </li>                                                                               </div>
                     </ul>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2> Subscription Details</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <table border="1">
<tr>
<th>subscription-id</th>
<th>next order date</th>
<th>frequency</th>
<th>user</th>
<th>address</th>
<th>creation-date</th>
</tr>
<?php 

require "conn.php";

$result = mysqli_query($localhost,"select  * from subscriptions" ) or die(mysqli_error());
 if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_array($result)) {  ?>
       <tr>     
          <td><?php echo $row['sid'];?></td>
         <td><?php    echo $row['next_order_date']; ?></td>
         <td><?php    echo $row['frequency']; ?></td>
		

		 
         <td><?php  
         $temp3 =$row['user_id']; 
                  $result1 = mysqli_query($localhost,"select  first_name from customer where customer_id='$temp3'" )or die(mysqli_error());
                  $row1 = mysqli_fetch_array($result1);
                  echo $row1['first_name'];
                  
	  ?></td>
       
	   <td><?php  
         $temp4 =$row['address_id']; 
                  $result2 = mysqli_query($localhost,"select  address from address_user where address_id='$temp4'" )or die(mysqli_error());
                  $row2 = mysqli_fetch_array($result2);
                  echo $row2['address'];
                  
	  ?>
	   
	   
	   
	   
	</td>
        <td><?php    echo $row['creationdate']; ?></td>
        
        <?php }
        }
 ?>
</table>
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
