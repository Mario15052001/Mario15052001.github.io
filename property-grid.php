<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE); ?>

<?php
session_start();

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

  <?php
 error_reporting (E_ALL ^ E_NOTICE);

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
  <!--/ Intro Single star /-->
  <form  method="POST" enctype="multipart/form-data">
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">I Nostri Prodotti</h1>
              <?php
              $scelta=$_POST["scelta"];
              switch ($scelta) {
                case "1":

                echo'<h3>Hai scelto Panigale</h3>';
                break;
                case "2":
                echo'<h3>Hai scelto Multistrada</h3>';
                break;
                case "3":
                echo'<h3>Hai scelto Streetfighter</h3>';
                break;
                case "4":
                echo'<h3>Hai scelto Diavel</h3>';
                break;
                case "5":
                echo'<h3>Hai scelto Hypermotard</h3>';
                break;
                case "6":
                echo'<h3>Hai scelto Monster</h3>';
                break;
                case "7":
                echo'<h3>Hai scelto Superleggera</h3>';
                break;
                case "8":
                echo'<h3>Hai scelto Supersport</h3>';
                break;
                case "9":
                echo'<h3>Hai scelto Scambler</h3>';
                break;


              }
              ?>

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

                <select name="scelta" class="custom-select">
                  <option value="0">All</option>
                  <option value="1">Panigale</option>
                  <option value="2">Multistrada</option>
                  <option value="3">Streetfighter</option>
                  <option value="4">Diavel</option>
                  <option value="5">Hypermotard</option>
                  <option value="6">Monster</option>
                  <option value="7">Superleggera</option>
                  <option value="8">Supersport</option>
                    <option value="9">Scambler</option>
                </select>
                <input type="submit" class="btn btn-as" value="INVIA">
              </form>
            </div>
          </div>
        </form>
        <?php
        error_reporting(E_ERROR | E_PARSE);
        $scelta=$_POST["scelta"];

        if($scelta==0)
        {
          $query="SELECT * FROM moto";

        }
        else if($scelta==1)
        {
          $query="SELECT * FROM moto where fm='Panigale'";
        }
        else if($scelta==2)
        {
          $query="SELECT * FROM moto where fm='Multistrada'";
        }
        else if($scelta==3)
        {
          $query="SELECT * FROM moto where fm='Streetfighter'";
        }
        else if($scelta==4)
        {
          $query="SELECT * FROM moto where fm='Diavel'";
        }
        else if($scelta==5)
        {
          $query="SELECT * FROM moto where fm='Hypermotard'";
        }
        else if($scelta==6)
        {
          $query="SELECT * FROM moto where fm='Monster'";
        }
        else if($scelta==7)
        {
          $query="SELECT * FROM moto where fm='Superleggera'";
        }
        else if($scelta==8)
        {
          $query="SELECT * FROM moto where fm='Supersport'";
        }
        else if($scelta==9)
        {
          $query="SELECT * FROM moto where fm='Scambler'";
        }




        $result = $conn->query($query);

        $mysqli_driver = new mysqli_driver ();
        $mysqli_driver-> report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;

        $conn = new mysqli();

        if ($result-> num_rows > 0) {
          while($row = $result->fetch_assoc()) {



            echo '<div class="col-md-4">';?>

            <form action="property-single.php" method="post">


<?php


            echo '<a href="property-single.php?id='.$row['id'].'">';
            echo   '<div class="card-box-a card-shadow">';
            echo      '<div class="img-box-a">';
            echo '<a href="property-single.php?id='.$row['id'].'">';
            echo       '<img src="picture/'.$row['foto'].'" "alt="Image"  class="img-a img-fluid">';
            echo      '</div>';
            echo     '<div class="card-overlay">';
            echo '     <div class="card-overlay-a-content">';
            echo  '      <div class="card-header-a">';
            echo   '       <h2 class="card-title-a">';

            echo         '<font color="white"	>'. $row["fm"].'</font>';
            echo '         <font color="white" >'  . $row["nome"].'</font>';
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
            echo      '  <h4 class="card-info-title" name="id"></h4>';
            echo       ' </li>';
            echo     ' </ul>';
            echo '</a>';
            echo    '  </div>';
            echo     ' </div>';
            echo    '</div>';
            echo   ' </div>';


?><?php
    echo'</form>';
        echo '</div>';



          }
        }


        $conn->close();
        ?>
        <!--/ footer Star /--></section>
        <section class="section-footer">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                  <div class="w-header-a">
                    <h3 class="w-title-a text-brand">Ducati spa</h3>
                  </div>
                  <div class="w-body-a">
                    <p class="w-text-a color-text-a">
                      Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                      sed aute irure.
                    </p>
                  </div>
                  <div class="w-footer-a">
                    <ul class="list-unstyled">
                      <li class="color-a">
                        <span class="color-text-a">Phone .</span> contact@example.com</li>
                        <li class="color-a">
                          <span class="color-text-a">Email .</span> +54 356 945234</li>
                        </ul>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
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
                          <a href="#">Prodotti</a>
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
                        <span class="color-a">Mario Autore - 5IA</span> All Rights Reserved.
                      </p>
                    </div>
                    <div class="credits">
                      <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
                    -->
                    Designed by Mario Autore
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
