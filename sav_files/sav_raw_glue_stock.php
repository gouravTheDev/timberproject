<?php
	session_start();
	include("../db_connection.php");	
	
	$recieved_date = $_POST['recieved_date'];
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

	$query= "INSERT INTO `ta_raw_glue`(`rg_id`, `recieved_date`, `name`, `vehicle_number`, `reference`, `glue_type`, `quantity`, `uom`, `price`, `gst`, `no_of_boxes`, `rg_insert_date`,`transport_charges`,`other_charges`) 
	         VALUES ('0', '$recieved_date', '$name', '$vehicle_number', '$reference', '$glue_type', '$quantity', '$uom', '$price', '$gst','$no_of_boxes', NOW(),'$transport_charges','$other_charges')";	
	
	
	if ($conn->query($query) === TRUE) {
//    echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_raw_glue_added.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../material_add.php";';
		echo '</script>';
}
	
?>