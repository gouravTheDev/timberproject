<?php	

	session_start();


	include("../db_connection.php");	
	
	// $rw_id = $_POST['rw_id'];
	$recieved_date = $_POST['recieved_date'];
	$name = $_POST['name'];
	$vehicle_number = $_POST['vehicle_number'];
	$reference = $_POST['reference'];
	$wood_type = $_POST['wood_type'];
	$length = $_POST['length'];
	$width = $_POST['width'];
	$thickness = $_POST['thickness'];
	$pieces = $_POST['pieces'];
	$cft = $_POST['cft'];
	$cbm = $_POST['cbm'];
	$weight = $_POST['weight'];
	$price = $_POST['price'];
	$value = $_POST['value'];
	$gst = $_POST['gst'];

	$transport_charges = $_POST['transport_charges'];
	$other_charges = $_POST['other_charges'];


	$query="INSERT INTO `ta_raw_wood`(`rw_id`, `recieved_date`, `name`, `vehicle_number`, `reference`, `wood_type`, `length`, `width`, `thickness`, `pieces`, `cft`, `cbm`, `weight`, `price`, `value`, `gst`, `insert_date`,`transport_charges`,`other_charges`) 
	VALUES ('0', '$recieved_date', '$name', '$vehicle_number', '$reference', '$wood_type', '$length', '$width', '$thickness', '$pieces', '$cft', '$cbm', '$weight', '$price', '$value', '$gst', NOW(),'$transport_charges','$other_charges')";	
	
	
	if ($conn->query($query) === TRUE) {
 //   echo "New record created successfully";
    echo '<script language="javascript">';
		echo 'window.location.href = "../total_raw_wood_added.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../material_add.php";';
		echo '</script>';
}
	
?>