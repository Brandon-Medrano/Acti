
<!DOCTYPE html>
<html lang="es-ES">
     
    <head>
        
        <style> 
         sp2{
            padding-left:0px; padding-right:0px
             
         }
        </style>

        <script type="text/javascript">var _sf_startpt = (new Date()).getTime();</script>
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
</head>
<body style="padding-left:70px; padding-right:70px"; >
   <div class="card-panel  blue  lighten-1 center sP z-depth-4">     
            <h1>Actvidades</h1>
     
              <div class="">
                        <a href=""  rel="" class="">
                          </a>
              </div>
 
                     <div class="container">
                           <div class="row">
                          </div>                         
                    </div>
           </span>
   </div>
       
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

      <!-- boton flotante-->
      
<form  class="contact_form" action="res.php" method="POST">
       
<table>
<ul>


    <?php


$username=$_POST['id_empleado'];
$pass=$_POST['pass'];
$usuario="root";
$contra="bmms";
$baseDatos="systemactividades";
$queryString = 'SELECT * FROM empleados where id_empleado='.$username." AND password= '".$pass."'";
$local='localhost';



$link = mysql_connect($local,$usuario, $contra);
if (!$link)
{ die ('No esta conectado la bd: ' . mysql_error());}
$db_selected = mysql_select_db($baseDatos, $link);
if (!$db_selected)
{ die ('No referenciando  la bd: ' . mysql_error()); }
//cuando se ejecuta el  query
$result = mysql_query($queryString);
if (!$result)
{


    echo "<script>location.href='index2.php'</script>";

}
else
 {
     if(mysql_affected_rows() == 0)

        echo "<script>location.href='index2.php'</script>";



//        echo 'ERROR: USUARIO o PASSWORD NO VALIDO 2.... ';

   echo"<ul>";
  
  echo "Registros Encontrados:".mysql_affected_rows()."</p>";

  while($renglon=mysql_fetch_array($result,MYSQL_ASSOC))
   {
       
     echo "-".$renglon["id_empleado"];
	 echo "-".$renglon["nombre_empleado"];
	 echo "-".$renglon["ap_paterno"];
	    echo "-".$renglon["ap_materno"];
     echo "-".$renglon["id_area"];
	  echo "</li>";
     echo "<ul>";

	 echo "<br> ID USUARIO:";
	 echo "<input name='id_empleado' OnFocus=this.blur() type='text' value='".$renglon["id_empleado"]."'/>";  
     echo "<br> NOMBRE PIL:";
	 echo "<input  name='nombre_empleado' type='text' OnFocus=this.blur()  value='".$renglon["nombre_empleado"]."'/>";
     echo "<br> 1º  APATERNO:";
	 echo "<input type='text' OnFocus=this.blur() value='".$renglon["ap_paterno"]."'/>";
	 echo "<br> 2º  APELLIDO:";
	 echo "<input type='text' OnFocus=this.blur() value='".$renglon["ap_materno"]."'/>";
     echo "<br> Area o DTO:";
	 echo "<input name='id_area' OnFocus=this.blur() type='text' value='".$renglon["id_area"]."'/>";
     echo "</li>";
         } // end while

     mysql_free_result($result);
 }

    ?>
    <li>
       <label>Estatus</label>
       <select name="estatus" class="browser-default"  required="true">
       <option value="Realizado">Realizado</option>
       <option value="No Realiado">No relizado</option>
       <option value="Por Realizar">Por realizar</option>
    </select>
       </li>         
 
       <li>
                <label for="id_actividad" title="id_actividad">Folio De La Actividad:</label>
                <input name="id_actividad" type="text" placeholder="Predeterminado al Guardar" size="20" maxlength="20" disabled>
       </li>
   
     
       <li>
                 <label for="description" title="description" >Agrega descripcion de la actividad</label>
                 <textarea name="descripcion" id="descripcion" rows="10" cols="60" placeholder="Aqui agregar tus comentarios" required="true"></textarea>
      </li>
             <li>
                <label for="fecha" title="fecha" size="10">Fecha</label>
                <input type="date"  name="fecha"  placeholder="2016-01-20" required="true"> 
            </li>
 
     <!--*****butones*****-->
        
       
        <div style="width: 330px; margin: 0 auto;"> 
                <div class="addthis_toolbox addthis_32x32_style addthis_default_style"> 

                   <button class="submit"  type="submit" name="submit" value="res">Guarda Actividad</button>
  
                    <button class="submit" type="reset" name="borrado" values="borrar">Limpiar</button>
     
               </div>
      </div> 

   </ul>
   </table>   
  </form>
          </div>
                 <div class="row">
                      <div class="col 3">
                                           <a href="#" onclick = "location='index2.php'" class="btn-floating   btn-large  red  darken-4">X</a>      
                                          </div>
                            <div class="col 3">
                                  <a href="#" onclick = "location='consultas.php'" class="btn-floating   btn-large  blue darken-4">pdf</a>      
                                        <div class="col 3">
                                           <a href="#" onclick = "location='actuli.php'" class="btn-floating   btn-large  welloy darken-4">Reace</a>      
                                          </div>   
                                                <div class="col 3">
                                           <a href="#" onclick = "location='mantenimiento.php'" class="btn-floating   btn-large   pink  darken-4">P M</a>      
                                          </div>   

                                           
                             </div>                         
                     </div>
</body>
</html>

 