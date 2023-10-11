<?php
    class Contacto{
        private $idContacto=0;
        public $Nombre;
        public $ape1;
        public $ape2;
        public $phone;


        public function __construct($name,$apellido1,$apellido2,$numeroTel) {
            $this->idContacto = rand(1,1000);
            $this->Nombre = $name;
            $this->ape1 = $apellido1;
            $this->ape2 = $apellido2;
            $this->phone = $numeroTel;
        }
        public function __set($propiedad,$valor ){
            $this->$propiedad = $valor;
        }

        public function __get($propiedad){
            return $this->$propiedad;
        }

        public function __toString(){
            return 'El id de contacto '.$this->idContacto . ' Nombre '. $this->Nombre .' con apellidos '. $this->ape1 . ' ' . $this->ape2 . ' con telefono ' . $this->phone. '<br>';
        }
    }
?>