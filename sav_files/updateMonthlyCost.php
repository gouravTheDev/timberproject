<?php	
	session_start();
	if(empty($_SESSION['loggedin_id']))
	{
		header("location: index.php");
	} else {
        if(!empty($_POST['add_monthly_cost'])) {
           // echo "<pre>";print_r($_POST);die;
            include("../db_connection.php"); 

            $labourCost = $_POST['labourCost'];
            $electricCost = $_POST['electricCost'];
            $misCost = $_POST['misCost'];

            $totalCost = (int)$labourCost + (int)$electricCost + (int)$misCost;

            $sqlMonthlyCost = "SELECT * FROM ta_monthly_cost";
            $respMonthlyCost = $conn->query($sqlMonthlyCost);

            if(mysqli_num_rows($respMonthlyCost)>0){
            	$update = "update `ta_monthly_cost` set `labour_cost`= '$labourCost', `electric_cost`= '$electricCost',`mis_cost`= '$misCost',`total_cost`= '$totalCost' ";
                $respUpdate = $conn->query($update);
                if ($respUpdate) {
     //            	header('Content-Type: application/json; charset=UTF-8');
					// die(json_encode(array('message' => 'Record Inserted')));
					echo "<script>alert('Data Updated!'); window.location.href='/production_costing_report.php'; </script>";
                }
            }else{
            	$query= "INSERT INTO `ta_monthly_cost` (`labour_cost`, `electric_cost`, `mis_cost`, `total_cost`) 
	            VALUES ('$labourCost', '$electricCost', '$misCost', '$totalCost')";	

	            $resp = $conn->query($query);
	            if ($resp) {
	    //         	header('Content-Type: application/json; charset=UTF-8');
					// die(json_encode(array('message' => 'Record Inserted')));
					echo "<script>alert('Data Updated!'); window.location.href='/production_costing_report.php'; </script>";
	            }

            }
        }
    }
