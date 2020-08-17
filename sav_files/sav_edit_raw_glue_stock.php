<?php
	session_start();
	include("../db_connection.php");	
	
	$recieved_date = $_POST['recieved_date'];
	$rg_id = $_POST['rg_id'];
	$name = $_POST['name'];
	$vehicle_number = $_POST['vehicle_number'];
	$reference = $_POST['reference'];
	$glue_type = $_POST['glue_type'];
	$quantity = $_POST['quantity'];
	$uom = $_POST['uom'];
	$price = $_POST['price'];
	$gst = $_POST['gst'];
	$no_of_boxes = $_POST['no_of_boxes'];
	$transport_charges = $_POST['transport_charges'];
	$other_charges = $_POST['other_charges'];

	echo $query= "UPDATE `ta_raw_glue` set `recieved_date` = '$recieved_date', `name` = '$name', `vehicle_number` = '$vehicle_number', `reference` = '$reference', `glue_type` = '$glue_type', `quantity` = '$quantity', `uom` = '$uom', `price` = '$price', `gst` = '$gst', `no_of_boxes` = '$no_of_boxes',`transport_charges` = '$transport_charges',`other_charges` = '$other_charges' WHERE `rg_id` = $rg_id";
	
	die;
	if ($conn->query($query) === TRUE) {
//    echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_raw_glue_added.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../total_raw_glue_added_edit.php?id=$rg_id";';
		echo '</script>';
}
	
?>