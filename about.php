<?php
error_reporting (E_ALL ^ E_NOTICE);
require_once 'dompdf/dompdf/autoload.inc.php';
$mysqli_driver = new mysqli_driver ();
$mysqli_driver-> report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
$conn = new mysqli();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ducati";
$conn = new mysqli($servername, $username, $password ,$dbname);
if ($conn->connect_error) {
  die("Connection failed: <br>" . $conn->connect_error);
}
session_start();

$cf=$_SESSION['cf'];


use Dompdf\Dompdf;
$pdf = new Dompdf();


ob_start();
?>
<?php
$ord=$_SESSION['ord'];
$status=1;



$sql="SELECT * FROM utenti WHERE cf='$cf' ";
$result = $conn->query($sql);
if ($result-> num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $nome=$row['nome'];
    $cognome=$row['cognome'];
    $tip=$row['tipo_ind'];
    $ind=$row['indirizzo'];
    $citta=$row['citta'];
    $prov=$row['provincia'];
    $cf=$row['cf'];


  }}

  $carr="SELECT * FROM carrelli WHERE cf='$cf'";
  $rs = $conn->query($carr);
  if ($rs-> num_rows > 0) {
    while($row = $rs->fetch_assoc()) {
      $ord=$row['ordineID'];
      $num=$row['n.doc'];

    }}




    ?>
    <table>
      <tr>
        <td><img src="" alt=""><h1>Ducati</h1></td>
      </tr>
      <tr>
        <td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><h2>Spett.le<br><?php echo $nome.'&nbsp;'.$cognome.'<br>'.$tip.'&nbsp;'.$ind.'<br>'.$citta.'('.$prov.')<br>C.F.:&nbsp;'.$cf.'<br>'; ?></h2></td>
        </table>
        <table border="5" width="100%">
          <tr>
            <td><h3>Cod. Art.</h3></td><td>Tipo</td><td>Prodotto</td><td>Potenza</td><td>Coppia</td><td>Peso</td><td>Prezzo</td><td>Quantità</td><td>Totale Prezzo</td>
            <?php

            $carr="SELECT moto.id,moto.fm,moto.nome,moto.prezzo,moto.potenza,moto.coppia,moto.peso,carrelli.quantita,moto.prezzo
                    FROM moto,carrelli
                    WHERE carrelli.status=0
                    AND carrelli.cf='$cf'
                    AND carrelli.id=moto.id";
            $rs = $conn->query($carr);
            if ($rs-> num_rows > 0) {
              while($row = $rs->fetch_assoc()) {
                $ordid=$row['ordineID'];
                $prezzod=$row['prezzo']*$row['quantita'];
                $prezzot=$prezzot+$prezzod;
                echo'<tr><td><h4>'.$row['id'].'</h4></td>
                      <td><h4>'.$row['fm'].'</h4></td>
                      <td><h4>'.$row['nome'].'</h4></td>
                      <td><h4>'.$row['potenza'].'CV</h4></td>
                      <td><h4>'.$row['coppia'].'kgm</h4></td>
                      <td><h4>'.$row['peso'].'kg</h4></td>
                      <td><h4>€'.$row['prezzo'].'</h4></td>
                      <td><h4>'.$row['quantita'].'</h4></td>
                      <td><h4>€'.$prezzod.'</h4></td>
                      </tr>';
              }}
              $sql1="update carrelli set status=? WHERE status=0 AND cf=?";
               $stmt=$conn->prepare($sql1);
               $stmt->bind_param("is",$status,$cf);
               $stmt->execute();
              ?>
            </tr>
          </table>
          <table >
            <tr>
              <td>Totale:€<?php echo $prezzot;?></td>
            </tr>
          </table>

          <?php


          $html=ob_get_clean();
          $pdf->loadHtml($html);

          // (Optional) Setup the paper size and orientation
          $pdf->setPaper('A4', 'landscape');

          // Render the HTML as PDF
          $pdf->render();

          // Output the generated PDF to Browser
          $pdf->stream('result.pdf', Array('Attachment'=>0));

          ?>
