<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        if(!empty($_POST['type_of_wood'])) {
           echo "<pre>";print_r($_POST);die;
            include("../db_connection.php"); 	

            $bm_date = $_POST['bm_date'];
            $type_of_wood = $_POST['type_of_wood'];
            $bm_batch_no = $_POST['bm_batch_no'];
            $gradiation = $_POST['gradiation'];
            $board_length = $_POST['board_length'];
            $board_width = $_POST['board_width'];
            $board_widthg = $_POST['board_widthg'];
            $thickness = $_POST['thickness'];
            $pieces = $_POST['pieces'];
            $sqm = $_POST['sqm'];
            $sqft = $_POST['sqft'];

            $production_type = $_POST['prodution_type'];
            $glow_type = $_POST['glow_type'];
            $quantity = $_POST['glow_quantity'];
            $uom = $_POST['uom'];
            $consumedQty = $_POST['consumed_qty'];

            $query= "INSERT INTO `ta_board_manufacturing` (`bm_date`, `bm_batch_no`, `type_of_wood`, `length`, `gradiation` , `widthg`, `width`, `thickness`, `no_of_pieces`, `sqm`, `sqft`) 
            VALUES ('$bm_date', '$bm_batch_no', '$type_of_wood', '$board_length','$gradiation', '$board_widthg', '$board_width', '$thickness', '$pieces', '$sqm', '$sqft')";	

            $resp = $conn->query($query);
            if ($resp === TRUE) {

                if($consumedQty)
                {
                    $getLLMCOnsumedQty = "select * from `ta_ll_manufacturing` where llm_id = ".$_POST['llm_id'];
                    $respgetLLMCOnsumedQty = $conn->query($getLLMCOnsumedQty);

                    if($respgetLLMCOnsumedQty->num_rows >= 1) {
                        $rowrespgetLLMCOnsumedQty = mysqli_fetch_assoc($respgetLLMCOnsumedQty);
                        // echo "<pre>";print_r($rowrespgetLLMCOnsumedQty['consumed']);die;
                        $consumed_qty = $rowrespgetLLMCOnsumedQty['consumed'] + $consumedQty;
                    } else {
                        $consumed_qty = $consumedQty;
                    }
                    $queryConsumed = "update `ta_ll_manufacturing` set `consumed` = ".$consumed_qty." where llm_id = ".$_POST['llm_id'];
                    $respConsumed = $conn->query($queryConsumed);
                }


                $last_id = $conn->insert_id;
                if (!empty($quantity) && !empty($uom) && !empty($glow_type) && is_array($quantity) && is_array($uom) && is_array($glow_type) && count($quantity) === count($uom) ) 
                {
                    for ($i = 0; $i < count($glow_type); $i++) {

                        $query_roles = "INSERT INTO ta_consumed_glue (production_type,production_type_id, glue_type, qty, uom) VALUES ('$production_type','$last_id', '$glow_type[$i]', '$quantity[$i]','$uom[$i]')";
                        if ($conn->query($query_roles) === TRUE) {
                            // $last_id = $conn->insert_id;
                        } else {
                            header('Content-Type: application/json; charset=UTF-8');
                            die(json_encode(array('message' => 'Record Not Inserted')));
                        }
                    }
                }
                header('Content-Type: application/json; charset=UTF-8');
                die(json_encode(array('message' => 'Record Inserted Successfully...!')));
            } else {
                echo "Error: ".mysqli_error($conn);
            }
        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('message' => 'Record Not Inserted')));
        }
	}

?>