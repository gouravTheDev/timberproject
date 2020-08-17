<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        include("../db_connection.php"); 	

        $id = $_POST['id'];
        // echo "<pre>";print_r($llm_id);die;
        $sandsql = "SELECT ts.*,tsgt.id grid_id, tsgt.paper_grid FROM ta_sanding ts join ta_sanding_grid_types tsgt on (tsgt.id = ts.grid_type) where ts.boardmanu_id = '".$id."'";
        $resp = $conn->query($sandsql);
        	$respnew = $conn->query($sandsql);
        // if($resp->num_rows >= 1) {
    	    // ;
        $sno = 1;
        $data = [];
    	    while($rows=mysqli_fetch_assoc($resp))
    	    {
    	    	if($rows['type'] == 'old') {
    	    		$data['old'][] = "<tr>
                        <th>".$sno++."</th>
                        <th>".$rows['paper_grid']." </th>
                        <th>".$rows['brand']." </th>
                        <th>".$rows['qty']."</th>
                        <th>".$rows['end_grid_date']." </th>
                      </tr>";
                  }
    	    }
    	    $sno1 = 1;
    	    $datanew = [];
    	    while($rows=mysqli_fetch_assoc($respnew))
    	    {
    	    	if($rows['type'] == 'new') {
    	    		$datanew['new'][] = "<tr>
                        <th>".$sno1++."</th>
                        <th>".$rows['paper_grid']." </th>
                        <th>".$rows['brand']." </th>
                        <th>".$rows['qty']."</th>
                      </tr>";
                  }
    	    }
          // echo "<pre>";print_r($row);die;
          die(json_encode(array('data' => $data,'new'=>$datanew)));
        // } else {
          
        // }
	}
?>