<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro inicial</title>
	<link rel="icon" type="image/png" href="imagenes/header.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="background: url(imagenes/fondo3.png);  background-repeat: no-repeat;background-size: cover;background-position: center center;background-attachment: fixed;">
	

	<div id="div-inicial"></div>
	
	
	<div id="form" class="animacionReboteX">
		<h3>Registro de usuario<br><br></h3>
		<input type="text" class="form-control"  id="txt-nombre" placeholder="Nombre" onkeyup="validarCampoVacio(this,1);">
		<div id="text-help1"></div><br>
		<input type="text" class="form-control" id="txt-apellido" placeholder="Apellido" onkeyup="validarCampoVacio(this,2);">
		<div id="text-help2"></div><br>
		<input type="email" class="form-control" id="txt-email" placeholder="Correo electronico" onkeyup="validarEmail(this);" >
		<div id="text-help"></div><br>
		<input type="password" class="form-control" id="txt-password" placeholder="Contraseña a utilizar" onkeyup="validarContrasena(this,4); coincidirContrasena(6);">
		<div id="text-help4"></div><br>
		<input type="password" class="form-control" id="txt-password2" placeholder="Vuelva a escribir su contraseña" onkeyup="validarContrasena(this,5); coincidirContrasena(6);">
		<div id="text-help5"></div><br>
		<div class="form-control" style="font-size: 15px; border: none;" >
			Responde la pregunta de seguridad:<br>
			¿Cual es tu personaje favorito del cine?
		</div>
		<input type="text" class="form-control" id="txt-respuesta-registro" placeholder="respuesta" onkeyup="validarCampoVacio(this,7);">
		<div id="text-help7"></div><br>
		<div id="text-help6"></div><br>
		<div style="text-align: right; margin-top: 30px; margin-bottom: 40px">
        	<a  id="a-crear-cuenta" >
                <button type="button" class="btn btn-primary" id="btn-crear-cuenta" onclick="JSONRegistro();">
                    CREAR CUENTA 
                </button>
            </a>
        </div>
	</div>


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/transformador.js"></script>
	
	
</body>
</html>