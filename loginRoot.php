
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
    <title>Bienvenido</title>
    <link rel="icon" type="image/png" href="imagenes/header.png">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="background: url(imagenes/fondo3.png);  background-repeat: no-repeat;background-size: cover;background-position: center center;background-attachment: fixed;">


    <div id="div-inicial"></div>


    <div id="form" class="animacionRebote">
        <div class="inicio">
            <h2 style="font-family: inherit;">Iniciar sesion de administrador<br></h2>
            Ir a la nube 
        </div>  
        <div class="form-group" style="margin-top: 50px">
            <label for="exampleInputEmail1">ciencia@ejemplo.com</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo electronico" onkeyup="validarEmail(this);">
            <div id="text-help"></div>
        </div>
        <div style="margin-top: 30px; margin-bottom: 10px;">
            <a href="registro-usuarios-administradores.php">
                Nuevo usuario administrador
            </a>
        </div>
        <div style="text-align: right; margin-top: 30px; margin-bottom: 40px">
            <a id="abtn-siguiente">
                <button type="button" class="btn btn-primary" id="btn-siguiente"  onclick="JSONCorreoAdministrador();">
                    SIGUIENTE 
                </button>
            </a>
        </div>
    </div>


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/transformador.js"></script>

    
</body>
</html>