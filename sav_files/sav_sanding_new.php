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

                    $selectOldGridtype = "select * from ta_sanding where grid_type = $grid_type[$i] order by sand_id DESC limit 1";
                    $resp = $conn->query($selectOldGridtype);
                    // $selectOldGridtypeRep = mysqli_fetch_row($resp);
                    if($resp->num_rows >= 1) {
                        $rowsaa = mysqli_fetch_array($resp);                        
                    }
                    // echo "<pre>";print_r($rowsaa['sand_id']);die;
                    if(!empty($rowsaa))
                    {
                        $updateEndDate = "update `ta_sanding` set `end_grid_date` = '".$new_grid_date[$i]."' where sand_id = ".$rowsaa['sand_id'];
                        $conn->query($updateEndDate);
                    }
                    
                    $query_roles = "INSERT INTO `ta_sanding` (`type`, `grid_type`, `brand`, `rough_qty`, `final_qty`,`boardmanu_id`) VALUES ('$type', '$grid_type[$i]', '$brand[$i]','$rough_qty','$final_qty','$board_id')";
                    if ($conn->query($query_roles) === TRUE) {
                        $last_id = $conn->insert_id;
                        
                    } else {
                        header('Content-Type: application/json; charset=UTF-8');
                        die(json_encode(array('message' => 'Record Not Inserted')));
                    }
                }

                // header('Content-Type: application/json; charset=UTF-8');
                //         die(json_encode(array('message' => 'Record Inserted Successfully...!')));

                echo '<script language="javascript">';
                echo 'window.location.href = "../sanding.php";';
                echo '</script>';
            } else {
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'Record Not Inserted')));
            }

            // $query= "INSERT INTO `ta_sanding` (`type`, `grid_type`, `brand`, `qty`,`new_grid_date`) 
            // VALUES ('$type', '$grid_type', '$brand', '$qty','$new_grid_date')";
            // $resp = $conn->query($query);
            // if ($resp === TRUE) {
            //     header('Content-Type: application/json; charset=UTF-8');
            //     die(json_encode(array('message' => 'Record Inserted Successfully...!')));
            // } else {
            //     echo "Error: ".mysqli_error($conn);
            // }
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Record Not Inserted')));
        }
	}

?>