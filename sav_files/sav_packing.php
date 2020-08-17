<?php
    session_start();
    include("../db_connection.php");    
    
    $sql = "select * from ta_packing order by packing_id  ASC limit 1";
    $resp = $conn->query($sql);
    $rows = $resp->fetch_assoc();

    if(!empty($rows)) {
        $end_date = $rows['end_date'];
    } else {
        $end_date = '0000-00-00';
    }
// echo "<pre>";print_r($_POST);die();
    $board_id = $_POST['board_id'];
    $start_date = $_POST['start_date'];    
    $roll_no = $_POST['roll_no'];
    $weight = $_POST['weight'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $brand = $_POST['brand'];
    $date = $_POST['date'];

    $selectOldPackingtype = "select * from ta_packing where type = $type order by packing_id DESC limit 1";
    $resp = $conn->query($selectOldPackingtype);
    // $selectOldGridtypeRep = mysqli_fetch_row($resp);
    if($resp->num_rows >= 1) {
        $rowsaa = mysqli_fetch_array($resp);                        
    }

    if(!empty($rowsaa))
    {
        $updateEndDate = "update `ta_packing` set `end_date` = '".$end_date."',status = 0 where packing_id = ".$rowsaa['packing_id'];
        $conn->query($updateEndDate);
    }

    $query= "INSERT INTO `ta_packing`(`start_date`, `roll_no`, `weight`, `type`, `quantity`, `brand`, `date`,`boardmanu_id`) 
             VALUES ('$start_date', '$roll_no', '$weight', '$type', '$quantity', '$brand', '$date','$board_id')";
    // die;
    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript"> alert("Record inserted successfully");';
        echo 'window.location.href = "../packing.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Record not inserted");';
        echo 'window.location.href = "../packing.php";';
        echo '</script>';
    }
    
?>