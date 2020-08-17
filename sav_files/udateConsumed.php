<?php
    session_start();
    include("../db_connection.php");

    $llm_id = $_POST['llm_id'];
    $consumed = $_POST['consumed_qty'];
    $query= "update `ta_ll_manufacturing` set `consumed` = ".$_POST['consumed_qty']." where llm_id = ".$_POST['llm_id'];

    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">alert("Updated successfully");';
        echo 'window.location.href = "../board_manufacturing.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Something Went Wrong");';
        echo 'window.location.href = "../board_manufacturing.php";';
        echo '</script>';
    }

?>