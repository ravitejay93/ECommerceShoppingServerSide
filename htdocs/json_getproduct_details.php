<?php
require "conn.php";

$product_id=$_POST['pid'];//similar to the post variable in java";

$result = mysqli_query($localhost,"select * from product where product_id=".$product_id."" )or die(mysqli_error($localhost));

 if (mysqli_num_rows($result) > 0) {
    $response["data"] = array();
    
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["product_id"] = $row["product_id"];
        $product["product_name"] = $row["product_name"];
        $product["product_description"] = $row["product_description"];
        $product["quantity"]=$row["quantity"]; 
        $product["unitprice"]=$row["unitprice"];
		$product["image"]=$row["image"];
        array_push($response["data"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    echo json_encode($response);
}

?>
