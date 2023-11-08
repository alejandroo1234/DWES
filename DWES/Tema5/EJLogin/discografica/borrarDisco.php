<?php
session_start();
if ($_SESSION) {
    include("cabeceraCerrarSesion.inc.php");
    $varCodAlbum = $_GET['codEliminar'];
    $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
    $consulta = $discografica->prepare('DELETE  from cancion where album=' . $varCodAlbum . '');
    $ok = true;
    $discografica->beginTransaction();

    if ($consulta->execute() === 0) {
        $ok = false;
    }
    if ($ok) {
        $discografica->commit();
    } else {
        $discografica->rollBack();
    }

    $consulta = $discografica->prepare('DELETE  from album where cod=' . $varCodAlbum . '');
    $ok = true;
    $discografica->beginTransaction();

    if ($consulta->execute() === 0) {
        $ok = false;
    }
    if ($ok) {
        $discografica->commit();
        header("Location: ./index.php");
    } else {
        $discografica->rollBack();
    }
} else {
    header('Location: ./Login.php');
}

?>