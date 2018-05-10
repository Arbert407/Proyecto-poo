<?php
    include("../class/class-conexion.php");
    $conexion = new Conexion();
    $salida = array();
    switch($_GET['accion']){



        case 'procesarCorreo':
            $sql = sprintf('SELECT correo, tipo, nombre, apellido, carpeta, '.
                           'ruta FROM tbl_usuarios WHERE correo="%s"', 
                           $_GET['correo']);
            $resultado = $conexion->ejecutarConsulta($sql);
            while($fila = $conexion->obtenerFila($resultado)){
                if($fila['correo'] == $_GET['correo'] && $fila['tipo'] == $_GET['tipo']){
                    $salida['valor'] = 1;
                    $salida['sql'] = $fila;
                }else{
                    $salida['valor'] = 0;
                }
            }
        break;



        case 'procesarContrasena':
            $sql = sprintf('SELECT contrasena FROM tbl_usuarios WHERE correo = "%s"', $_GET['correo']);
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
                $fila = $conexion->obtenerFila($resultado);
                if($fila['contrasena'] == $_GET['contrasena']){
                    $salida['valor'] = 1;
                }
            }else{
                $salida['valor'] = 0;
            }
        break;



        case 'procesarRespaldo':
            $sql = sprintf('SELECT respuesta, contrasena FROM tbl_usuarios WHERE correo = "%s"', $_GET['correo']);
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
                $fila = $conexion->obtenerFila($resultado);
                if($fila['respuesta'] == $_GET['respuesta']){
                    $salida['valor'] = 1;
                    $salida['sql'] = $fila;
                }
            }else{
                $salida['valor'] = 0;
            }
        break;



        case 'procesarRegistro':
            $carpeta_creada = obtenerCarpeta($conexion);
            if($_GET['tipo'] == 1){
                $ruta = 'data/';
            }else{
                $ruta = 'data/'.$carpeta_creada.'/';
            }
            $sql = sprintf('INSERT INTO tbl_usuarios(nombre, apellido, correo, '.
                           'contrasena, respuesta, tipo, carpeta, ruta) '.
                           'VALUES("%s","%s","%s","%s","%s",%s,%s,"%s")',
                           $_GET['nombre'] ,
                           $_GET['apellido'] ,
                           $_GET['email'] ,
                           $_GET['contrasena1'] ,
                           $_GET['respuesta'] ,
                           $_GET['tipo'] ,
                           $carpeta_creada ,
                           $ruta );
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
                $salida['valor'] = 1;
            }else{
                $salida['valor'] = 0;
            }
            if($_GET['tipo'] == 2){
                mkdir('../data/'.$carpeta_creada.'/');
            }
        break;



        case 'mostrarArchivos':
            //$i = 0;
            /*if($_GET['tipo'] == 2){
                
            }else{
                $var = "data/";
            }*/
            $var = $_GET['ruta'];
            $carpetas = array();
            $archivos = array();
            $total = array();
            $directorio = opendir('../'.$var);//ruta actual
            $dir = '../'.$var; 
            while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
            {
                $total[] = $archivo;
                if (is_dir($dir.'/'.$archivo))//verificamos si es o no un directorio
                {
                    if( $archivo!='.' && $archivo!='..'){
                        $carpetas[] = $archivo; //de ser un directorio lo envolvemos entre corchetes
                    }
                }
                else
                {
                    $archivos[] = $archivo;
                }
            }
            $salida['archivos'] = $archivos;
            $salida['carpetas'] = $carpetas;
            $salida['total'] = $total;
        break;



        case 'nuevaRuta':
            $carpetas = array();
            $archivos = array();
            $total = array();
            //echo $_GET['rutaActual'];
            $directorio = opendir('../'.$_GET['rutaActual']);//ruta actual
            $dir = '../'.$_GET['rutaActual']; 
            while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
            {
                $total[] = $archivo;
                if (is_dir($dir.'/'.$archivo))//verificamos si es o no un directorio
                {
                    if( $archivo!='.' && $archivo!='..'){
                        $carpetas[] = $archivo; //de ser un directorio lo envolvemos entre corchetes
                    }
                }
                else
                {
                    $archivos[] = $archivo;
                }
            }
            $salida['archivos'] = $archivos;
            $salida['carpetas'] = $carpetas;
            $salida['total'] = $total;
        break;


        case 'nuevaCarpeta':
            $sql = sprintf('SELECT ruta FROM tbl_usuarios WHERE correo = "%s"', $_GET['correo']);
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
                $salida['valor'] = 1;
                $fila = $conexion->obtenerFila($resultado);
                mkdir('../'.$_GET['rutaActual'].$_GET['nombreCarpeta']);
            }else{
                $salida['valor'] = 0;
            }
        break;


        case 'eliminarArchivo':
            unlink($_GET['nombreArchivo']);
        break;
    }



    //$carpeta_creada = obtenerCarpeta($conexion);
    //$ruta = 'data/'.$carpeta_creada.'/';
    //$salida['carpeta'] = $carpeta_creada;
    //echo $ruta;
    function obtenerCarpeta($conexion){
        $sql = 'SELECT codigo_usuario FROM tbl_usuarios'
        . ' ORDER BY codigo_usuario ASC';
        $resultado = $conexion->ejecutarConsulta($sql);
        while($fila = $conexion->obtenerFila($resultado)){
            $final = $fila['codigo_usuario'];
            //echo '   '.$final."padsa    ";
        }
        return $final+1;
    }



    function listar_directorios_ruta($ruta){ 
        // abrir un directorio y listarlo recursivo 
        if (is_dir($ruta)) { 
           if ($dh = opendir($ruta)) { 
              while (($file = readdir($dh)) !== false) { 
                 //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio 
                 //mostraría tanto archivos como directorios 
                 //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file); 
                 if (is_dir($ruta . $file) && $file!="." && $file!=".."){ 
                    //solo si el archivo es un directorio, distinto que "." y ".." 
                    echo "<br>Directorio: $ruta$file"; 
                    listar_directorios_ruta($ruta . $file . "/"); 
                 } 
              } 
           closedir($dh); 
           } 
        }else 
           echo "<br>No es ruta valida"; 
     }



    echo json_encode($salida);
    $conexion->cerrarConexion();
?>