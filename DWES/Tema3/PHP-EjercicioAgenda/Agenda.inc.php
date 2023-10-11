<?php
include_once("Contacto.inc.php");

    

class Agenda{
        private static $arrayObjetos;

        public function __construct() {
            $this->arrayObjetos=[];
        }

        public function añadirContacto(Contacto $contacto){
            self::$arrayObjetos[] = $contacto;
        }

        public function eliminarContacto(Contacto $contacto){
            foreach (self::$arrayObjetos as $key => $value) {
                if($value == $contacto){
                    unset(self::$arrayObjetos[$key]);
                }
            }
        }

        public function __get($propiedad){
            return $this->$propiedad;
        }

        public function __set($propiedad,$valor ){
            $this->$propiedad = $valor;
        }

        public function mostrarContacto(){
            foreach (self::$arrayObjetos as $key => $value) {
                 echo $value;
            }
        }
    }
?>