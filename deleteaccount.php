
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


session_start();
$cf=$_SESSION['cf'];


$query="DELETE FROM utenti WHERE cf='$cf'";
$result = $conn->query($query);
  header('location:index.php');
  $_SESSION['login']=0;

?>
