<?php
    $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
    $consulta = $discografica->prepare('SELECT * from album');
    $consulta->execute();

    while (($resultado = $consulta->fetch(PDO::FETCH_ASSOC))!= null) {
        echo $resultado['titulo'] . '' . ' Formato: ' . $resultado['formato'] . ' Fecha Lanzamiento ' . $resultado['fechaLanzamiento'] . ' Precio ' . $resultado['precio'];
        echo '<a href="./disco.php?cod='.$resultado['cod'].'"> Titulo </a> <br>';
    }

    echo '<a href="./discoNuevo.php"> Crear un disco Nuevo </a> <br>';
    echo '<a href="./canciones.php"> Visualizar Canciones </a> <br>'
?>