<?php
session_start();
if ($_SESSION) {
    include("cabeceraCerrarSesion.inc.php");
    if ($_POST) {
        $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
        $consulta = $discografica->prepare('INSERT into cancion VALUES(:titulo,:album,:posicion,:duracion,:genero)');
        $n_titulo = $_POST['titulo'];
        $n_album = $_GET['cod'];
        $n_posicion = $_POST['posicion'];
        $n_duracion = $_POST['duracion'];
        $n_genero = $_POST['genero'];
        $consulta->bindParam(':titulo', $n_titulo);
        $consulta->bindParam(':album', $n_album);
        $consulta->bindParam(':posicion', $n_posicion);
        $consulta->bindParam(':duracion', $n_duracion);
        $consulta->bindParam(':genero', $n_genero);
        $ok = true;
        $discografica->beginTransaction();

        if ($consulta->execute() === 0) {
            $ok = false;
        }
        if ($ok) {
            $discografica->commit();
            enseñarForm();
        } else {
            $discografica->rollBack();
        }
    } else {
        enseñarForm();
    }
} else {
    header('Location: ./Login.php');
}


function enseñarForm()
{
    $codAlbum = $_GET['cod'];
    $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
    $consulta = $discografica->prepare('SELECT * from album where cod="' . $codAlbum . '"');
    $consulta->execute();
    $tituloAlbum = $consulta->fetch(PDO::FETCH_ASSOC);
    echo '<h1> FORMULARIO PARA AÑADIR CANCIONES y el titulo del album es:' . $tituloAlbum['titulo'] . '</h1>';
    echo '<h1>Crear nueva canción</h1>';
    echo '<form action="#" method="post">';
    echo '<input type="text" required name="titulo" placeholder="Título" />';
    echo '<label name="album">Album: ' . $tituloAlbum['cod'] . '</label>';
    echo '<label for="Posicion">Posición: </label>';
    echo '<input type="number" min=0 name="posicion" value=0 />';
    echo '<label>Duración: </label>';
    echo '<input type="time" name="duracion" step="1"/>';
    echo '<label>Género: </label>';
    echo '<select name="genero">
			<option> Acustica</option>
			<option> BSO</option>
			<option> Blues</option>
			<option> Folk</option>
			<option> Jazz</option>
			<option> New age</option>
			<option> Pop</option>
			<option> Rock</option>
			<option> Electronica</option>
			</select>';
    echo '<input id="reg-mod" type="submit" value="Registrar"/>';
    echo '<button  onclick=location.href="./index.php">Volver al inicio</button>';
    echo '</form>';
}


?>