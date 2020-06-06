<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php




session_start();
$cf=$_SESSION['cf'];

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
  //echo "Connected successfully";


  $sic="SELECT * FROM utenti WHERE cf='$cf'";
  $res = $conn->query($sic);
  if ($res-> num_rows > 0) {
    // output data of each row
    while($row = $res->fetch_assoc()) {
      $tipo=$row["tipo"];

    }

  }


if($tipo==1)
{
  echo'Accesso negato';
}
else {



  echo '
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

  <!-- =======================================================
  Theme Name: EstateAgency
  Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  Author: BootstrapMade.com
  License: https://bootstrapmade.com/license/
  ======================================================= -->
  </head>

  <body>
  <form  method="POST" enctype="multipart/form-data">
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
  <div class="container">
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
  aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span></span>
  <span></span>
  <span></span>
  </button>
  <a class="navbar-brand text-brand" >DUCATI</a>

  <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
  <ul class="navbar-nav">
  <li class="nav-item">
  <a class="nav-link" href="tutti_i_prodotti.php">Tutti i prodotti</a>
  </li>

  <li class="nav-item">
  <a class="nav-link" href="dashboard.php">Aggiungi</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="delete.php">Cancella prodotto</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="exit.php">Esci</a>
  </li>

  </ul>
  </div>


  </div>
  </nav>
  <!--/ Intro Single star /-->
  <section class="intro-single">
  <div class="container">
  <div class="row">
  <div class="col-md-12 col-lg-8">
  <div class="title-single-box">
  <h1 class="title-single">TUTTI I PRODOTTI</h1>';

  $mysqli_driver = new mysqli_driver ();
  $mysqli_driver-> report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

  //  $conn = new mysqli();
  $cont="SELECT * FROM moto";
  $i=0;
  $rs = $conn->query($cont);
  if ($rs-> num_rows > 0) {
    // output data of each row
    while($row = $rs->fetch_assoc()) {
      $i++;

    }
    echo'<h3>Totale prodotti:'.$i.'</h3>';
  }
  echo'

  </div>
  </div>
  <div class="col-md-12 col-lg-4">
  <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
  <ol class="breadcrumb">
  <li class="breadcrumb-item">

  </ol>
  </nav>
  </div>
  </div>
  </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
  <div class="container">
  <div class="row">
  <div class="col-sm-12">
  <div class="grid-option">



  </form>
  </div>
  </div>
  </form>';

  error_reporting(E_ERROR | E_PARSE);

    $query="SELECT * FROM moto";



  $result = $conn->query($query);



  if ($result-> num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      echo '<div class="col-md-4">';
      echo   '<div class="card-box-a card-shadow">';
      echo    '  <div class="img-box-a">';
      echo     '  <img src="picture/'.$row['foto'].'" "alt="Image"  class="img-a img-fluid">';
      echo      '</div>';
      echo     ' <div class="card-overlay">';
      echo '     <div class="card-overlay-a-content">';
      echo  '      <div class="card-header-a">';
      echo   '       <h2 class="card-title-a">';

      echo         '<font color="white"	>'. $row["fm"].'</font>';
      echo '         <font color="white">'  . $row["nome"].'</font>';
      echo    '   </h2>';
      echo   ' </div>';
      echo     ' <div class="card-body-a">';
      echo    '  <div class="price-box d-flex">';
      echo     '   <span class="price-a">PREZZO:' . $row["prezzo"].'€</span>';
      echo   ' </div>';


      echo     ' </div>';
      echo   ' <div class="card-footer-a">';
      echo    '  <ul class="card-info d-flex justify-content-around">';
      echo   '   <li>';
      echo  '    <h4 class="card-info-title" value="Potenza">Potenza</h4>';
      echo   '   <span>'. $row["potenza"].' CV';

      echo       ' </span>';
      echo    '  </li>';
      echo     ' <li>';
      echo    '  <h4 class="card-info-title">Coppia</h4>';
      echo     ' <span>'. $row["coppia"].' kgm</span>';
      echo     ' </li>';
      echo     ' <li>';
      echo      '  <h4 class="card-info-title">Peso</h4>';
      echo       ' <span>'. $row["peso"].' kg</span>';
      echo       ' </li>';

      echo     ' </ul>';
      echo    '  </div>';
      echo     ' </div>';
      echo    '</div>';
      echo   ' </div>';
      echo ' </div>';
    }
  }


  $conn->close();

  echo '

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
  </html>';
}
}
?>
