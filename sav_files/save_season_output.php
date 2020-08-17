<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        if(!empty($_POST['type_of_wood'])) {
           // echo "<pre>";print_r($_POST);die;
            include("../db_connection.php"); 	

            $type_of_wood = $_POST['type_of_wood'];
            $seasonout_batch = $_POST['seasonout_batch'];
            $output_date = $_POST['output_date'];
            $output_time = $_POST['output_time'];
            $trolly1_weight = $_POST['trolly1_weight'];
            // $trolly1 = $_POST['trolly1'];
            $trolly2_weight = $_POST['trolly2_weight'];
            // $trolly2 = $_POST['trolly2'];
            $moisture_level = $_POST['moisture_level'];
            $total_weight = $_POST['total_weight'];
            $weight = $_POST['weight'];
            $cft = $_POST['cft'];
            $per_cft_weight = $_POST['per_cft_weight'];
            $thickness = $_POST['thickness'];
            $total_cft = $_POST['total_cft'];
            $price_seasoning_per_cft = $_POST['price_seasoning_per_cft'];

            $seasonin_id = $_POST['seasonin_id'];

            if(isset($_POST['chamber'])) {
                $chamber = $_POST['chamber'];
            } else {
                $chamber = $_POST['chamber2'];
            }


            $query= "INSERT INTO `ta_seasoning_output` (`type_of_wood`, `seasonout_batch`, `output_date`, `output_time`, `trolly1_weight`, `trolly1`, `trolly2_weight`, `trolly2`, `moisture_level`, `total_weight`,`weight`,`cft`,`per_cft_weight`,`thickness`,`total_cft`,`chamber`,`price_seasoning_per_cft`) 
            VALUES ('$type_of_wood', '$seasonout_batch', '$output_date', '$output_time', '$trolly1_weight', '', '$trolly2_weight', '', '$moisture_level', '$total_weight', '$weight', '$cft','$per_cft_weight','$thickness','$total_cft','$chamber','$price_seasoning_per_cft')";	
            // die;
            $resp = $conn->query($query);
            if ($resp === TRUE) {
                $updateStatusSql = "update `ta_seasoning_input` set `status` = 0 where seasonin_id = '$seasonin_id'";
                $updateresp = $conn->query($updateStatusSql);
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'Record Inserted Successfully...!')));
            } else {
                // echo "Error: " . $query . "<br>" . $conn->error;
                // echo '<script language="javascript">alert("Something Went Wrong");';
                //	echo 'window.location.href = "../material_add.php";';
                // echo '</script>';
                echo "Error: ".mysqli_error($conn);
            }
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Record Not Inserted')));
        }
	}

?>