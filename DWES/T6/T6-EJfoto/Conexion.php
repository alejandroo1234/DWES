<?php
class Conexion{
    public $usuario;
    public $contrasena;
    public $bd;

    public function __construct($usuario,$contrasena,$bd){
        $this->usuario=$usuario;
        $this->contrasena=$contrasena;
        $this->bd=$bd;
    }

    public function conexion(){
        
    }

}
?>