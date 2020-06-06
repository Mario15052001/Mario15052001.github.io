<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
error_reporting(E_ALL & ~E_STRICT & ~E_NOTICE); ?>

<?php
session_start();



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
  <!--/ Carousel Star /-->
    <div class="intro intro-carousel">
      <div id="carousel" class="owl-carousel owl-theme">
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(images/1.jpg)">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <p class="intro-title-top">
                        <br></p>
                      <h1 class="intro-title mb-4">
                        <span class="color-b"></span>
                        <br></h1>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item-a intro-item bg-image" style="background-image: url(images/1.jpg)">
          <div class="overlay overlay-a"></div>
          <div class="intro-content display-table">
            <div class="table-cell">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="intro-body">
                      <p class="intro-title-top">
                        <br></p>
                      <h1 class="intro-title mb-4">


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Carousel end /-->

<center>
<div class="col-md-3 col-lg-10">
  <br><br><br>
      <h1 ><font color="red">La Storia della Ducati</font></h1>
      <span class="color-text-a" align="justify"><p style="text-align: justify;">Nel 1924 lo studente di fisica Adriano Ducati divenne famoso per essere riuscito a compiere un esperimento di collegamento radio tra l’Italia e l’America con un’apparecchiatura a onde corte da lui ideata. Spinto dall’entusiasmo, con gli altri due fratelli Bruno e Marcello diede vita a Bologna nel 1926 alla “Società Scientiﬁca Radio Brevetti Ducati”, con l'intento di produrre componenti per la nascente industria delle trasmissioni radio. Il primo marchio rafﬁgurava due “S” che si incrociano sopra una saetta, simbolo dell’elettricità; nella parola “Ducati” la “V” era al posto della “U”, soluzione grafica del ventennio fascista. Dai condensatori radio, la produzione si allargò rapidamente alle apparecchiature radio e alle produzioni meccaniche di precisione, favorendo l’aumento dei dipendenti al punto tale che la Ducati divenne la realtà industriale bolognese più importante degli anni Trenta. L’allargamento della produzione, nel 1931, induce l’azienda a modiﬁcare il suo marchio; un cerchio con le lettere “SSR” e la parola “Ducati” all’interno di un rettangolo. Da questo marchio verrà estrapolato il tipico logotìpo, outline e in maiuscolo, che contrassegnerà tutta la comunicazione aziendale. In assenza di coordinazioni grafiche, nel 1940 gli apparecchi radio erano marchiati con un logotìpo calligrafico, tipico dell’epoca. Nel 1944 la fabbrica venne pesantemente danneggiata dai bombardamenti alleati; nel 1946 fu ricostruita parzialmente la fabbrica e fu realizzato il bicimotore Cucciolo, il primo prodotto motociclistico. Nel 1949 la Ducati inizia la produzione completa di motociclette e, pertanto, diventa necessario indicare sul serbatoio il nome del fabbricante. Nel 1956 l’azienda viene divisa per differenziare le produzioni elettrotecniche da quelle motociclistiche; il marchio “SSR” è troppo piccolo per essere visto e identifica, nel nome, la sola produzione elettrotecnica. Così nel 1956 su tutte le moto di produzione compare il nuovo marchio rafﬁgurante una corona d’alloro che completa idealmente la “D” del nome a formare una ﬁgura circolare; sovrapposta, una coppia di ali stilizzate su cui viveva la scritta “Ducati Meccanica Bologna”. Questo marchio conviveva con un altro rafﬁgurante una motocicletta sulla linea a scacchi tipica delle corse; veniva utilizzato solo sui libretti d’uso, per identificare le ofﬁcine autorizzate e su tutti i tipi di materiale pubblicitario. Nel 1959 compare sul serbatoio delle moto, come un’evoluzione dell’ala Ducati, l’aquilotto come simbolo di libertà; tale animale venne rappresentato con testa e zampe del rapace sulla scritta “Moto Ducati” inserita in una bandiera a doppia punta. Nel 1968, con la contestazione giovanile e il cosiddetto spirito “easy rider”, la Ducati punta sulla famosa ala nera, stilizzata e morbida, con la scritta Ducati in un insolito corsivo; è il marchio della moto destinata ad entrare nella storia della Ducati, lo Scrambler. Una curiosità: diversamente dagli altri marchi questo non era un adesivo ma una placca metallica che veniva avvitata al serbatoio. Nel 1969 il solo logotìpo Ducati in outline rosso farà la sua comparsa sulle moto, inizialmente nelle versioni destinate alle competizioni, poi sulla maggior parte della gamma. Nel 1975 la Ducati decide di inoltrarsi per la prima volta nel mondo del design; alcuni studi di moto e l’idea del nuovo marchio vengono afﬁdati ad un designer italiano: Giorgetto Giugiaro. Il marchio rappresenta il nome dell’azienda scritto in un carattere molto regolare formato da doppie linee parallele. Rimarrà in uso ﬁno al 1985, l’anno in cui la Cagiva rileva l’azienda e decide di modiﬁcare nuovamente il marchio Ducati adattandolo all’identità Cagiva, con l’utilizzo dello stesso carattere e dell’elefantino. Esteticamente non è un abbinamento troppo azzeccato; infatti nel 1993 l’elefantino scompare. Nel 1998, alla nuova gestione a partecipazione americana, viene proposto il nuovo marchio disegnato da Massimo Vignelli: il logotìpo in maiuscolo composto in Univers Italic, afﬁancato da un simbolo circolare che richiama la forma di una lettera “D” stilizzata. Gli appassionati Ducati, nell’iniziale difﬁcoltà di cogliere il signiﬁcato della “D” stilizzata, hanno ribattezzato amichevolmente il simbolo come “il chicco di caffè”! Venne disegnato anche il marchio della sezione corse, uno scudetto con gli elementi dell’identità. Nel 2008 il progetto del nuovo marchio è afﬁdato all’agenzia Landor di Milano; il nuovo marchio celebra l’emozione della curva, luogo e momento in cui una moto Ducati regala sensazioni uniche e impareggiabili. La curva è incastonata in uno scudetto di colore rosso, simbolo di vittoria e di sportività italiana, e sovrastata dal classico logotìpo Ducati. Così come per il 1998, viene progettato anche il marchio della sezione corse.
      </p></span>


      <div class="col-md-12 col-lg-4">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">

        </nav>
      </div>
    </div>
  </center>
  </div>
</section>
<!--/ footer Star /-->
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
                  <a href="index.php">Home</a>
                </li>
                <li class="list-inline-item">
                  <a href="property-grid.php">Prodotti</a>
                </li>
                <li class="list-inline-item">
                  <a href="contact.php">Contact</a>
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
