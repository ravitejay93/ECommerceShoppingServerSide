<?php
$sid=$_GET['id'];

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
               <?php echo "<input type='hidden' name='id' value=$sid> " ?>
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

                        <table border="1">

                        <tr>
<th>Orderid</th>

<th>product_id</th>
<th>product name </th>
<th>status</th>
<th>change status</th>

</tr>
<?php
require "conn.php";
//$one="0";
$result = mysqli_query($localhost,"select  * from order_user where shipper_id='$sid'" )or die(mysqli_error());

 if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_array($result)) { 
     $temp=$row['order_id'];
     
     ?>
       <tr>     
          <?php
    $result1 = mysqli_query($localhost,"select  * from order_quantity where order_id='$temp' and order_quantity.return = 0 " )or die(mysqli_error());
 
 // if(mysqli_fetch_array($result1)>0){
   
  
   
   while ($row1 = mysqli_fetch_array($result1)) {
?>

  
	<td><?php 
   $temp1=$row1['order_id'];
   echo $temp1;
                       	  ?>  </td>
         <td><?php    echo $row1['product_id']; 
                         $p=$row1['product_id'];?></td>
  <?php
  $resultp = mysqli_query($localhost,"select * from product where product_id='$p'" )or die(mysqli_error());
$rowp = mysqli_fetch_array($resultp);
?>
         <td><?php    echo $rowp['product_name']; ?></td>
         <td><?php    $tempstatus=$row1['status']; 
         if($tempstatus==0)
         echo "PICK";
           if($tempstatus==1)
         echo "PACK"; 
          if($tempstatus==2)
         echo "SHIP";
          if($tempstatus==-1)
         echo "INVOICED";
         
         ?></td>
       <?php echo "<input type='hidden' name='oid' value=$temp1> " ?>
       <?php echo "<input type='hidden' name='sid' value=$sid> " ?>
       <?php echo "<input type='hidden' name='pid' value=$p> " ?>
       <td>
<?php
         
   echo '<a href="change_status.php?oid='.$temp1.'&sid='.$sid.'&pid='.$p.'">Update</a>';?></td>
     </tr></td>
  </td>
        </tr><?php } ?>
<?php
}}
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
