<?php


$dwes = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
$consulta = $dwes->stmt_init();
if ($consulta->prepare('SELECT IdContacto, nombre, apellido1, apellido2, phone FROM contacto')) {
    $consulta->execute();
    $consulta->bind_result($IdContacto, $nombre, $apellido1, $apellido2, $phone);

    while ($consulta->fetch()) {
        echo 'IdContacto: ' . $IdContacto . ' Nombre: ' . $nombre . ' Apellido 1: ' . $apellido1 . ' Apellido 2: ' . $apellido2 . ' Teléfono: ' . $phone;
        echo '<a href="./ContactoNuevo.inc.php?idContacto=' . $IdContacto . '&action=Borrar"> Borrar </a>';
        echo '<a href="./ContactoNuevo.inc.php?idContacto=' . $IdContacto . '&action=Modificar"> Modificar </a><br>';
    }

    $consulta->close();
} else {
    echo "Error en la consulta: " . $dwes->error;
}

$dwes->close();
?>