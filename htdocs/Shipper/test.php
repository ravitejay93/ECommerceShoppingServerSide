

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
                  <a href="#" style="color:#fff;">LOGOUT</a>  

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
                        <a href="shipper_details.php"><i class="fa fa-qrcode "></i>shipper details</a>
                    </li>
                    <li>
                        <a href="order_details.php"><i class="fa fa-qrcode"> orders and shipping details</i></a>
                    </li>
 <li>
                        <a href="return_orders.php"><i class="fa fa-qrcode"> Return orders </i></a>
                    </li>
                   <li>
                        <a href="assign_shipper.html"><i class="fa fa-edit "></i>ZIP Table</a>
                    </li>

                     <li>
                    <a href="enter_product.html"><i class="fa fa-qrcode"> Enter Products </i></a>

                     </li>                                                                              </div>
  <li>
                    <a href="shipper_register.html"><i class="fa fa-qrcode"> Enter Shipper Details </i></a>
                     </li>   </ul>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2> Product details</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">

<?php
$name=$_POST["name"];
$price=$_POST["price"];
$quantity=$_POST["quantity"];
$category_id=$_POST["category_id"];
$description=$_POST["description"];
$filetmp=$_FILES['image']['tmp_name']; 
$filename=$name.".jpg";
$filetype=$_FILES['image']['type'];
$filepath="images/".$filename;
//Get the content of the image and then add slashes to it 
//$image=file_get_contents($image);
//$image=base64_encode($image);
move_uploaded_file($filetmp,$filepath);
$filepath1="/".$filepath;
require "conn.php";

$sql = "INSERT INTO product (product_name,unitprice,quantity,category_id,product_description,image)
VALUES ('$name','$price','$quantity','$category_id','$description','$filepath1')";

$result_query1 = mysqli_query($localhost,$sql)or die(mysqli_error($localhost));

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
