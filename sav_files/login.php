<?php
	session_start();
	include("../db_connection.php");	
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query= "SELECT * FROM admin_master where email = '".$email."' and password = '".$password."' limit 1";	
	$result = $conn->query($query);
	
	if ($result == TRUE) {
		if ($result->num_rows > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			//	echo "<pre>";print_r($row);
				$_SESSION["loggedin_id"] = $row["admin_id"];
				$_SESSION["name"] = $row["name"];
				$_SESSION["email"] = $row["email"];
			}

	    	header("location: ../dashboard.php"); 
		} else {
			echo '<script language="javascript">alert("Invalid Email or Password");';
			echo 'window.location.href = "../index.php";';
			echo '</script>';
			// header("location: ../index.php");
		}
} else {
   // echo "Error: " . $query . "<br>" . $conn->error;
   echo '<script language="javascript">alert("Invalid");';
	//	echo 'window.location.href = "../material_add.php";';
		echo '</script>';
}
	
?>