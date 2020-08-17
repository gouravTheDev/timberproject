<?php	

	session_start();


	include("../db_connection.php");	
	
	$sp_id = $_POST['sp_id'];
	$recieved_date = $_POST['recieved_date'];
	$name = $_POST['name'];
	$vehicle_number = $_POST['vehicle_number'];
	$reference = $_POST['reference'];
	$sand_paper_type = $_POST['sand_paper_type'];
	$quantity = $_POST['quantity'];
	$uom = $_POST['uom'];
	$brand = $_POST['brand'];
	$price = $_POST['price'];
	$gst = $_POST['gst'];

	$transport_charges = $_POST['transport_charges'];
	$other_charges = $_POST['other_charges'];

	// echo 
	$query= "UPDATE `ta_sand_paper` set `recieved_date` =  '$recieved_date', `name` = '$name', `vehicle_number` = '$vehicle_number', `reference` = '$reference', `sand_paper_type` = '$sand_paper_type', `quantity` = '$quantity', `uom` = '$uom', `brand` = '$brand', `price` = '$price', `gst` = '$gst', `transport_charges` = '$transport_charges',`other_charges` = '$other_charges' WHERE `sp_id` = $sp_id";	
	// die;
	
	if ($conn->query($query) === TRUE) {
  		//  echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_sand_paper_added.php";';
		echo '</script>';
	} else {
	   // echo "Error: " . $query . "<br>" . $conn->error;
	   echo '<script language="javascript">alert("Something Went Wrong");';
			echo 'window.location.href = "../total_sand_paper_added_edit.php/id=$sp_id";';
			echo '</script>';
	}
	
?>