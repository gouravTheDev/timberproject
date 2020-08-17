<?php   
    session_start();
    if(empty($_SESSION['loggedin_id']))
    {
        header("location: index.php");
    } else {
        // echo "<pre>";print_r($_POST); die;
        if(!empty($_POST['type_of_wood'])) {
           // echo "<pre>";print_r($_POST); die;
            include("../db_connection.php");    
            $seasonin_id = $_GET['seasonin_id'];
            $type_of_wood = $_POST['type_of_wood'];
            $seasonin_batch = $_POST['seasonin_batch'];
            $input_date = $_POST['input_date'];
            $input_time = $_POST['input_time'];
            $trolly1_weight = $_POST['trolly1_weight'];
            $trolly1 = $_POST['trolly1'];
            $trolly2_weight = $_POST['trolly2_weight'];
            $trolly2 = $_POST['trolly2'];
            $moisture_level = $_POST['moisture_level'];
            $thickness = $_POST['thickness'];
            if(isset($_POST['chamber'])) {
                $chamber = $_POST['chamber'];
            } else {
                $chamber = $_POST['chamber2'];
            }       

            $query= "UPDATE `ta_seasoning_input` SET `type_of_wood` = '".$type_of_wood."', `seasonin_batch` = '".$seasonin_batch."', `input_date` = '".$input_date."', `input_time` = '".$input_time."', `trolly1_weight` = '".$trolly1_weight."', `trolly1` = '".$trolly1."', `trolly2_weight` = '".$trolly2_weight."', `trolly2` = '".$trolly2."', `moisture_level` = '".$moisture_level."', `thickness` = '".$thickness."',`chamber` = '".$chamber."' where seasonin_id = '".$seasonin_id."'";  
            // die;
            $resp = $conn->query($query);

            echo '<script language="javascript">alert("Updated successfully");';
            echo 'window.location.href = "../seasoning_input.php";';
            echo '</script>';
            
        } else {
            echo '<script language="javascript">alert("Not updated");';
            echo 'window.location.href = "../seasoning_input.php";';
            echo '</script>';
        }
    }

?>