
<?php
require('fpdf.php');
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







class PDF extends FPDF {

  function Header(){
    $this->SetFont('Arial','B',15);
    $user=$_SESSION['u'];


    //    $user='mario';
    //dummy cell to put logo
    //$this->Cell(12,0,'',0,0);
    //is equivalent to:
    $this->Cell(12);

    //put logo

    //  $this->Cell(40,30,'Spett.le',50,50);




    //dummy cell to give line spacing
    $this->Cell(0,5,'',0,1);
    $this->Cell(0,5,'',0,1);
    $this->Cell(0,5,'',0,1);
    $this->Cell(0,10,'',0,1);

    //is equivalent to:
    $this->Ln(5);
    $this->SetFont('Arial','B',20);
    $this->SetDrawColor(1,1,255);
    $this->Cell(40,30,'Spett.le',50,50,'',);
    $this->Cell(40,10,$user,50,50);
    $this->Cell(50,10,$user,50,50);
    $this->Cell(0,5,'',0,1);
    $this->Cell(0,5,'',0,1);
    $this->Cell(0,5,'',0,1);
    $this->Cell(0,10,'',0,1);
    $this->SetFont('Arial','B',11);



    $this->SetFillColor(180,180,255);
    $this->SetDrawColor(180,180,255);


  }
  function Footer(){
    //add table's bottom line
    $this->Cell(190,0,'','T',1,'',true);

    //Go to 1.5 cm from bottom
    $this->SetY(-15);

    $this->SetFont('Arial','',8);

    //width = 0 means the cell is extended up to the right margin
    $this->Cell(0,10,'Page '.$this->PageNo()." / {pages}",0,0,'C');
  }
}


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4'); //use new class
$cf=$_SESSION['cf'];
$nm=$_SESSION['nm'];
$cogn=$_SESSION['cogn'];
$ind=$_SESSION['ind'];
$citta=$_SESSION['citta'];
$prov=$_SESSION['prov'];

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',9);

$pdf->SetDrawColor(180,180,255);
$pdf->SetDrawColor(180,180,255);
$pdf->Image('images/logo.png',40,10,30);
$pdf->Cell(-50,10,'Riepilogo Ordine',10,10);

$pdf->Cell(40,50,'Spett.le',10,'R',0);
$pdf->Cell(10,65,$nm,10,1,'R',0);
$pdf->Cell(67,-65,$cogn,10,0,'R',0);
$pdf->Cell(-12,-55,$ind,10,0,'R',0);
$pdf->Cell(0.0001,-45,$citta,10,0,'R',0);
$pdf->Cell(5,-45,$prov,10,0,'R',0);
$pdf->Cell(8,-35,$cf,10,0,'R',0);


$pdf->Cell(0,5,'',0,1);


$pdf->Cell(25,5,'Codice',1,0,'C',0);
$pdf->Cell(25,5,'Tipo',1,0,'C',0);
$pdf->Cell(25,5,'Modello',1,0,'C',0);
$pdf->Cell(25,5,'Potenza',1,0,'C',0);
$pdf->Cell(25,5,'Coppia',1,0,'C',0);
$pdf->Cell(25,5,'Peso',1,0,'C',0);
$pdf->Cell(25,5,'Quantita',1,0,'C',0);
$pdf->Cell(25,5,'Prezzo',1,0,'C',0);
$carr="SELECT * FROM carrello";
$result = $conn->query($carr);
while($data=$result->fetch_assoc()){

}


$carr="SELECT * FROM carrello";
$result = $conn->query($carr);
while($data=$result->fetch_assoc()){
  $pdf->Cell(25,5,$data['id'],'L',1);
  $pdf->Cell(25,5,$data['id'],1);
  $pdf->Cell(25,5,$data['fm'],1);


  $pdf->Cell(25,5,$data['nome'],1);

  $pdf->Cell(25,5,$data['potenza'],1);
  $pdf->Cell(25,5,$data['coppia'],1);
  $pdf->Cell(25,5,$data['peso'],1);
  $pdf->Cell(25,5,$data['quantita'],1);
  $pdf->Cell(25,5,$data['prezzo']."EUR",1);


}
$pdf->Output();
?>
