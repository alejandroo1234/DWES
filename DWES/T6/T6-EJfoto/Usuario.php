<?php
    class Usuario{
        public $n_usuario;
        public $n_mail;
        public $n_contra;


        public function __construct(){
            
        }

        public function insertarUsuario($usuario, $correo, $contrasena, $path1, $path2){
        $discografia = new PDO('mysql:host=localhost;dbname=tareasdb','root','');
        $consulta = $discografia->prepare('INSERT into usuarios(nombre,correo,contrasena,imagen,imagen2) VALUES(?,?,?,?,?)');
        $consulta->bindParam(1,$usuario);
        $contraHass = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta->bindParam(2,$correo);
        $consulta->bindParam(3,$contraHass);
        $consulta->bindParam(4,$path1);
        $consulta->bindParam(5,$path2);
        $consulta->execute();
        }
    }
?>