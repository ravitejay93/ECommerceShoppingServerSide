<?php 
require "conn.php";
$result = mysqli_query($localhost,"select  * from ecommerce.order_user" )or die(mysqli_error());
$r=0;
 if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_array($result)) {  
                        $temp=$row['order_id'] ;
$result1=  mysqli_query($localhost,"select * from ecommerce.order_quantity where order_id = '$temp' ")   ;
$lengthoforder=  mysqli_num_rows($result1);           
		    
    $result2 = mysqli_query($localhost,"select * from ecommerce.order_quantity where order_id = '$temp'  and order_quantity.return= 0 order by status desc" )or die(mysqli_error());
                $m = 0;
				$min=array();
				$flag=0;$counter2=0;
                    while($row2 = mysqli_fetch_array($result2))
                    {  
						              
						$min[$m]= $row2['status'];
						$m++;
                    }
					//echo count($min);
                    $length=count($min);
                      for($i=0;$i<$length;$i++)
                      {
                        if ($min[$i]==-1)
                        $flag=1;
                        if($min[$i]==2)
                        $counter2++;
                                              
                      }
             if($flag==1)
             {
               $set=0;
             }
                   else
             {
             if($counter2==$length)
             $set=2;
             else
             $set=1;
             }


$result5 = mysqli_query($localhost,"select * from ecommerce.order_quantity where order_id = '$temp'and order_quantity.return= 1" )or die(mysqli_error());
$lengthofreturns=  mysqli_num_rows($result5);
if($lengthofreturns==$lengthoforder)
$set=3;
          
 

   mysqli_query($localhost,"UPDATE ecommerce.order_user SET status='$set' WHERE order_id='$temp'" )or die(mysqli_error($localhost));
                  
             }                    }        
                    ?>  
