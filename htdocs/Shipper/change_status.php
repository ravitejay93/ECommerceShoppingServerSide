<?php
$oid=$_GET['oid'];
$pid=$_GET['pid'];
$sid=$_GET['sid'];
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
           <form method="post" action="tets.php">             
                        <table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
<tr>
    <td align='center'>order id</td>
    <td><?php echo $oid?></td>
    <td><?php echo "<input type='hidden' name='oid' value=$oid> " ?></td>
    <td>  <?php echo "<input type='hidden' name='sid' value=$sid> " ?></td>
</tr>
<tr> <td>&nbsp;</td> </tr>
<tr>
    <td align='center'>Product id</td>
    <td><?php echo $pid ?></td>
       <td> <?php echo "<input type='hidden' name='pid' value=$pid> " ?></td>
</tr>
<tr> <td>&nbsp;</td> </tr>

<tr>   
 <td align='center'>Select status</td>
                      
<td><select name="status">
  <option value="0">PICK</option>
  <option value="1">PACK</option>
  <option value="2">SHIP</option>
  </select></td>
</tr>
<tr>
<td align='right' > <input type="submit" name="submit_image" value="Update status"></td>

</tr>
</table>
</form>

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
