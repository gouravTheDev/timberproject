<?php
    session_start();
    include("../db_connection.php");

    $bm_id = $_POST['bm_id'];
    $consumed = $_POST['consumed_qty'];
    $query= "update `ta_board_manufacturing` set `consumed` = ".$_POST['consumed_qty']." where bm_id = ".$_POST['bm_id'];
    // echo "<pre>";print_r($query);die;
    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">alert("Updated successfully");';
        echo 'window.location.href = "../sanding.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Something Went Wrong");';
        echo 'window.location.href = "../sanding.php";';
        echo '</script>';
    }

?>