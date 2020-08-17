<?php	

	session_start();

	include("../db_connection.php");	
	
	// echo "<pre>";print_r($_POST);die;
	$rw_id = $_POST['rw_id'];
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


	$query = "UPDATE `ta_raw_wood` set `recieved_date` = '$recieved_date', `name` = '$name' , `vehicle_number` = '$vehicle_number', `reference` = '$reference', `wood_type` = '$wood_type', `length` = '$length', `width` = '$width', `thickness` = '$thickness', `pieces` = '$pieces', `cft` = '$cft', `cbm` = '$cbm', `weight` = '$weight', `price` = '$price', `value` = '$value', `gst` = '$gst' ,`transport_charges` = '$transport_charges',`other_charges` = '$other_charges' WHERE `rw_id` =  $rw_id";
	// die;
	
	if ($conn->query($query) === TRUE) {
 //   echo "New record created successfully";
    echo '<script language="javascript">';
		echo 'window.location.href = "../total_raw_wood_added.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../total_raw_wood_added_edit.php?id=$_POST["rw_id"]";';
		echo '</script>';
}
	
?>