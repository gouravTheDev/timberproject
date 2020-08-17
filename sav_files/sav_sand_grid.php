<?php
    session_start();
    include("../db_connection.php");

    if(!empty($_POST['id']))
    {
        $type = $_POST['paper_grid'];
        $query= "update `ta_sanding_grid_types` set `paper_grid` = '$type' where id = ".$_POST['id'];
    } else {
        $type = $_POST['paper_grid'];
        $query= "INSERT INTO `ta_sanding_grid_types` (`paper_grid`) VALUES ('$type')";
    }
    // echo $query;die;

    if ($conn->query($query) === TRUE) {
        echo '<script language="javascript">';
        echo 'window.location.href = "../total_paper_grids.php";';
        echo '</script>';
    } else {
        echo '<script language="javascript">alert("Something Went Wrong");';
        echo 'window.location.href = "../add_sanding_paper.php";';
        echo '</script>';
    }

?>