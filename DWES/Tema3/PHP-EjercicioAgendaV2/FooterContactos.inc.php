<?php
  $consulta = 'Select * from contacto';
  $conexion = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
  $resultado = $conexion->query($consulta);

  $infoContactos = $resultado->fetch_object();
  while ($infoContactos != null) {
      echo ' IdContacto ' . $infoContactos->IdContacto . ' Nombre '. $infoContactos->nombre. ' Apellido 1 '. $infoContactos->apellido1. ' apellido2 '. $infoContactos->apellido2. ' tel ' . $infoContactos->phone. '<a href="./borrarContacto.php?idContacto='.$infoContactos->IdContacto.'" >borrar </a> <br>';
      $infoContactos = $resultado->fetch_object();
  }
  

?>