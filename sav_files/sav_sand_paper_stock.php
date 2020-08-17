<?php	

	session_start();


	include("../db_connection.php");	
	

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

	$query= "INSERT INTO `ta_sand_paper`(`sp_id`, `recieved_date`, `name`, `vehicle_number`, `reference`, `sand_paper_type`, `quantity`, `uom`, `brand`, `price`, `gst`, `sp_insert_date`,`transport_charges`,`other_charges`) 
	         VALUES ('0', '$recieved_date', '$name', '$vehicle_number', '$reference', '$sand_paper_type', '$quantity', '$uom', '$brand', '$price', '$gst', NOW(),'$transport_charges','$other_charges')";	
	
	
	if ($conn->query($query) === TRUE) {
  //  echo "New record created successfully";
    echo '<script language="javascript">';
		echo 'window.location.href = "../total_sand_paper_added.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../material_add.php";';
		echo '</script>';
}
	
?>