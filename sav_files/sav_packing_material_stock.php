<?php	

	session_start();


	include("../db_connection.php");	
	
	// echo "<pre>";print_r($_POST);die;
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

	$query= "INSERT INTO `ta_packing_material`(`pm_id`, `recieved_date`, `name`, `vehicle_number`, `reference`, `packing_material_type`, `brand`, `price`, `gst`, `sp_insert_date`,`transport_charges`,`other_charges`) 
	         VALUES ('0', '$recieved_date', '$name', '$vehicle_number', '$reference', '$packing_material_type', '$brand', '$price', '$gst', NOW(),'$transport_charges','$other_charges')";	
	
	
	if ($conn->query($query) === TRUE) {
		$last_id = $conn->insert_id;
		if (!empty($quantity) && !empty($uom) && !empty($roles) && is_array($quantity) && is_array($uom) && is_array($roles) && count($quantity) === count($uom) ) 
		{
		    for ($i = 0; $i < count($quantity); $i++) {

		        // $quantity = mysql_real_escape_string($quantity[$i]);
		        // $uom = mysql_real_escape_string($uom[$i]);
		        // $roles = mysql_real_escape_string($roles[$i]);

		        $query_roles = "INSERT INTO ta_roles (material_type_id,quantity, uom, roles) VALUES ('$last_id','$quantity[$i]', '$uom[$i]','$roles[$i]')";
		        if ($conn->query($query_roles) === TRUE) {
				    // $last_id = $conn->insert_id;
				} else {
					echo '<script language="javascript">alert("Something Went Wrong");';
					echo 'window.location.href = "../material_add.php";';
					echo '</script>';
				}
		    }
		}
  //  echo "New record created successfully";
    	echo '<script language="javascript">';
		echo 'window.location.href = "../total_packing_material_added.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
		echo 'window.location.href = "../material_add.php";';
		echo '</script>';
}
	
?>