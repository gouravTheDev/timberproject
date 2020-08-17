<?php
	session_start();
	include("../db_connection.php");

$order_id = $_POST['order_id'];
$customer_name = $_POST['customer_name'];
$company_name = $_POST['company_name'];
$place = $_POST['place'];
$order_date = $_POST['order_date'];
$delivery_date = $_POST['delivery_date'];
$design = $_POST['design'];
$gradiation = $_POST['gradiation'];

$order_product_name = $_POST['order_product_name'];
$quantity = $_POST['quantity'];
$thickness = $_POST['thickness'];


	$query= "INSERT INTO `ta_order`(`order_sno`, `order_id`, `customer_name`, `company_name`, `place`, `order_date`, `delivery_date`, `gradiation`, `design`, `order_product_name`, `quantity`, `thickness`, `order_insert_date`) 
	                        VALUES ('0','$order_id', '$customer_name', '$company_name', '$place', '$order_date', '$delivery_date', '$gradiation', '$design', '$order_product_name', '$quantity', '$thickness', NOW())";	
	
	
	if ($conn->query($query) === TRUE) {
//    echo "New record created successfully";
    echo '<script language="javascript">';
		echo 'window.location.href = "../orders.php";';
		echo '</script>';
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Something Went Wrong");';
	//	echo 'window.location.href = "../material_add.php";';
		echo '</script>';
}
	
?>