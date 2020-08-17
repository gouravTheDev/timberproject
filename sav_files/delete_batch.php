<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        include("../db_connection.php"); 	

        $sql = "UPDATE ta_season_batch_nos  SET status = 0 where batch_id = '".$_POST['batch_id']."'";
        $resp = $conn->query($sql);
        // echo "<pre>";print_r($resp);die;
        if($resp) {
          die(json_encode(array('message' => 'Batch deleted successfully')));
        } else {
            die(json_encode(array('message' => 'Batch not deleted')));
        }
    }
?>