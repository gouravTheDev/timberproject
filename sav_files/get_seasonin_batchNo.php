<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
    // echo "<pre>";print_r($_POST);die;
        if(!empty($_POST['type_of_wood'])) {
           // echo "<pre>";print_r($_POST);die;
            include("../db_connection.php"); 	

            $type_of_wood = $_POST['type_of_wood'];

            // $query= "select seasonin_batch FROM `ta_seasoning_input` where type_of_wood = '".$_POST['type_of_wood']."' ORDER BY seasonin_id DESC LIMIT 1";

            // $query= "select seasonin_batch FROM `ta_seasoning_input` where chamber = '".$_POST['chamber']."' ORDER BY seasonin_id DESC LIMIT 1";

            $query= "select batch_no FROM `ta_season_batch_nos` where chamber = '".$_POST['chamber']."' ORDER BY batch_id DESC LIMIT 1";
            $resp = $conn->query($query);

            if($resp->num_rows >= 1) {
        	    $row=mysqli_fetch_row($resp);
              $batch = substr($row[0],4)+1;
              if($_POST['chamber'] == 'chamber1') {
                $batch_no = 'SC1B'.$batch;
              } else {
                $batch_no = 'SC2B'.$batch;
              }
            } else {
              if($_POST['chamber'] == 'chamber1') {
                $batch_no = 'SC1B1';
              } else {
                $batch_no = 'SC2B1';
              }
            }
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => $batch_no)));

        } else {
            header('Content-Type: application/json; charset=UTF-8');
            die(json_encode(array('data' => 'No Data Found')));
        }
	}
?>