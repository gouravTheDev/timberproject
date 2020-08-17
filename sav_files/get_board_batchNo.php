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

            $query= "select bm_batch_no FROM `ta_board_manufacturing` ORDER BY bm_id DESC LIMIT 1";
            // $query= "select bm_batch_no FROM `ta_board_manufacturing` where type_of_wood = '".$_POST['type_of_wood']."' ORDER BY bm_id DESC LIMIT 1";	
            $resp = $conn->query($query);
            // print_r($resp);die;
            if($resp->num_rows >= 1) {
              $row=mysqli_fetch_row($resp);
              $batch = substr($row[0],3)+1;
              $batch_no = 'BMB'.$batch;
            } else {
              $batch_no = 'BMB1';
            }
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => $batch_no)));

        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => 'No Data Found')));
        }
	}
?>