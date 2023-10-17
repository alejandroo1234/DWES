<?php
$idContactoVar = $_GET['idContacto'];

$dwes = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
$consulta = $dwes->stmt_init();
  $resultado = $consulta->prepare('SELECT * from contacto where idContacto="'.$idContactoVar.'"');
  if($resultado){
      $resultado = "";
      $consulta->prepare('DELETE from contacto where idContacto="'.$idContactoVar.'"');
      $consulta->execute();
  }
  if($consulta){
    try {
        header("Location: ./ContactoNuevo.inc.php");
    } catch (\Throwable $th) {
        echo 'Ha ocurrido un error inesperado';
    }  
  }
  $consulta->close();
  $dwes->close();
?>