<?php 
require "conn.php";
$pid=$_POST["id"];
$result = mysqli_query($localhost,"select  * from address_user where personal_id='$pid'" )or die(mysqli_error());

 if (mysqli_num_rows($result) > 0) {
	 
	$response["data"] = array();
    
    while($row = mysqli_fetch_array($result)){
		$zip = $row['zip'];
		
		$qry = mysqli_query($localhost,"select  * from zip_table " )or die(mysqli_error());
		while ($row1 = mysqli_fetch_array($qry)) {
			$max=$row1['zip_number_max'];
         
			$min=$row1['zip_number_min'];
        
			if($zip>=$min && $zip<=$max)
			{
				$sales_tax = $row1['sales_tax'];
			}
		}
		$row["sales_tax"] = $sales_tax;		
		
		array_push($response["data"],$row);		
	}
    
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);    
       
} else {
    // no products found
    $response["success"] = 0;
    echo json_encode($response);
}