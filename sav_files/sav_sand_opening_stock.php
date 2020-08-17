<?php	

	session_start();


	include("../db_connection.php");	
	// echo "<pre>";print_r($_POST);die;
	// $rw_id = $_POST['rw_id'];
	$qty = $_POST['qty'];
	$brand = $_POST['brand'];
	$uom = $_POST['uom'];
	$sand_type = $_POST['sand_type'];


	$query="INSERT INTO `ta_sand_opening_stock` (`sand_type`,`qty`, `brand`,`created_on`,`uom`) 
	VALUES ('$sand_type', '$qty', '$brand', NOW(),'$uom')";	
	// die;
	
	if ($conn->query($query) === TRUE) {
 	//   echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_sand_opening_stock.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../opening_stock.php";';
		echo '</script>';
}
	
?>