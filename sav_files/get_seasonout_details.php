<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        include("../db_connection.php"); 	

        $sql = "SELECT tso.*,twt.wood_type,twt.id wood_id,sbn.batch_no FROM ta_seasoning_output tso join ta_wood_type twt on (twt.id = tso.type_of_wood) join ta_season_batch_nos sbn on (tso.seasonout_batch = sbn.batch_id) where tso.seasonout_id = '".$_POST['id']."'";
        $resp = $conn->query($sql);

        if($resp->num_rows >= 1) {
    	    $row=mysqli_fetch_assoc($resp);
          // echo "<pre>";print_r($row);die;
          die(json_encode(array('data' => $row)));
        } else {
          
        }
	}
?>