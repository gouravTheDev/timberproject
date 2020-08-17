<?php	

	session_start();


	include("../db_connection.php");	
	// echo "<pre>";print_r($_POST);die;
	// $rw_id = $_POST['rw_id'];
	$cft = $_POST['cft'];
	$cbm = $_POST['cbm'];
	$weight = $_POST['weight'];

	$wood_type = $_POST['wood_type'];


	$query="INSERT INTO `ta_wood_opening_stock` (`wood_type`,`cft`, `cbm`, `weight`,`created_on`) 
	VALUES ('$wood_type', '$cft', '$cbm', '$weight', NOW())";	
	// die;
	
	if ($conn->query($query) === TRUE) {
 	//   echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_wood_opening_stock.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../opening_stock.php";';
		echo '</script>';
}
	
?>