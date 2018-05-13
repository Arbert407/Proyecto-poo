<?php
include('class/class-validacion.php');
$a = new Validacion();
$d = $a->ejecutarValidacion();
$d = $a->ejecutarValidacionRespaldo();
$d = $a->ejecutarValidacionCargar();
//echo $d."asdfadfasdfasfasdfasfasdfasdfasdf";

/*session_start();
if (!isset($_SESSION["rutaActual"])){
		header("Location: index.html");
}else{
	$d = substr($_SESSION["rutaActual"],3);
}*/
if(isset($_FILES['file']))
{
	$file_name = $_FILES['file']['name'];
	$file_tmp = $_FILES['file']['tmp_name'];

	$upload_folder = $d; //Esta es la carpeta a la que se subira :v

	$movefile = move_uploaded_file($file_tmp, $upload_folder.$file_name);

}

?>


<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title>Mi unidad - La Nube</title>
	<link href="css/customPP.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="imagenes/header.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>


	<div class="conejo">
		<span class="pato fila"><img src="imagenes\sadasd.png" class="img-fluid"><b> Drive</b></span>
		<span class="fila">
			<span class="boton-busqueda" id="boton-busqueda" onclick="buscar();"><i class="fas fa-search"></i></span>
			<input type="text" name="busqueda" id="input-buscar" class="barra-busqueda" placeholder="  buscar archivos en LA NUBE">
		</span>
		<span class="icono-derecha circulo " style="margin-right: 14px;margin-left: 5px" id="icono-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
			<div class="dropdown-menu" aria-labelledby="icono-usuario">
				<a class="dropdown-item" href="salir.php">Salir</a>
			</div>
		<span class="icono-derecha"><i class="fas fa-bell"></i></span>
		<span class="icono-derecha"><i class="fas fa-chess-board"></i></span>
	</div>


	<div class="pato2" >
		&nbsp;
		<div class="btn-group">
			<span onclick="return showContextMenu(event);">
  				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" data-target="df" aria-haspopup="true" aria-expanded="false">
    				Nuevo
  				</button>
				<ul class="dropdown-menu" id="df">
					<li data-toggle="modal" data-target="#exampleModalCenter"><img src="Iconos-123\1.png" class="img-fluid">     Nueva carpeta...</li>
					<li class="separator"></li>
					<li data-toggle="modal" data-target="#bd-example-modal-sm"><img src="Iconos-123\2.png" class="img-fluid">     Subir archivo...</li>
					<li><img src="Iconos-123\3.png" class="img-fluid">     Subir carpeta...</li>
					<li class="separator"></li>
					<li><img src="Iconos-123\4.png" class="img-fluid">     Documentos de Google</li>
					<li><img src="Iconos-123\5.png" class="img-fluid">     Hojas de calculo de Google</li>
					<li><img src="Iconos-123\6.png" class="img-fluid">     Presentaciones de Google</li>
					<li class="separator"></li>
					<li><img src="Iconos-123\7.png" class="img-fluid">     Formularios de Google</li>
					<li><img src="Iconos-123\8.png" class="img-fluid">     Dibujos de Google</li>
					<li><img src="Iconos-123\9.png" class="img-fluid">     Google My Maps</li>
					<li><img src="Iconos-123\10.png" class="img-fluid">     Google Sites</li>
					<li class="separator"></li>
					<li><img src="Iconos-123\11.png" class="img-fluid">     Conectar mas aplicaciones</li>		
       		    </ul>
        	</span>
   		</div>
		<span class="boton-directorio-alfa">
			<div class="btn-group">
				<div onclick="return showContextMenu(event);">
					<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Mi unidad
					</button>
					<ul class="dropdown-menu">
						<li data-toggle="modal" data-target="#exampleModalCenter"><img src="Iconos-123\1.png" class="img-fluid">     Nueva carpeta...</li>
						<li class="separator"></li>
						<li data-toggle="modal" data-target="#bd-example-modal-sm"><img src="Iconos-123\2.png" class="img-fluid">     Subir archivo...</li>
						<li><img src="Iconos-123\3.png" class="img-fluid">     Subir carpeta...</li>
						<li class="separator"></li>
						<li><img src="Iconos-123\4.png" class="img-fluid">     Documentos de Google</li>
						<li><img src="Iconos-123\5.png" class="img-fluid">     Hojas de calculo de Google</li>
						<li><img src="Iconos-123\6.png" class="img-fluid">     Presentaciones de Google</li>
						<li class="separator"></li>
						<li><img src="Iconos-123\7.png" class="img-fluid">     Formularios de Google</li>
						<li><img src="Iconos-123\8.png" class="img-fluid">     Dibujos de Google</li>
						<li><img src="Iconos-123\9.png" class="img-fluid">     Google My Maps</li>
						<li><img src="Iconos-123\10.png" class="img-fluid">     Google Sites</li>
						<li class="separator"></li>
						<li><img src="Iconos-123\11.png" class="img-fluid">     Conectar mas aplicaciones</li>
					</ul>
  				</div>
  			</div>
		</span>
    	<span style="padding: 20px 5px 10px 5px; font-size: 20px;" onclick="carpetaAtras();"><i class="fas fa-arrow-up"></i></span>
		<span id="span-ruta"></span>
		<span class="icono-derecha"><i class="fas fa-cog"></i></span>
		<span class="icono-derecha"><i class="fas fa-info-circle"></i></span>
		<span class="icono-derecha"><i class="fas fa-list-ol"></i></span>
	</div>


	<div class="sombra container-fluid">
		<div oncontextmenu="return showContextMenu(event);">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 opciones">
					<div class="opciones1"><i class="far fa-hdd" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;Mi unidad</div>
					<div class="opciones1"><i class="fas fa-desktop" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;Computadoras</div>
					<div class="opciones1"><i class="fas fa-users" style="font-size: 20px;"></i>&nbsp;&nbsp;Compartidos conmigo</div>
					<div class="opciones1"><i class="far fa-clock" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Recientes</div>
					<div class="opciones1"><i class="fab fa-google" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;Google Fotos</div>
					<div class="opciones1"><i class="fas fa-star" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;Destacados</div>
					<div class="opciones1"><i class="fas fa-trash" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Papeleta</div>
					<div class="opciones1 opciones2"><i class="fas fa-cloud" style="font-size: 20px;"></i>&nbsp;&nbsp;&nbsp;Copias de seguridad</div>
					<div class="opciones1 opciones3">Se uso 1 GB de 20 TB</div>
					<div class="opciones1">	
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aumentar el <br>
						<i class="fas fa-server"  style="font-size: 20px;"></i>
						&nbsp;&nbsp;&nbsp; almacenamiento
					</div><br><br>
					<div class="opciones4">Obtener copia de seguridad para Windows</div>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7" id="div-contenido">
					<div class="tipo-objeto">Carpetas</div>
					<div class="container-fluid"><div class="row" id='row-carpetas'></div></div>
					<div class="tipo-objeto">Archivos</div>
					<div class="container-fluid"><div class="row" id="row-archivos"></div></div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
					<div class="tipo-objeto" id="resultado-mensaje"></div><br><br>
					<div id="resultado-respuesta"></div>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Ingrese nombre de la carpeta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" id="btn-nombre-carpeta" class="form-control" placeholder="Nombre de la carpeta">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="crearCarpeta();">Crear</button>
			</div>
			</div>
		</div>
	</div>
	

	<div class="modal fade" id="bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Subir archivo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" enctype="multipart/form-data" id="form-subir"><br><br>
						<input type="file" name="file"><br><br>
						<input type="submit" class="btn btn-primary" style="margin-left: 390px;" value="Subir">
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modal-imagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Vista previa</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="imagen-de-modal">
					
				</div>
			</div>
		</div>
	</div>


	<div id="contextMenu" class="context-menu">
		<ul>
			<li data-toggle="modal" data-target="#exampleModalCenter"><img src="Iconos-123\1.png" class="img-fluid">     Nueva carpeta...</li>
			<li class="separator"></li>
			<li data-toggle="modal" data-target="#bd-example-modal-sm"><img src="Iconos-123\2.png" class="img-fluid">     Subir archivo...</li>
			<li><img src="Iconos-123\3.png" class="img-fluid">     Subir carpeta...</li>
			<li class="separator"></li>
			<li><img src="Iconos-123\4.png" class="img-fluid">     Documentos de Google</li>
			<li><img src="Iconos-123\5.png" class="img-fluid">     Hojas de calculo de Google</li>
			<li><img src="Iconos-123\6.png" class="img-fluid">     Presentaciones de Google</li>
			<li class="separator"></li>
			<li><img src="Iconos-123\7.png" class="img-fluid">     Formularios de Google</li>
			<li><img src="Iconos-123\8.png" class="img-fluid">     Dibujos de Google</li>
			<li><img src="Iconos-123\9.png" class="img-fluid">     Google My Maps</li>
			<li><img src="Iconos-123\10.png" class="img-fluid">     Google Sites</li>
			<li class="separator"></li>
			<li><img src="Iconos-123\11.png" class="img-fluid">     Conectar mas aplicaciones</li>
		</ul>
	</div>


	<div id="contextMenux" class="context-menux">
		<ul>
			<li id="li-vista"><img src="Iconos-123\12.png" class="img-fluid">     Vista previa</li>
			<li><img src="Iconos-123\13.png" class="img-fluid">     Abrir con </li>
			<li class="separator"></li>
			<li><img src="Iconos-123\14.png" class="img-fluid">     Compartir...</li>
			<li><img src="Iconos-123\15.png" class="img-fluid">     Obtener enlace para compartir</li>
			<li><img src="Iconos-123\16.png" class="img-fluid">     Mover a...</li>
			<li><img src="Iconos-123\17.png" class="img-fluid">     Destacar</li>
			<li><img src="Iconos-123\18.png" class="img-fluid">     Cambiar nombre...</li>
			<li class="separator"></li>
			<li><img src="Iconos-123\19.png" class="img-fluid">     Ver detalles</li>
			<li><img src="Iconos-123\20.png" class="img-fluid">     Gestionar versiones...</li>
			<li><img src="Iconos-123\21.png" class="img-fluid">     Hacer una copia</li>
			<a id="a-download"  download="archivo" style="color: black;"><li><img src="Iconos-123\22.png" class="img-fluid">     Descargar</li></a>
			<li class="separator"></li>
			<li onclick="eliminarArchivo();"><img src="Iconos-123\23.png" class="img-fluid">     Eliminar</li>
		</ul>
	</div>

	
	<script type="text/javascript">
		window.onclick = hideContextMenu;
		window.onkeydown = listenKeys;
		var contextMenu = document.getElementById('contextMenu');
		window.onclick = hideContextMenux;
		window.onkeydown = listenKeysx;
		var contextMenux = document.getElementById('contextMenux');

		function showContextMenu (event) {
			contextMenu.style.display = 'block';
			contextMenu.style.left = (event.clientX) + 'px';
			contextMenu.style.top = (event.clientY) + 'px';
			//contextMenux.attr.aria-hidden = 'true';
			return false;
		}

		function hideContextMenu () {
			contextMenu.style.display = 'none';
			contextMenux.style.display = 'none';
		}

		function listenKeys (event) {
			var keyCode = event.which || event.keyCode;
			if(keyCode == 27){
				hideContextMenu();
				//hideContextMenux();
			}
		}

		function showContextMenux (event) {	
			contextMenux.style.display = 'block';
			contextMenux.style.left = event.clientX + 'px';
			contextMenux.style.top = event.clientY + 'px';
			//contextMenu.style.display = 'none';
			return false;
		}

		function hideContextMenux () {
			contextMenu.style.display = 'none';
			contextMenux.style.display = 'none';
			
		}

		function listenKeysx (event) {
			var keyCode = event.which || event.keyCode;
			if(keyCode == 27){
				hideContextMenux();
				//hideContextMenu();
			}
		}
	</script>
	<script defer src="js/fontawesome-all.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/transformador.js"></script>
</body>
</html>