<?php
include("conex.php");
?>
<?php
	$id_consulta=$_POST['id_consulta'];
	$id_empleado=$_POST['id_empleado'];
	$id_area=$_POST['id_area'];
	$fecha=$_POST['fecha'];
	$estatus=$_POST['estatus'];
    $descripcion=$_POST['descripcion'];

	$sql="UPDATE consultas SET id_empleado='$id_empleado', id_area='$id_area', fecha='$fecha', estatus='$estatus', descripcion='$descripcion' WHERE id_consulta='$id_consulta'";
	$consulta=mysql_query($sql,$cone);
	if($consulta)
	{
		actualizar();
	}
	?>
