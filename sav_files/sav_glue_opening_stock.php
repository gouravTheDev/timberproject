<?php	

	session_start();


	include("../db_connection.php");	
	// echo "<pre>";print_r($_POST);die;
	// $rw_id = $_POST['rw_id'];
	$qty = $_POST['qty'];
	$brand = $_POST['brand'];
	$uom = $_POST['uom'];
	$no_of_boxes = $_POST['no_of_boxes'];
	$glue_type = $_POST['glue_type'];


	$query="INSERT INTO `ta_glue_opening_stock` (`glue_type`,`qty`, `brand`, `no_of_boxes`,`created_on`,`uom`) 
	VALUES ('$glue_type', '$qty', '$brand', '$no_of_boxes', NOW(),'$uom')";	
	// die;
	
	if ($conn->query($query) === TRUE) {
 	//   echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_glue_openingstock.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../opening_stock.php";';
		echo '</script>';
}
	
?>