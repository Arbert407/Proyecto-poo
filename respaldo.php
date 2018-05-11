<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>Recuperacion de contraseña</title>
	<link rel="icon" type="image/png" href="imagenes/header.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="background-image: url(imagenes/fondo3.png);  background-repeat: no-repeat;background-size: cover;background-position: center center;background-attachment: fixed;">


	<div style="height: 101px; min-height: 30px"></div>


	<div id="form" class="animacionCompresion">
		<h3>Responde la pregunta de seguridad:</h3>
		<div style="margin-top: 40px;margin-bottom: 30px">¿Cual es tu personaje favorito del cine?</div>
	    <div class="form-group">
            <input class="form-control" id="txt-respuesta" type="text" placeholder="Ingrese respuesta" onkeyup="validarCampoVacio(this,1);">
            <div id="text-help1"></div><br>
        </div>
        <div style="text-align: left; margin-top: 30px; margin-bottom: 40px"></div>
        <div style="text-align: right; margin-top: 30px; margin-bottom: 40px">
        	<a id="abtn-siguiente">
        		<button type="button" class="btn btn-primary" id="btn-siguiente" onclick="JSONRespaldo();">
                    VERIFICAR 
                </button>
        	</a>            
        </div>
	</div>


	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/transformador.js"></script>
	
	
</body>
</html>