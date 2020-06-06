
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
$carr="SELECT * FROM carrello";
session_start();
/*
require('fpdf.php');
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
		$this->Image('images/logo.png',70,10,30);

		$this->Cell(10,15,'Riepilogo Ordine',0,50);
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

		$this->Cell(25,5,'Codice',1,0,'',true);
		$this->Cell(25,5,'Tipo',1,0,'',true);
		$this->Cell(25,5,'Modello',1,0,'',true);
		$this->Cell(25,5,'Potenza',1,0,'',true);
    $this->Cell(25,5,'Coppia',1,0,'',true);
    $this->Cell(25,5,'Peso',1,0,'',true);
    $this->Cell(25,5,'Quantita',1,0,'',true);
    $this->Cell(25,5,'Prezzo',1,0,'',true);

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

$pdf = new PDF('P','mm','A4'); //use new class

//define new alias for total page numbers
$pdf->AliasNbPages('{pages}');

$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();

$pdf->SetFont('Arial','',9);

$pdf->SetDrawColor(180,180,255);
$pdf->SetDrawColor(180,180,255);

$carr="SELECT * FROM carrello";
$result = $conn->query($carr);
while($data=$result->fetch_assoc()){
	$pdf->Cell(25,5,$data['id'],'LR',1);
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
*/

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mario Autore');
$pdf->SetTitle('Riepilogo Ordine');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<h1>porco dio</h1>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+



?>
