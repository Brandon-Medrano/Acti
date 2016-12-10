
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php

	include("conex.php");
	?>

	<?php


    $esp=utf8_decode($_POST['servicio']);
    $tipo=$_POST['tipo'];
    $a4=$_POST['estatus'];
    $ap_a=$_POST['fecha'];
    
    
            $sql1="insert into mantenimiento values('','$esp','$tipo','$a4','$ap_a')";
   

            $consulta1=mysql_query($sql1,$cone);
             
           if($consulta1)
            {
           echo"<script> alert('Datos Guardados');window.location='apdf2.php';</script>";
            }
            else{
			echo"<script> alert('Error al realizar registro');window.location='mantenimiento.php';</script>";
			}
	
    
 ?>
 
 </body>
</html>
 
 