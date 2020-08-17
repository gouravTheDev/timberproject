<?php
    session_start();
    include("../db_connection.php");
    if(!empty($_POST['id']))
    {
        $type = $_POST['wood_type'];
        $query= "update `ta_wood_type` set `wood_type` = '$type' where id = ".$_POST['id'];
    } else {
        $type = $_POST['wood_type'];
        $query= "INSERT INTO `ta_wood_type` (`wood_type`) VALUES ('$type')";
    }

    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">';
        echo 'window.location.href = "../total_wood_types.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Something Went Wrong");';
        echo 'window.location.href = "../add_wood_type.php";';
        echo '</script>';
    }

?>