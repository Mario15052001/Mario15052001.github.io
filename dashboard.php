<?php error_reporting (E_ALL ^ E_NOTICE); ?>

<?php
session_start();
  $cf=$_SESSION['cf'];
if($_SESSION['login']==0)
{

  header('location:login/login.php');

}
else {


include 'configdb.php';

    $sic="SELECT * FROM utenti WHERE cf='$cf'";
    $ress = $conn->query($sic);
    if ($ress-> num_rows > 0) {
      // output data of each row
      while($row = $ress->fetch_assoc()) {
        $tipo=$row["tipo"];

      }

    }


  if($tipo==1)
  {
    echo'Accesso negato';
  }
  else {


 if (isset($_POST['btn'] )&& !empty($_POST['btn']))

{
  $fm=$_POST["scelta"];
  $nome=$_POST["moto"];
  $potenza=$_POST["potenza"];
  $coppia=$_POST["coppia"];
  $peso=$_POST["peso"];
  $prezzo=$_POST["prezzo"];
		$sql="insert into moto(id,fm,nome,potenza,coppia,peso,prezzo,foto) values('',?,?,?,?,?,?,?);";
    	if(($stmt=$conn->prepare($sql))) {
			$stmt->bind_param("ssiiiis",$fm,$nome,$potenza,$coppia,$peso,$prezzo,$image);

		}else
		{
			var_dump($conn->error);
		}


    $fm=$_POST["scelta"];
    $nome=$_POST["moto"];
    $potenza=$_POST["potenza"];
    $coppia=$_POST["coppia"];
    $peso=$_POST["peso"];
    $prezzo=$_POST["prezzo"];


		$target="picture/".basename($_FILES['image']['name']);
		$image=$_FILES['image']['name'];
		$image_tmp=$_FILES['image']['tmp_name'];

		if ($stmt->execute()) {



			if(move_uploaded_file($image_tmp, $target))
			{

				echo "<script>alert('Prodotto aggiunto con Successo');</script>";

			}
			else{

				echo "<script>alert('Caricamento fallito');</script>";



			}
		}


		$stmt->close();
	//	$_SESSION['msg']="Movie Successfully Added";
//	header ("Location: dashboard.php" );

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
    <?php
echo'
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
            <h1 class="title-single">Inserisci Prodotto</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">

        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
            </div>
          </div>
        </div>

        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
              <form  action="" method="post" enctype="multipart/form-data">
                <div id="sendmessage"></div>
                <div id="errormessage"></div>
                <div class="row">
                  <section class="property-grid grid">
                    <div class="container">
                      <div class="row">

                        <div class="col-sm-12">
                          <div class="box1">
                          <div class="grid-option">


                              </div>

                          </div>
                          <select name="scelta" class="col-md-6 mb-3">
                            <option value="Panigale">Panigale</option>
                            <option value="Multistrada">Multistrada</option>
                            <option value="Streetfighter">Streetfighter</option>
                              <option value="Diavel">Diavel</option>
                              <option value="Hypermotard">Hypermotard</option>
                              <option value="Monster">Monster</option>
                              <option value="Superleggera">Superleggera</option>
                              <option value="Supersport">Supersport</option>
                                <option value="Scambler">Scambler</option>
                          </select>
                        </div>


                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="moto" class="form-control form-control-lg form-control-a" placeholder="Nome Moto" >
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="potenza" class="form-control form-control-lg form-control-a" placeholder="Potenza" >
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="coppia" type="text" class="form-control form-control-lg form-control-a" placeholder="Coppia"  >
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="peso" class="form-control form-control-lg form-control-a" placeholder="Peso" >
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="prezzo" class="form-control form-control-lg form-control-a"  placeholder="Prezzo"></input>
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12">

                        <input type="file" class="btn btn-a" name="image" >




                  </div>

                  <br><br><br>
                  <br>
                  <div class="col-md-12">
                    <input  type="submit" name="btn" class="btn btn-a" onclick="AddProduct()"></input>

                  </div>
                </div>
              </form>
            </div>

  </section>



  <!--/ Contact End /-->
<br><br>
  <!--/ Footer End /-->



  <!-- JavaScript Libraries -->




</body>
</html>';
}
}
?>
