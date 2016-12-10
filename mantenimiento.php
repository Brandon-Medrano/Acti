
<?php
include("conex.php");
?>

<!DOCTYPE html>

<html lang="es-ES">

    
<?php require_once("config.inc.php"); ?><!DOCTYPE html>

<head>
      <style> 
         sp2{
            padding-left:0px; padding-right:0px
             
         }
    
       </style>
       <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="css/materialize.min.css">
   

	<![calendario]-->

	<meta http-equiv="PRAGMA" content="NO-CACHE">
	<meta http-equiv="EXPIRES" content="-1">
	
	<link type="text/css" rel="stylesheet" media="all" href="estilos.css">
	
	<![calendario]-->
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
	<![endif]-->


<body style="padding-left:80px; padding-right:80px">
    
 
   <div class="card-panel  pink  lighten-1 center sP z-depth-4">
           <h1>Depto  de Centro de Computo</h1>   
               <span class="featured-title">Plan de trabajo</span> 
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


  

	<div class="calendario_ajax">
		<div class="cal"></div><div id="mask"></div>
	</div>
	
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/jquery.validate.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.12.0/localization/messages_es.js "></script>
		
	<script>
	function generar_calendario(mes,anio)
	{
		var agenda=$(".cal");
		agenda.html("<img src='images/loading.gif'>");
		$.ajax({
			type: "GET",
			url: "ajax_calendario.php",
			cache: false,
			data: { mes:mes,anio:anio,accion:"generar_calendario" }
		}).done(function( respuesta ) 
		{
			agenda.html(respuesta);
		});
	}
		
	function formatDate (input) {
		var datePart = input.match(/\d+/g),
		year = datePart[0].substring(2),
		month = datePart[1], day = datePart[2];
		return day+'-'+month+'-'+year;
	}
		
		$(document).ready(function()
		{
			/* GENERAMOS CALENDARIO CON FECHA DE HOY */
			generar_calendario("<?php if (isset($_GET["mes"])) echo $_GET["mes"]; ?>","<?php if (isset($_GET["anio"])) echo $_GET["anio"]; ?>");
			
			
			/* AGREGAR UN EVENTO */
			$(document).on("click",'a.add',function(e) 
			{
				e.preventDefault();
				var id = $(this).data('evento');
				var fecha = $(this).attr('rel');
				
				$('#mask').fadeIn(1000).html("<div id='nuevo_evento' class='window' rel='"+fecha+"'>Agregar un evento el "+formatDate(fecha)+"</h2><a href='#' class='close' rel='"+fecha+"'>&nbsp;</a><div id='respuesta_form'></div><form class='formeventos'><input type='text' name='evento_titulo' id='evento_titulo' class='required'><input type='button' name='Enviar' value='Guardar' class='enviar'><input type='hidden' name='evento_fecha' id='evento_fecha' value='"+fecha+"'></form></div>");
			});
			
			/* LISTAR EVENTOS DEL DIA */
			$(document).on("click",'a.modal',function(e) 
			{
				e.preventDefault();
				var fecha = $(this).attr('rel');
				
				$('#mask').fadeIn(1000).html("<div id='nuevo_evento' class='window' rel='"+fecha+"'>Eventos del "+formatDate(fecha)+"</h2><a href='#' class='close' rel='"+fecha+"'>&nbsp;</a><div id='respuesta'></div><div id='respuesta_form'></div></div>");
				$.ajax({
					type: "GET",
					url: "ajax_calendario.php",
					cache: false,
					data: { fecha:fecha,accion:"listar_evento" }
				}).done(function( respuesta ) 
				{
					$("#respuesta_form").html(respuesta);
				});
			
			});
		
			$(document).on("click",'.close',function (e) 
			{
				e.preventDefault();
				$('#mask').fadeOut();
				setTimeout(function() 
				{ 
					var fecha=$(".window").attr("rel");
					var fechacal=fecha.split("-");
					generar_calendario(fechacal[1],fechacal[0]);
				}, 500);
			});
		
			//guardar evento
			$(document).on("click",'.enviar',function (e) 
			{
				e.preventDefault();
				if ($("#evento_titulo").valid()==true)
				{
					$("#respuesta_form").html("<img src='images/loading.gif'>");
					var evento=$("#evento_titulo").val();
					var fecha=$("#evento_fecha").val();
					$.ajax({
						type: "GET",
						url: "ajax_calendario.php",
						cache: false,
						data: { evento:evento,fecha:fecha,accion:"guardar_evento" }
					}).done(function( respuesta2 ) 
					{
						$("#respuesta_form").html(respuesta2);
						$(".formeventos,.close").hide();
						setTimeout(function() 
						{ 
							$('#mask').fadeOut('fast');
							var fechacal=fecha.split("-");
							generar_calendario(fechacal[1],fechacal[0]);
						}, 3000);
					});
				}
			});
				
			//eliminar evento
			$(document).on("click",'.eliminar_evento',function (e) 
			{
				e.preventDefault();
				var current_p=$(this);
				$("#respuesta").html("<img src='images/loading.gif'>");
				var id=$(this).attr("rel");
				$.ajax({
					type: "GET",
					url: "ajax_calendario.php",
					cache: false,
					data: { id:id,accion:"borrar_evento" }
				}).done(function( respuesta2 ) 
				{
					$("#respuesta").html(respuesta2);
					current_p.parent("p").fadeOut();
				});
			});
				
			$(document).on("click",".anterior,.siguiente",function(e)
			{
				e.preventDefault();
				var datos=$(this).attr("rel");
				var nueva_fecha=datos.split("-");
				generar_calendario(nueva_fecha[1],nueva_fecha[0]);
			});

		});
		</script>

	
	
	<!-- ESTO NO TE HACE FALTA! -->
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-266167-20");
	pageTracker._setDomainName(".martiniglesias.eu");
	pageTracker._trackPageview();
	} catch(err) {}</script>









             
