 <?php 
               $sid=$_GET["id"];
//               echo $sid;
               require "conn.php";
              $result = mysqli_query($localhost,"select  * from shipper where shipper_id='$sid'" )or die(mysqli_error());
              $row = mysqli_fetch_array($result);
              $name= $row['company_name'];
              echo $name ;
         ?>
         
         
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shipper</title>
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
              
               </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                  <form method="get" action="index.php">
               <?php echo "<input type='hidden' name='id' value='$sid'> " ?>
               <input type="submit" value="Dashboard" >
                </form>
                    </li>
                    <li class="active-link">
                  <form method="get" action="delivery.php">
               <?php echo "<input type='hidden' name='id' value='$sid'> " ?>
               <input type="submit" value="Delivery" >
                </form>
                    </li>
                    <li class="active-link">
                         <form method="get" action="return.php">
               <?php echo "<input type='hidden' name='id' value='$sid'> " ?>
               <input type="submit" value="returns" >
                </form>
                          <form method="get" action="shipper_login.html">
               <?php echo "<input type='hidden' name='id' value='$sid'> " ?>
               <input type="submit" value="Logout" >
                </form>
               
                </li>



                   
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>SHIPPER DASHBOARD</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome <?php echo $name;?> </strong> 
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
