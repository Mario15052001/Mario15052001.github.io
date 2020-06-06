<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php

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

$id=$_REQUEST['id'];
$sql="DELETE FROM carrelli WHERE id=$id";
$result = $conn->query($sql);
header('location:carrello.php');
?>
