<?php	

	session_start();


	include("../db_connection.php");	
	
	// echo "<pre>";print_r($_POST);die;
	$pm_id = $_POST['pm_id'];
	$recieved_date = $_POST['recieved_date'];
	$name = $_POST['name'];
	$vehicle_number = $_POST['vehicle_number'];
	$reference = $_POST['reference'];
	$packing_material_type	 = $_POST['packing_material_type'];
	$brand = $_POST['brand'];
	$price = $_POST['price'];
	$gst = $_POST['gst'];


	$quantity = $_POST['quantity'];
	$uom = $_POST['uom'];
	$roles = $_POST['roles'];

	$transport_charges = $_POST['transport_charges'];
	$other_charges = $_POST['other_charges'];
	
	// echo "<pre>";print_r(count($quantity));die;

	$query= "UPDATE `ta_packing_material` SET  `recieved_date` = '$recieved_date', `name` = '$name', `vehicle_number` = '$vehicle_number', `reference` = '$reference', `packing_material_type` = '$packing_material_type', `brand` = '$brand', `price` = '$price', `gst` = '$gst',`transport_charges` = '$transport_charges',`other_charges` = '$other_charges' where pm_id = $pm_id";
	// die;
	
	if ($conn->query($query) === TRUE) {
		//  echo "New record created successfully";
		echo '<script language="javascript">';
		echo 'window.location.href = "../total_packing_material_added.php";';
		echo '</script>';
	} else {
	   // echo "Error: " . $query . "<br>" . $conn->error;
	   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../total_packing_material_added_edit.php";';
		echo '</script>';
	}
	
?>