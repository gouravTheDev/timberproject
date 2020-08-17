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

            // $query= "select seasonout_batch FROM `ta_seasoning_output` where type_of_wood = '".$_POST['type_of_wood']."' ORDER BY seasonout_id DESC LIMIT 1";

              $query= "select seasonin_batch FROM `ta_seasoning_input` where chamber = '".$_POST['chamber']."' ORDER BY seasonin_id DESC LIMIT 1";
            $resp = $conn->query($query);

            // if($resp->num_rows >= 1) {
            //   $row=mysqli_fetch_row($resp);
            //   $batch = substr($row[0],5)+1;
            //   $batch_no = 'SOBTN'.$batch;
            // } else {
            //   $batch_no = 'SOBTN1';
            // }
            $row=mysqli_fetch_row($resp);
            
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => $row[0])));

        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => 'No Data Found')));
        }
	}
?>