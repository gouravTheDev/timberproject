<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        include("../db_connection.php"); 	

        $sql = "UPDATE ta_packing_material SET status = 0 where pm_id = '".$_GET['id']."'";
        $resp = $conn->query($sql);
    
        if($resp) {
          die(json_encode(array('message' => 'Deleted successfully')));
        } else {
            die(json_encode(array('message' => 'Not deleted')));
        }
    }
?>