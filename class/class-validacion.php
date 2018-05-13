<?php
    session_start();
    class Validacion{
        private $var = 0;
        public function __construct(){
            $this->var = "Location: index.html";
        }
        
        public function ejecutarValidacion(){
            if ( !isset($_SESSION["rutaActual"]) || !isset($_SESSION['usr']) || !isset($_SESSION['pswsha1'])){
                header($this->var);
            }/*else{
                return substr($_SESSION["rutaActual"],3);
            }*/
        }

        public function crearCasoLogin(){
            $_SESSION['logeado'] = 1;
        }

        public function ejecutarValidacionRespaldo(){
            if(!isset($_SESSION['logeado'])){
                header($this->var);
            }
        }

        public function ejecutarValidacionCargar(){
            if ( !isset($_SESSION["rutaActual"]) ){
                header($this->var);
            }else{
                return substr($_SESSION["rutaActual"],3);
            }
        }

        public function salir(){
            session_destroy();
            header($this->var);
        }
    }
?>