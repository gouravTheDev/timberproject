<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        if(!empty($_POST['type_of_wood'])) {
           // echo "<pre>";print_r($_POST); die;
            include("../db_connection.php"); 	

            $type_of_wood = $_POST['type_of_wood'];
            $seasonin_batch = $_POST['seasonin_batch'];
            $input_date = $_POST['input_date'];
            $input_time = $_POST['input_time'];
            $trolly1_weight = $_POST['trolly1_weight'];
            $trolly1 = $_POST['trolly1'];
            $trolly2_weight = $_POST['trolly2_weight'];
            $trolly2 = $_POST['trolly2'];
            $moisture_level = $_POST['moisture_level'];
            $thickness = $_POST['thickness'];
            if(isset($_POST['chamber'])) {
                $chamber = $_POST['chamber'];
            } else {
                $chamber = $_POST['chamber2'];
            }		

            $query1= "INSERT INTO `ta_season_batch_nos` (`chamber`, `batch_no`, `status`) VALUES ('$chamber', '$seasonin_batch','1')";
            $resp1 = $conn->query($query1);
            
            if ($resp1 === TRUE) {
                $last_id = $conn->insert_id;
                $query= "INSERT INTO `ta_seasoning_input` (`type_of_wood`, `seasonin_batch`, `input_date`, `input_time`, `trolly1_weight`, `trolly1`, `trolly2_weight`, `trolly2`, `moisture_level`, `thickness`,`chamber`) VALUES ('$type_of_wood', '$last_id', '$input_date', '$input_time', '$trolly1_weight', '$trolly1', '$trolly2_weight', '$trolly2', '$moisture_level', '$thickness', '$chamber')";

                $resp = $conn->query($query);

                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'Record Inserted Successfully...!')));
            } else {
                // echo "Error: ".mysqli_error($conn);
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => "Some Error")));
            }
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Record Not Inserted')));
        }
	}

?>