<?php
    session_start();
    include("../class/class-conexion.php");
    $conexion = new Conexion();
    $salida = array();
    switch($_GET['accion']){



        case 'procesarCorreo':
            $sql = sprintf('SELECT correo, contrasena, tipo, nombre, apellido, carpeta, '.
                           'ruta FROM tbl_usuarios WHERE correo="%s"', 
                           $_GET['correo']);
            $resultado = $conexion->ejecutarConsulta($sql);
            while($fila = $conexion->obtenerFila($resultado)){
                if($fila['correo'] == $_GET['correo'] && $fila['tipo'] == $_GET['tipo']){
                    $salida['valor'] = 1;
                    $salida['sql'] = $fila;
                    $_SESSION['usr'] = $_GET['correo'];
                    $_SESSION['carpeta'] = $fila['carpeta'];
                    //$_SESSION['contrasena'] = $fila['contrasena'];
                    $sql2 = sprintf('SELECT pswsha1 '.
                           'FROM tbl_usuarios WHERE correo="%s"', 
                           $_GET['correo']);
                    $resultado2 = $conexion->ejecutarConsulta($sql2);
                    $fila2 = $conexion->obtenerFila($resultado2);       
                    //echo $fila2['pswsha1']."\n";
                    $_SESSION['pswsha1'] = $fila2['pswsha1'];
                    //echo $_SESSION['pswsha1'];
                    //echo $_SESSION['usr']."\n";
                }else{
                    $salida['valor'] = 0;
                }
            }
        break;



        case 'procesarContrasena':
            $sql = sprintf('SELECT carpeta FROM tbl_usuarios WHERE pswsha1 = sha1("%s") AND correo = "%s"', $_GET['contrasena'], $_GET['correo']);
            $resultado = $conexion->ejecutarConsulta($sql);
            if($resultado){
                $fila = $conexion->obtenerFila($resultado);
                if($fila['carpeta'] == $_SESSION['carpeta']){
                //if(TRUE){        
                    $salida['valor'] = 1;
                    //$_SESSION['psw'] = $_GET['contrasena'];
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
                           'contrasena, respuesta, tipo, carpeta, ruta, pswsha1 ) '.
                           'VALUES("%s","%s","%s","%s","%s",%s,%s,"%s",sha1("%s"))',
                           $_GET['nombre'] ,
                           $_GET['apellido'] ,
                           $_GET['email'] ,
                           $_GET['contrasena1'] ,
                           $_GET['respuesta'] ,
                           $_GET['tipo'] ,
                           $carpeta_creada ,
                           $ruta ,
                           $_GET['contrasena1']);
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
            $directorio = opendir('../'.$var);
            $dir = '../'.$var; 
            while ($archivo = readdir($directorio)) 
            {
                $total[] = $archivo;
                if (is_dir($dir.'/'.$archivo))
                {
                    if( $archivo!='.' && $archivo!='..'){
                        $carpetas[] = $archivo;
                    }
                }
                else
                {
                    $archivos[] = $archivo;
                }
            }
            $_SESSION['rutaActual'] = $dir;
            $salida['archivos'] = $archivos;
            $salida['carpetas'] = $carpetas;
            $salida['total'] = $total;
        break;



        case 'nuevaRuta':
            $carpetas = array();
            $archivos = array();
            $total = array();
            //echo $_GET['rutaActual'];
            $directorio = opendir('../'.$_GET['rutaActual']);
            $dir = '../'.$_GET['rutaActual']; 
            while ($archivo = readdir($directorio))
            {
                $total[] = $archivo;
                if (is_dir($dir.'/'.$archivo))
                {
                    if( $archivo!='.' && $archivo!='..'){
                        $carpetas[] = $archivo;
                    }
                }
                else
                {
                    $archivos[] = $archivo;
                }
            }
            $_SESSION['rutaActual'] = $dir;
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
            if(is_dir('../'.$_GET['nombreArchivo'])){
                $val = rmdir('../'.$_GET['nombreArchivo']);
                $salida['valor'] = 'Es dir';
            }else{
                $val = unlink('../'.$_GET['nombreArchivo']);
            }
            if($val){
                $salida['valor'] = 1;
            }else{
                $salida['valor'] = 0;
            }
        break;


        case 'comprobarCodigo':
            if($_GET['codigo'] == 'IS-410'){
                $salida['valor'] = 1;
            }else{
                $salida['valor'] = 0;
            }
        break;


        case 'buscarArchivo':
            $directorio = '../'.$_GET['ruta'];
            //$directorio = '../'.substr($_GET['ruta'], 0, strlen($_GET['ruta'])-1);
            $salida['rutaDeArchivo'] = buscar($directorio, $_GET['string']);
            $salida['a1'] = $directorio;
            $salida['string'] = $_GET['string'];
            if(buscar($directorio, $_GET['string']) != FALSE){
                $salida['valor'] = 1;
                $salida['rutaDeArchivo'] = buscar('../'.$_GET['ruta'],$_GET['string']);
                $salida['string'] = $_GET['string'];
            }else{
                $salida['valor'] = 0;
            }
        break;


        
    }



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


     
    function buscar($dir, $archivo_buscar)
    {   
        if (is_dir($dir)){
            $d = opendir($dir); 
            while($archivo = readdir($d) ){
                if ($archivo != "." AND $archivo != ".."){
                    if (is_file($dir.'/'.$archivo)){
                        if ($archivo == $archivo_buscar){
                            return ($dir.'/'.$archivo);
                        }   
                    }
                    if (is_dir($dir.'/'.$archivo)){
                        $r = buscar($dir.'/'.$archivo,$archivo_buscar);
                        if ( basename($r) == $archivo_buscar ){
                            return $r;
                        }    
                    }    
                }         
            } 
        }
        return FALSE;
    }
     
     

    echo json_encode($salida);
    $conexion->cerrarConexion();
?>