<!--div del titulo-->
       

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

  <form  class="contact_form" action="res2.php" method="POST">
       
<table>
<ul>
<li>

    
                <label for="no_servicio" title="id_actividad">No Servicio:</label>
                <input name="id_servicio" type="text" placeholder="Predeterminado al Guardar" size="20" maxlength="20" disabled>
     
     
</li>
<li>    


                 <label for="servicio" title="servicio" >Servicio</label>
                 <textarea name="servicio" id="servicio" rows="10" cols="60" placeholder="Describe servicio" required="true"></textarea>
</li>


<li>    
       <label>Tipo</label>
       <select name="tipo" class="browser-default"  required="true">
       <option value="interno">Interno</option>
       <option value="Externo">Externo</option>
 
    </select>
    
</li>
  
<li>
          <label>Estatus</label>
          <select name="estatus" class="browser-default"  required="true">
          <option value="pendiente">Pendiente</option>
          <option value="Realizado">Realizado</option>
          <option value="No Realiado">No realizado</option>
 
         </select>
</li>    

<li>  
  
                  <label for="fecha" title="fecha" size="10">Fecha</label>
                <input type="date"  name="fecha"  placeholder="2016-01-20" required="true"> 
                
                </li>
                </ul>
 </table>
     <!--*****botones*****-->
        
       
        <div style="width: 330px; margin: 0 auto;"> 
                <div class="addthis_toolbox addthis_32x32_style addthis_default_style"> 

                   <button class="submit"  type="submit" name="submit" value="res">Guarda Actividad</button>
  
                    <button class="submit" type="reset" name="borrado" values="borrar">Limpiar</button>
     
               </div>
      </div> 

  </form>

                     </div>
                             <div class="row">
                                        <div class="col 3">
                                           <a href="#" onclick = "location='index2.php'" class="btn-floating   btn-large  pink darken-4">X</a>      
                                          </div>   
                             </div>                         
                     </div>

 
      
</body>
</html>