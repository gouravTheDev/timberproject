<?php
    session_start();
    include("../db_connection.php");

    if(!empty($_POST['id']))
    {
        $type = $_POST['glue_type'];
        $query= "update `ta_glue` set `glue_type` = '$type' where id = ".$_POST['id'];
    } else {
        $type = $_POST['glue_type'];
        $query= "INSERT INTO `ta_glue` (`glue_type`) VALUES ('$type')";
    }
    // echo $query;die;

    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">';
        echo 'window.location.href = "../total_glue.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Something Went Wrong");';
        echo 'window.location.href = "../add_glue.php";';
        echo '</script>';
    }

?>