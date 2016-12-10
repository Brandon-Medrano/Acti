
<?php
require('./fpdf/fpdf.php');
require('./php/conexion.php');



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('./recursos/logo.png' , 10 , 13, 18 , 13,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 18, '                                     Instituto Tecnologico de Gustavo A Madero.', 2);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'Actividades Departamento', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, 'ID', 0);
$pdf->Cell(60, 8, 'Depto.', 0);
$pdf->Cell(40, 8, 'Estatus', 0);
$pdf->Cell(25, 8, 'Fecha', 0);
$pdf->Cell(39, 8, 'Nombre', 0);

	
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 8);
//CONSULTA

$consultas= mysql_query("SELECT * FROM consultas WHERE id_empleado='$_POST[id_empleado]' and fecha between '$_POST[fecha1]' and '$_POST[fecha2]' ");

	
$item = 0;


 while ($productos2 = mysql_fetch_array($consultas)){
	$item = $item+1;
	$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(60, 8, $productos2['id_area'], 0);
	$pdf->Cell(40, 8, $productos2['estatus'], 0);
	$pdf->Cell(25, 8, $productos2['fecha'], 0);
	$pdf->Cell(39, 8, $productos2['nombre_empleado'], 0);
	$pdf->Ln(15);
	$pdf->Cell(39, 8, $productos2['descripcion'], 0);
	
	$pdf->Ln(8); 
  }
$pdf->Output();

?>
