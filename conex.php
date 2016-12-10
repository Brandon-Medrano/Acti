<?php

	$cone=mysql_connect("localhost","root","bmms") or die("conexion falllida");

	$db=mysql_select_db("systemactividades") or die ("error en base de datos");
	
	return($cone);

    
	{
		echo"<script> alert('dato vacio'); window.location='clientes.php';</script>";
	}
	function insertar()
	{
		echo"<script> alert('datos insertados correctamente'); window.location='clientes.php';</script>";
	}

	function actualizar()
	{
		echo"<script> alert('datos actualizados'); window.location='actuli.php';</script>";
	}
	function eliminar()
	{
		echo"<script> alert('registro eliminado'); window.location='clientes.php';</script>";
	}



?>