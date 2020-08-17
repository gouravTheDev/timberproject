<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        if(!empty($_POST['type'])) {
           // echo "<pre>";print_r($_POST);die;
            include("../db_connection.php"); 	

            $board_id = $_POST['board_id'];
            $type = $_POST['type'];
            $grid_type = $_POST['grid_type'];
            $brand = $_POST['brand'];
            // $qty = $_POST['qty'];
            $rough_qty = $_POST['rough_qty'];
            $final_qty = $_POST['final_qty'];
            if($type == 'new') {
                $new_grid_date = $_POST['new_grid_date'];
            } else {
                $new_grid_date = "0000-00-00";
            }

            if (!empty($type) && !empty($grid_type) && !empty($brand) && is_array($grid_type) && is_array($brand) && count($brand) === count($grid_type) ) 
            {
                for ($i = 0; $i < count($grid_type); $i++) {

                    $query_roles = "INSERT INTO `ta_sanding` (`type`, `grid_type`, `brand`, `rough_qty`, `final_qty`,`end_grid_date`,`boardmanu_id`) VALUES ('$type', '$grid_type[$i]', '$brand[$i]','$rough_qty','$final_qty', '$new_grid_date[$i]','$board_id')";
                    if ($conn->query($query_roles) === TRUE) {
                        $last_id = $conn->insert_id;                        
                    } else {
                        header('Content-Type: application/json; charset=UTF-8');
                        die(json_encode(array('message' => 'Record Not Inserted')));
                    }
                }

                echo '<script language="javascript">';
                echo 'window.location.href = "../sanding.php";';
                echo '</script>';
            } else {
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'Record Not Inserted')));
            }
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Record Not Inserted')));
        }
	}

?>