<?php
    $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'dwes');
    $consulta = $dwes->stmt_init();
    if($consulta->prepare('SELECT cod,nombre,nombre_corto,PVP,familia from producto')){
        $consulta->execute();
        $consulta->bind_result($cod,$nombre,$nombre_corto,$PVP,$familia);
        while ($consulta->fetch()) {
            echo 'cod: ' . $cod . ' Nombre: ' . $nombre . ' nombre corto: ' . $nombre_corto  . ' PVP: ' . $PVP . 'familia: '. $familia;
            echo '<a href="./stock.php?cod=' . $cod .'"> Ver stock </a> <br>';
        }

        $consulta->close();

    }else{
        echo "Error en la consulta: " . $dwes->error;
    }

    $dwes->close();

?>