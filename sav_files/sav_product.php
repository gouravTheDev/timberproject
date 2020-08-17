<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        if(!empty($_POST)) {
           // echo "<pre>";print_r($_POST);die;
            include("../db_connection.php"); 	

            $product_name = $_POST['product_name'];

            $query= "INSERT INTO `ta_products` (`id`, `product_name`) VALUES ('', '$product_name')";	

            if ($conn->query($query) === TRUE) {
				echo '<script language="javascript">alert("Record Inserted successfully");';
				echo 'window.location.href = "../total_products.php";';
				echo '</script>';
			} else {
				echo '<script language="javascript">alert("Something Went Wrong");';
				echo 'window.location.href = "../material_add.php";';
				echo '</script>';
			}
        } else {
            echo '<script language="javascript">alert("Something Went Wrong");';
			echo 'window.location.href = "../material_add.php";';
			echo '</script>';
        }
	}

?>