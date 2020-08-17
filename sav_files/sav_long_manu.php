<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
           // echo "<pre>";print_r($_POST);die;
        if(!empty($_POST['type_of_wood'])) {
            include("../db_connection.php"); 	

            $llm_date = $_POST['llm_date'];
            $type_of_wood = $_POST['type_of_wood'];
            $batch_no = $_POST['long_batch_no'];
            $length = $_POST['length'];
            $width = $_POST['width'];
            $thickness = $_POST['thickness'];
            $pieces = $_POST['pieces'];
            $cbm = $_POST['cbm'];
            $cft = $_POST['cft'];
            $production_type = $_POST['prodution_type'];

            $glow_type = $_POST['glow_type'];
            $quantity = $_POST['glow_quantity'];
            $uom = $_POST['uom'];

            $thickness_of_the_board = $_POST['thickness_of_the_board'];

            // $getllmData = "select * from ta_ll_manufacturing where batch_no = '".$batch_no."' and type_of_wood = '".$type_of_wood."' and width = '".$width."' and length = '".$length."' and thickness = '".$thickness."'";
            $getllmData = "select * from ta_ll_manufacturing where batch_no = '".$batch_no."' and type_of_wood = '".$type_of_wood."'";

            $getllmDataresp = $conn->query($getllmData);
            $getllmDataresp = mysqli_fetch_assoc($getllmDataresp);
            // echo "<pre>";print_r($getllmDataresp);die;
            $total_pieces = 0;
            // if(!empty($getllmDataresp))
            // {
            //     $total_pieces = $pieces + $getllmDataresp['pieces'];
            //     // $queryUpdate = "UPDATE `ta_ll_manufacturing` SET `pieces` = '".$total_pieces."' where `batch_no` = '".$batch_no."' and `type_of_wood` = '".$type_of_wood."'"; 
            //     echo $query= "INSERT INTO `ta_ll_manufacturing` (`llm_date`, `batch_no`, `type_of_wood`, `length`, `width`, `thickness`, `pieces`, `cbm`, `cft`,`thickness_of_the_board`) 
            //     VALUES ('$llm_date', '$batch_no', '$type_of_wood', '$length', '$width', '$thickness', '$pieces', '$cbm', '$cft','$thickness_of_the_board')";
            //     // $queryUpdate = "UPDATE `ta_ll_manufacturing` SET `llm_date` = '".$llm_date."', `length` = '".$length."', `width` = '".$width."', `thickness` = '".$thickness."', `pieces` = '".$pieces."', `cbm` = '".$cbm."', `cft` = '".$cft."',`thickness_of_the_board` = '".$thickness_of_the_board."' where `batch_no` = '".$batch_no."' and `type_of_wood` = '".$type_of_wood."'";    
            //     // echo "<pre>";print_r($queryUpdate);die;
            //     $resp = $conn->query($queryUpdate);

            //     if ($resp === TRUE) {
            //         $last_id = $conn->insert_id;
            //         if (!empty($quantity) && !empty($uom) && !empty($glow_type) && is_array($quantity) && is_array($uom) && is_array($glow_type) && count($quantity) === count($uom) ) 
            //         {
            //             for ($i = 0; $i < count($glow_type); $i++) {

            //                 $query_roles = "INSERT INTO ta_consumed_glue (production_type,production_type_id, glue_type, qty, uom, wood_id) VALUES ('$production_type','$last_id', '$glow_type[$i]', '$quantity[$i]','$uom[$i]','$type_of_wood')";
            //                 if ($conn->query($query_roles) === TRUE) {
            //                     // $last_id = $conn->insert_id;
            //                 } else {
            //                     header('Content-Type: application/json; charset=UTF-8');
            //                     die(json_encode(array('message' => 'Record Not Inserted')));
            //                 }
            //             }
            //         }
            //         header('Content-Type: application/json; charset=UTF-8');
            //         die(json_encode(array('message' => 'Record Inserted Successfully...!')));
            //     } else {
            //         echo "Error: ".mysqli_error($conn);
            //     }
                
            // } else {
                $query= "INSERT INTO `ta_ll_manufacturing` (`llm_date`, `batch_no`, `type_of_wood`, `length`, `width`, `thickness`, `pieces`, `cbm`, `cft`,`thickness_of_the_board`) 
                VALUES ('$llm_date', '$batch_no', '$type_of_wood', '$length', '$width', '$thickness', '$pieces', '$cbm', '$cft','$thickness_of_the_board')";	

                $resp = $conn->query($query);
                if ($resp === TRUE) {
                    $last_id = $conn->insert_id;
                    if (!empty($quantity) && !empty($uom) && !empty($glow_type) && is_array($quantity) && is_array($uom) && is_array($glow_type) && count($quantity) === count($uom) ) 
                    {
                        for ($i = 0; $i < count($glow_type); $i++) {

                            $query_roles = "INSERT INTO ta_consumed_glue (production_type,production_type_id, glue_type, qty, uom, ll_batch_id) VALUES ('$production_type','$last_id', '$glow_type[$i]', '$quantity[$i]','$uom[$i]', '$batch_no')";
                            if ($conn->query($query_roles) === TRUE) {
                                // $last_id = $conn->insert_id;
                            } else {
                                header('Content-Type: application/json; charset=UTF-8');
                                die(json_encode(array('message' => mysqli_error($conn))));
                            }
                        }
                    }
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => 'Record Inserted Successfully...!')));
                } else {
                    // echo "Error: ".mysqli_error($conn);
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => mysqli_error($conn))));
                }
            // }
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Record Not Inserted')));
        }
	}

?>