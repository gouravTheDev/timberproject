<?php
    session_start();
    include("../db_connection.php");

    if(!empty($_POST['id']))
    {
        $type = $_POST['gradation'];
        $query= "update `ta_gradation` set `gradation` = '$type' where id = ".$_POST['id'];
    } else {
        $type = $_POST['gradation'];
        $query= "INSERT INTO `ta_gradation` (`gradation`) VALUES ('$type')";
    }
    // echo $query;die;

    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">';
        echo 'window.location.href = "../total_gradations.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Something Went Wrong");';
        echo 'window.location.href = "../add_gradation.php";';
        echo '</script>';
    }

?>