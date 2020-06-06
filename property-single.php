<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE); ?>

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
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="utf-8">
  <title>Ducati</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel="icon"
  type="image/png"
  href="https://cdn.dealerk.it/bikes/make/brand/128/ducati.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>



  <!--/ Nav Star /-->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
      aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <a class="nav-link10" href="login/login.php"><img src="images/lockred.png" width="50%"></a>
    <a class="navbar-brand text-brand" href="index.php">

      <img src="images/logo.png" width="20%">&nbsp;&nbsp;DUCATI</a>


      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <form action="property-grid.php">
              <a class="nav-link" href="property-grid.php">Prodotti</a>
            </form>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contatti</a>
          </li>
          <?php
          session_start();
          $cf=$_SESSION['cf'];
          $sql="SELECT * FROM utenti WHERE cf='$cf'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
            $nome=$row['nome'];
          }

          if($_SESSION['login']==0)
          {
          echo '

            <li class="nav-item">
              <center><a class="nav-link" href="login/login.php"><img src="images/profilo.png" width="50%"></a></center>
            </li>';

          }
          else {
            echo'
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="profilo.php" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <center><img src="images/profilo.png" width="50%"></center>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profilo.php">Profilo di '.$nome.'</a>
                <a class="dropdown-item" href="exit.php">Esci</a>

              </div>
            </li>';

        }?>
        <li class="nav-item">
          <center><a class="nav-link" href="carrello.php"><img src="images/carrello.png" width="50%"></a></center>
        </li>
        </ul>
      </div>


    </div>
  </nav>
  <!--/ Nav End /-->
  <?php error_reporting (E_ALL ^ E_NOTICE);
  error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE); ?>
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

//Invece di recuperare il parametro settato nella SESSION recupero il Request-Parameter passato
$id=$_REQUEST['id'];
$sql="SELECT * FROM moto WHERE id=$id";
$result = $conn->query($sql);

$mysqli_driver = new mysqli_driver ();
$mysqli_driver-> report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

$conn = new mysqli();
session_start();
if ($result-> num_rows > 0) {
  while($row = $result->fetch_assoc()) {

echo'

    <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">'.$row['nome'].'</h1>
            <span class="color-text-a">'.$row['fm'].'</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="property-grid.php">Prodotti</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                '.$row['nome'].'
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <img src="picture/'.$row['foto'].'" "alt="Image"  class="img-a img-fluid">
          </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">

                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">Prezzo:'.$row['prezzo'].'€</h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Specifiche</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Codice:</strong>
                      <span>'.$row['id'].'</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Potenza:</strong>
                      <span>'.$row['potenza'].' CV</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Coppia:</strong>
                      <span>'.$row['coppia'].' kgm</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Peso:</strong>
                      <span>'.$row['peso'].' kg</span>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
              ';
                    $_SESSION['id']=$row['id'];
                  '
                  </div>
                </div>
              </div>


                </div>
              </div>
            </div>
          </div>
        </div>';

}
}
?>
<br>
<br>
<form action="carr.php" method="post">
<div class="col-md-7 col-lg-7 section-md-t3">
  <div class="row">
    <div class="col-sm-4">
  <div class="row">

    <input name="quantita" type="number" class="form-control form-control-lg form-control-a" placeholder="Qt." data-rule="quatita" data-msg="Inserisci una quantità">
  </form>
  <br>  <br>  <br>  <br>
<?php
session_start();
if($_SESSION['login']==0){

echo'
      <a href="/login/login.php">
        <input  type="submit" name="btn" class="btn btn-a" value="Aggiungi al carrello"></input></a>';
      }
      else{
        echo'
              <a href="carr.php">
                <input  type="submit" name="btn" class="btn btn-a" value="Aggiungi al carrello"></input></a>';
      }
         ?>
        </div>
      </div>
    </div>
<div>
</section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
<?php } ?>
