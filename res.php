
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


    $nom=$_POST['id_empleado'];
    $a3=$_POST['id_area'];
    $a4=$_POST['nombre_empleado'];
    /* actividades*/
    $ap_a=$_POST['fecha'];
    $am_a=$_POST['estatus'];
    $esp=utf8_decode($_POST['descripcion']);
    
    
            $sql1="insert into actividades values('','$ap_a','$am_a','$esp','$a4')";
            $sql2="insert into consultas values('','$nom','$a3','$ap_a','$am_a','$esp','$a4')";
             

            $consulta1=mysql_query($sql1,$cone);
            $consulta2=mysql_query($sql2,$cone);
             
           if($consulta1)
            {
           echo"<script> alert('Datos Guardados');window.location='consultas.php';</script>";
            }
           elseif($consulta2)
            {
            echo"<script> alert('3 Datos Guardados');window.location='consultas.php';</script>";
            }
	        else{
			echo"<script> alert('Error al realizar registro');window.location='index2.php';</script>";
			}
	
    
 ?>
 
 </body>
</html>
 
 