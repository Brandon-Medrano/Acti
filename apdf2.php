
<?php


require('./fpdf/fpdf.php');
require('./php/conexion.php');



$pdf=new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('./recursos/dgg.png' , 10 , 13, 18 , 13,'PNG');
$pdf->Cell(28, 20, '', 0);
$pdf->Cell(120, 9, '               Formato para Programa de Trabajo.', 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 9, 'Codigo: SNEST-AD-PO-001-03'.date('').'', 1);
$pdf->Ln(9);
$pdf->Cell(28, 20, '', 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(120,9, '              Referencia a punto  de la norma ISO  9001:2008 6.3,6,4', 1);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 9, 'Revision:0'.date('').'', 1);

$pdf->Ln(14);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 9, '', 0);
$pdf->Cell(100, 9, 'Programa de mantenimiento Preventivo', 0);


$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(27, 8, '', 0);
$pdf->Cell(120, 8, 'Semestre ENERO-DICIEMBRE', 0);
$pdf->Cell(135, 8,utf8_decode ('Año: 2016'), 0);
 



$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(5, 8, 'No', 1);
$pdf->Cell(100, 8, 'servicio', 1);
$pdf->Cell(10, 8, 'tipo', 1);
$pdf->Cell(25, 8, 'estatus', 1);
$pdf->Cell(39, 8, 'fecha', 1);

	
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 8);
//CONSULTA

$consultas= mysql_query("SELECT * FROM mantenimiento");


	
$item = 0;


 while ($productos2 = mysql_fetch_array($consultas)){
	$item = $item+1;
	$pdf->Cell(5, 8, $item, 1);
	$pdf->Cell(100, 8, $productos2['servicio'], 1);
	$pdf->Cell(10, 8, $productos2['tipo'], 1);
	$pdf->Cell(25, 8, $productos2['estatus'], 1);
	$pdf->Cell(39, 8, $productos2['fecha'], 1);
	$pdf->Ln(15);

	$pdf->Ln(8); 
  }
$pdf->Output();

?>
