  
<?php
include("conex.php");
?>

<!DOCTYPE html>

<html lang="es-ES">

    

<head>
      <style> 
         sp2{
            padding-left:0px; padding-right:0px
             
         }
    
       </style>
       <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="css/materialize.min.css">
   
      <link rel='stylesheet' id='pri-css'  href='tema/itgam/frontend/css/style.css' type='text/css' media='all' />
      <link rel='stylesheet' id='lightbox-css'  href='tema/itgam/vendor/css/jquery.fancybox-1.3.4.css?ver=3.7' type='text/css' media='all' />
      <script type='text/javascript' src='tema/itgam/frontend/js/jquery.min.js'></script>
      <script type='text/javascript' src='tema/itgam/vendor/js/jquery.fancybox-1.3.4.pack.js?ver=1.0'></script>
      <script type='text/javascript' src='tema/itgam/frontend/js/app.js'></script>
      <script type='text/javascript' src='tema/itgam/frontend/swf/swfobject.js'></script>
      <script type='text/javascript' src='tema/itgam/vendor/js/jquery.datePicker.js'></script>

    </head>
    
    <body>
        <title>bmms</title>

<body style="padding-left:80px; padding-right:80px">
    
 
   <div class="card-panel  blue  lighten-1 center sP z-depth-4">
           <h1> Registro de actividades </h1>
                     <div class="container">
                           <div class="row">
                          </div>                         
                    </div>
           </span>
   </div>
             
<!--div del titulo-->
       
<!--multimedia la divicion-->

			<span class="archive-title"></span>
			<span class="featured-title">2017</span>
			<div class="clearfix">

<div class="card-panel white lighten-1 center sP sP z-depth-4">
			<br>
      <br>
      <br>
       <!--       <article  class="featured-media clearfix" >-->
        			<div class="">
                        <a href=""  rel="" class="">
                          </a>
                 </div>
     <center>

        
      
           <center>
          <form  name="f1" action="res.php" method="POST">
    
    
               
   <center><table border="15">
     
	<tr>
    <td>CONSULTA:</td>
		<td>EMPLEADO:</td>
		<td>AREA:</td>
		<td>FECHA</td>
		<td>ESTATUS</td>
		<td>DESCRIPCION</td>
    <td>Editar</td>
        
   </tr>
	
            
        <?php
        $sql="SELECT * FROM consultas";
        $consulta=mysql_query($sql,$cone);
        while($res=mysql_fetch_array($consulta))
         {
              $id_consulta=$res[0];
     	        $id_empleado=$res[1];
              $id_area=$res[2];
     	        $fecha=$res[3];
            	$estatus=$res[4];
             	$descripcion=utf8_decode($res[5]);

	                 echo"<tr>   
                     <td>$id_consulta</td>
                     <td>$id_empleado</td>
           	         <td>$id_area</td>
                     <td>$fecha</td>
                     <td>$estatus</td>
                     <td>$descripcion</td>
	                   <td><a href='editar.php?id_consulta=$id_consulta'>Editar</a></td>         	         
                     </tr>";
                      
                   }
                   ?>
 </table></center><br>
 
 </div>
      
</body>
</html>