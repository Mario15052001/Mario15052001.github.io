<?php
/*if (!session_id()) {
	# code...
	session_start();
}*/

$mysqli_driver = new mysqli_driver ();
$mysqli_driver-> report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

$conn = new mysqli();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ducati";

// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: <br>" . $conn->connect_error);
}
echo "Connected successfully";
?>
