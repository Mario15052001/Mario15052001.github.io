<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php




session_start();
if($_SESSION['login']==0){
  header('location:login/login.php');
}
else {

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
$id=$_POST['id'];

$query="DELETE FROM moto WHERE id=$id";



$result = $conn->query($query);

header('location:delete.php');



}
?>
