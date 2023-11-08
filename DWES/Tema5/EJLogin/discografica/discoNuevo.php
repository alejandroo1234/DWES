<?php
session_start();
if ($_SESSION) {
    include("cabeceraCerrarSesion.inc.php");
    if ($_POST) {
        $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
        $consulta = $discografica->prepare('INSERT into album (titulo,discografia,formato,precio) VALUES(:titulo,:discografia,:formato,:precio)');
        $n_titulo = $_POST['titulo'];
        $n_discografia = $_POST['Discografia'];
        $n_formato = $_POST['formato'];
        $precio = $_POST['precio'];
        $consulta->bindParam(':titulo', $n_titulo);
        $consulta->bindParam(':discografia', $n_discografia);
        $consulta->bindParam(':formato', $n_formato);
        $consulta->bindParam(':precio', $precio);
        $ok = true;
        $discografica->beginTransaction();

        if ($consulta->execute() === 0) {
            $ok = false;
        }
        if ($ok) {
            echo 'Se ha realizado correctamente';
            $discografica->commit();
            header('Location: ./index.php');
        } else {
            $discografica->rollBack();
        }
    } else {
        enseñarForm();
    }
} else {
    header("Location: ./Login.php");
}

function enseñarForm()
{
    echo '<h1> FORMULARIO PARA AÑADIR Albumes</h1>';
    echo '<h1>Crear nueva album</h1>';
    echo '<form action="#" method="post">';
    echo '<label name="Titulo">Titulo: </label>';
    echo '<input type="text" required name="titulo" placeholder="" />';
    echo '<label for="Discografia">Discografia: </label>';
    echo '<input type="text" required name="Discografia" placeholder="" />';
    echo '<select name="formato">
			<option> vinilo</option>
			<option> cd</option>
			<option> dvd</option>
			<option> mp3</option>
			</select>';
    echo '<label name="precio">Precio: </label>';
    echo '<input type="text" required name="precio" placeholder="" />';
    echo '<input id="reg-mod" type="submit" value="Registrar"/>';
    echo '<button  onclick=location.href="./index.php">Volver al inicio</button>';
    echo '</form>';
}
?>