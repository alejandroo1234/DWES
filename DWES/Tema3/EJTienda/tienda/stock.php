<?php
error_reporting(0);
if ($_POST) {
    $tiendaVar = $_GET['tienda'];
    $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'dwes');
    $consulta = $dwes->stmt_init();
    $consulta->prepare('UPDATE stock SET unidades='.$_POST['tienda'].' where producto="' . $_GET['cod'] . '" and tienda='.$tiendaVar.'');
    $consulta->execute();
    header("Location: ./main.php");
} else {
    $varCodProducto = $_GET['cod'];
    $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'dwes');
    $consulta = $dwes->stmt_init();
    if ($consulta->prepare('SELECT * from stock where producto="' . $varCodProducto . '"')) {
        $consulta->execute();
        $consulta->bind_result($cod, $tienda, $unidades);

        $consulta->fetch();
        if ($_GET['action'] == 'Modificar') {

            $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'dwes');
            $consulta = $dwes->stmt_init();
            $consulta->prepare('SELECT * from stock where producto="' . $varCodProducto . '" && tienda="' . $tienda . '"');
            $consulta->execute();
            $consulta->bind_result($cod, $tienda, $unidades);
            echo '<nav>
    <form name="formulario_prueba_2" action="#" method="post">
        <fieldset>
            ';
            while ($consulta->fetch()) {
                echo 'Cod' . $cod . ': <input type="number" required name="tienda" value="' . $tienda . '" requires value="' . $unidades . '"> <br>';
            }
            echo ' 
            <label><input type="submit"></label>
            </fieldset> </form>';
        } else {
            do {
                echo 'cod: ' . $cod . ' Tienda: ' . $tienda . ' Unidades: ' . $unidades;
                echo '<a href="./stock.php?cod=' . $cod . '&action=Modificar&tienda=' . $tienda . '"> Modificar </a> <br>';
            } while ($consulta->fetch());

        }
        $consulta->close();
    } else {
        echo "Error en la consulta: " . $dwes->error;
    }
    $dwes->close();
}


?>