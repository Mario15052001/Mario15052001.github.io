<?php error_reporting (E_ALL ^ E_NOTICE); ?>


<?php
session_start();

if($_SESSION['login']==0)
{

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

session_start();
$id=$_SESSION['id'];
$cf=$_SESSION['cf'];
$qt=$_POST["quantita"];
$f=0;
  $contr="SELECT * FROM carrelli WHERE status=0 and cf='$cf'";
  $rs = $conn->query($contr);
  if ($rs-> num_rows > 0) {
    while($row = $rs->fetch_assoc()) {
    $st=0;
      $id1=$row['id'];
      $cfr=$row['cf'];
      $st=$row['status'];
      echo $st;

      if($id1=$id && $cfr=$cf && $st==0 )
      {
        $f=1;
      }
      else {
        {
            $f=2;
        }
      }
    }
  }
          if($f==1)
          {
            $st=0;
          $sql1="update carrelli set quantita=quantita+? WHERE id = ? AND cf=? AND status=?;";
            $stmt=$conn->prepare($sql1);
            $stmt->bind_param("iisi",$qt,$id,$cf,$st);
            $stmt->execute();
       }
          else{
            $status=0;
            $sql="insert into carrelli(id,quantita,cf,status) values(?,?,?,?);";
            if(($stmt=$conn->prepare($sql))) {
              $stmt->bind_param("iisi",$id,$qt,$cf,$status);

            }else
            {
              var_dump($conn->error);
            }
            $stmt->execute();
            $stmt->close();
          }
header('location:carrello.php');
}

  ?>
