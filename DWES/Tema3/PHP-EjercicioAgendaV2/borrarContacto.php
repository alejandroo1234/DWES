<?php
$idContactoVar = $_GET['idContacto'];

$conexion = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
  $resultado = $conexion->query('SELECT * from contacto where idContacto="'.$idContactoVar.'"');
  if($resultado){
      $resultado = "";
      $resultado = $conexion->query('DELETE  from contacto where idContacto="'.$idContactoVar.'"');
  }
  if($resultado){
    try {
        header("Location: ./ContactoNuevo.inc.php");
    } catch (\Throwable $th) {
        echo 'Ha ocurrido un error inesperado';
    }  
    
      
  }
?>