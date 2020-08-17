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

            $query= "select batch_no FROM `ta_ll_manufacturing` where type_of_wood = '".$_POST['type_of_wood']."' ORDER BY llm_id DESC LIMIT 1";	
            $resp = $conn->query($query);

            if($resp->num_rows >= 1) {
              $row=mysqli_fetch_row($resp);
              $batch = substr($row[0],5)+1;
              $batch_no = 'LBATN'.$batch;
            } else {
              $batch_no = 'LBATN1';
            }
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => $batch_no)));

        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => 'No Data Found')));
        }
	}
?>