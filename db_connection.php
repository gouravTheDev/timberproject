<?php
$servername = "localhost";
// $database = "techxtro_artist";
// $username = "techxtro_artist";
// $password = "techxtro_artist";

// $database = "kairostu_gbarter";
// $username = "kairostu_gbarter";
// $password = "i(7-!pn[V65SR(9i";

$database = "admin_timber";
$username = "admin_timber";
$password = "000000";


// $database = "i5385257_wp1";
// $username = "i5385257_wp1";
// $password = "2Nr+}DFf0@my";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
//echo "Connected successfully";
}
//exit();
?>
