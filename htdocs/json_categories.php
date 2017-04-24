<?php
require "conn.php";

//$category_id="1";//$_POST['cid'];//similar to the post variable in java";

$result = mysqli_query($localhost,"select * from category" )or die(mysqli_error($localhost));

 if (mysqli_num_rows($result) > 0) {
    $response["data"] = array();
    
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $categories = array();
        $categories["category_id"] = $row["category_id"];
        $categories["category_name"] = $row["category_name"];
        $categories["category_url"] = $row["category_url"];
       
        array_push($response["data"], $categories);
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
