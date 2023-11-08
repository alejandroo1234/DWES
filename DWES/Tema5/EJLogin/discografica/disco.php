<?php
session_start();
if ($_SESSION) {
    include("cabeceraCerrarSesion.inc.php");
    $varCodAlbum = $_GET['cod'];
    $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
    $consulta = $discografica->prepare('SELECT * from cancion where album="' . $varCodAlbum . '"');
    $consulta->execute();
    while (($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) != null) {
        echo $resultado['titulo'] . '' . ' Album: ' . $resultado['album'] . ' Posicion ' . $resultado['posicion'] . ' Duracion ' . $resultado['duracion'] . ' Genero ' . $resultado['genero'];
        echo '<a href="./cancionNueva.php?cod=' . $resultado['album'] . '"> AñadirCancion </a>';
        echo '<a href="./borrarDisco.php?codEliminar=' . $resultado['album'] . '"> Eliminar Album y todas sus canciones </a> <br>';
    }
} else {
    header("Location: ./Login.php");
}

?>