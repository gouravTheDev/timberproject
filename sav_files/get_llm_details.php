<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        include("../db_connection.php"); 	

        $llm_id = $_POST['id'];
        // echo "<pre>";print_r($llm_id);die;
        $sql = "SELECT llm.*,wt.id wood_id,wt.wood_type,sbn.batch_id,sbn.batch_no season_batch_no FROM ta_ll_manufacturing llm join ta_wood_type wt on (wt.id = llm.type_of_wood) join ta_season_batch_nos sbn on (sbn.batch_id = llm.batch_no) where llm.llm_id = '".$llm_id."' and llm.status = 1";
        $resp = $conn->query($sql);

        if($resp->num_rows >= 1) {
    	    $row=mysqli_fetch_assoc($resp);
          // echo "<pre>";print_r($row);die;
          die(json_encode(array('data' => $row)));
        } else {
          
        }
	}
?>