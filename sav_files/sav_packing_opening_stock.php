<?php	

	session_start();

	include("../db_connection.php");
	$qty = $_POST['qty'];
	$brand = $_POST['brand'];
	$uom = $_POST['uom'];
	$packing_type = $_POST['packing_type'];
	$role = $_POST['role'];

	$query="INSERT INTO `ta_packing_opening_stock` (`packing_type`,`qty`, `brand`,`created_on`,`uom`,`role`) 
	VALUES ('$packing_type', '$qty', '$brand', NOW(),'$uom','$role')";	
	// die;
	
	if ($conn->query($query) === TRUE) {
 	//   echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_packing_opening_stock.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../opening_stock.php";';
		echo '</script>';
}
	
?>