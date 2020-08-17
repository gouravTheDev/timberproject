<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        include("../db_connection.php"); 	
        // echo "<pre>";print_r($_GET);die;
        $sql = "UPDATE ta_raw_glue SET status = 0 where rg_id = '".$_GET['id']."'";
        $resp = $conn->query($sql);
        // echo "<pre>";print_r($resp);die;
        if($resp) {
          die(json_encode(array('message' => 'Deleted successfully')));
        } else {
            die(json_encode(array('message' => 'Not deleted')));
        }
    }
?>