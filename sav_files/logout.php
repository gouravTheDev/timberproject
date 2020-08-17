<?php
	session_start();
	include("../db_connection.php");	

	unset($_SESSION['loggedin_id']);
	unset($_SESSION['email']);
	unset($_SESSION['name']);
	// Finally, destroy the session.    
	// session_destroy();
	$_SESSION = array();
	header("location: ../index.php");
	session_destroy();
?>