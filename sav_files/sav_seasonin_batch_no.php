<?php
    session_start();
    include("../db_connection.php");

    if(!empty($_POST['batch_id']))
    {
        $type = $_POST['batch_no'];
        $query= "update `ta_season_batch_nos` set `batch_no` = '$type' where batch_id = ".$_POST['batch_id']." and chamber = '".$_POST['chamber']."'";
    } else {
        $type = $_POST['batch_no'];
        $query= "INSERT INTO `ta_season_batch_nos` (`batch_no`) VALUES ('$type')";
    }

    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">alert("Batch number updated successfully. ");';
        echo 'window.location.href = "../seasoning_input.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Batch number not updated. ");';
        echo 'window.location.href = "../seasoning_input.php";';
        echo '</script>';
    }

?>