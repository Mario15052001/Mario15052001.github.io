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

$carr="SELECT moto.fm,moto.nome,moto.potenza,moto.coppia,moto.peso,moto.prezzo,
              utenti.nome,utenti.cognome,utenti.tipo_ind,utenti.indirizzo,
              utenti.citta,utenti.provincia,carrelli.quantita
              FROM moto,carrelli,utenti
              WHERE utenti.cf='DLLSRRANGL2001'
              AND moto.id='3'
              AND carrelli.ordineID='1' ";

$result = $conn->query($carr);

if ($result-> num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo 'nome:Mario<br>';
    echo 'cognome:Autore<br>';
    echo 'tipo_ind:Via<br>';
    echo 'indirizzo:Rossi<br>';
    echo 'citta:Reino<br>';
    echo 'provincia:BN<br>';
    echo 'fm:'.$row['fm'].'<br>';
    echo 'nome:950<br>';
    echo 'potenza:'.$row['potenza'].'<br>';
    echo 'coppia:'.$row['coppia'].'<br>';
    echo 'peso:'.$row['peso'].'<br>';
    echo 'prezzo:'.$row['prezzo'].'<br>';
    echo 'quantità:'.$row['quantita'].'<br>';


  }}


?>
