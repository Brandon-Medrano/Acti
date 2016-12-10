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
    
 
   <div class="card-panel grey lighten-1 center sP z-depth-4">
            <span  class="black-text text-darken-6 ">Actuliza Actividad
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



<?php
$id_consulta=$_GET['id_consulta'];//toma id
$sql="SELECT * FROM consultas WHERE id_consulta=$id_consulta";
$consulta=mysql_query($sql,$cone);
$res=mysql_fetch_array($consulta);
?>
<h1>ACTUALIZAR ACTIVIDAD</h1>
<hr>
<form  name="f2" action="actualizar.php" method="POST">

ID Empleado:
<input type="text" name="id_empleado"   OnFocus=this.blur() value="<?php echo $res[1]; ?>" size="30"><br>
Area:
 <input type="text" name="id_area"  OnFocus=this.blur()  value="<?php echo $res[2]; ?>" size="30"><br>
Fecha:
 <input type="text" name="fecha"  OnFocus=this.blur() value="<?php echo $res[3]; ?>" size="30"><br>
Estatus:
 <input type="text" name="estatus" value="<?php echo $res[4]; ?>" size="30"><br>
Descripcion:
 <input type="text" name="descripcion" value="<?php echo $res[5]; ?>" size="30"><br>

 <input type="hidden" name="id_consulta" value="<?php echo $id_consulta; ?>"><!--envia valor de id-->

 <input type="submit" value="actualizar">

</form>

 </table></center><br>
 
 </div>
      
</body>
</html>