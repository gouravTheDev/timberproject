<?php
    session_start();
    include("../db_connection.php");
    if(!empty($_POST['id']))
    {
        $type = $_POST['packing_type'];
        $query= "update `ta_packing_type` set `packing_type` = '$type' where id = ".$_POST['id'];
    } else {
        $type = $_POST['packing_type'];
        $query= "INSERT INTO `ta_packing_type` (`packing_type`) VALUES ('$type')";
    }

    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">';
        echo 'window.location.href = "../total_packing_types.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Something Went Wrong");';
        echo 'window.location.href = "../add_packing_type.php";';
        echo '</script>';
    }

?>