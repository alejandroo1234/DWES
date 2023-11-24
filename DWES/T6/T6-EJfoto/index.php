<?php
    session_start();
    $n_nombre = $_SESSION['usuario'];
    $discografia = new PDO('mysql:host=localhost;dbname=tareasdb','root','');
    $consultaNombre = $discografia->prepare('SELECT * from usuarios where nombre="'.$n_nombre.'"');
    $consultaNombre->execute();
    while ($resultNombre = $consultaNombre->fetch(PDO::FETCH_ASSOC)) {
        echo 'Nombre: ' . $resultNombre['nombre'] . '<br>';
        echo 'Correo: ' . $resultNombre['correo'] . '<br>';
        echo 'Imagen: <img src="'.$resultNombre['imagen'].'"><br>';
        echo 'Imagen2: <img src="'.$resultNombre['imagen2'].'"><br>';

    }
?>