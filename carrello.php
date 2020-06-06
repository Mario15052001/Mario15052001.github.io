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
    <?php


            $cf=$_SESSION['cf'];
            $carr="SELECT moto.id,moto.fm,moto.nome,moto.prezzo,carrelli.quantita,moto.prezzo FROM moto,carrelli WHERE carrelli.status=0 AND carrelli.cf='$cf' AND carrelli.id=moto.id";
            $result = $conn->query($carr);





            echo '<br><br><br><br><br><br><br><br><br><br><table border=1 width=90% align="center">';
            echo '<tr><td><font color="black">Codice</font></td>
                      <td><font color="black">Famiglia</font></td>
                      <td><font color="black">Modello</font></td>
                      <td><font color="black">Prezzo Unitario</font></td>
                      <td><font color="black">Quantità</font></td>
                      <td><font color="black">Prezzo</font></td>
                      <td><font color="black">Elimina</font></td>
                 </tr>';
                 $prezzot=0;
            if ($result-> num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $prezzod=$row['prezzo']*$row['quantita'];
                $prezzot=$prezzot+$prezzod;
                echo '<tr>
                          <td><font color="black">'.$row['id'].'</font></td>
                          <td><font color="black">'.$row['fm'].'</font></td>
                          <td><font color="black">'.$row['nome'].'</font></td>
                          <td><font color="black">€'.$row['prezzo'].'</font></td>
                          <td><font color="black">'.$row['quantita'].'</font></td>
                          <td><font color="black">€'.$prezzod.'</font></td>
                          <td><a href="cancp.php?id='.$row['id'].'"><img src="images/cancella.png" height="70%"></a></td>
                      </tr>';

                        $_SESSION['ord']=$row['ordineID'];





              }}



              echo'</table><br>';

              echo '<div class="prezzo">
              <table border=1 align=right valing=middle>

              <tr><td><h4>Totale Prezzo</h4></td></tr>
              <tr><td><h4>€ '.$prezzot.'</h4></td></tr>

            </table></div>';


              $conn->close();


              ?>
              <br>
              <br>


              <div class="col-md-3 col-lg-10">


              <a href="acquista.php">
              <input type="submit" class="btn btn-as" value="Svuota Carrello"></a><br><br>
              <?php

              if($_SESSION['login']==0)
              {

                header('location:login/login.php');

              }
              else {

              echo '

              <a href="about.php" target="_blank">
              <input type="submit" class="btn btn-as" value="Acquista"></a>

              </div>';


            }
              ?>
</div>

  <!--/ footer Star /-->
</section>
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
  <?php }  ?>
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
