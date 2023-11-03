<?php
if ($_POST) {
    $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
    if ($_POST['Radios'] == 'TituloCancion') {
        try {
            $n_titulo = $_POST['titulo'];
            $n_genero = $_POST['Genero_Musical'];
            $consulta = $discografica->query('SELECT * from cancion where titulo like "%'.$n_titulo.'%" AND genero LIKE "%'.$n_genero.'%";');
            $consulta->execute();
            
            while (($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) != null) {
                echo $resultado['titulo'] . '' . ' Album: ' . $resultado['album'] . ' Posicion ' . $resultado['posicion'] . ' Duracion ' . $resultado['duracion'] . ' Genero ' . $resultado['genero'];
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    if ($_POST['Radios'] == 'NombreAlbum') {
        try {
            $n_titulo = $_POST['titulo'];
            $consulta = $discografica->query('SELECT * from album where titulo like "%'.$n_titulo.'%";');
            $consulta->execute();
            while (($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) != null) {
                echo $resultado['cod'] . '' . ' Titulo: ' . $resultado['titulo'] . ' Discografia ' . $resultado['discografia'] . ' formato ' . $resultado['formato'] . ' Precio ' . $resultado['precio'];
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    if ($_POST['Radios'] == 'Ambos') {
        try {
            $n_titulo = $_POST['titulo'];
            $n_genero = $_POST['Genero_Musical'];
            $consulta = $discografica->query('SELECT * from cancion where titulo like "%'.$n_titulo.'%" AND genero LIKE "%'.$n_genero.'%";');
            $consulta->execute();
            while (($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) != null) {
                echo $resultado['titulo'] . '' . ' Album: ' . $resultado['album'] . ' Posicion ' . $resultado['posicion'] . ' Duracion ' . $resultado['duracion'] . ' Genero ' . $resultado['genero'] . '<br>';
            }
            $n_titulo = $_POST['titulo'];
            $consulta2 = $discografica->query('SELECT * from album where titulo like "%'.$n_titulo.'%";');
            $consulta2->execute();
            while (($resultado = $consulta2->fetch(PDO::FETCH_ASSOC)) != null) {
                echo $resultado['cod'] . '' . ' Titulo: ' . $resultado['titulo'] . ' Discografia ' . $resultado['discografia'] . ' formato ' . $resultado['formato'] . ' Precio ' . $resultado['precio'].'<br>';
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }
} else {
    getForm();
}


function getForm()
{
    echo '<h1> FORMULARIO PARA AÑADIR Albumes</h1>';
    echo '<h1>Buscar </h1>';
    echo '<form action="#" method="post">';
    echo '<label name="Titulo">Titulo: </label>';
    echo '<input type="text" required name="titulo" placeholder=""> <br>';
    echo '<input type="radio" name="Radios" id="TituloCancion" value="TituloCancion">';
    echo '<label for="TituloCancion">TituloCancion </label>';
    echo '<input type="radio" name="Radios" id="NombreAlbum" value="NombreAlbum">';
    echo '<label for="NombreAlbum">NombreAlbum </label>';
    echo '<input type="radio" name="Radios" id="Ambos" value="Ambos">';
    echo '<label for="Ambos">Ambos </label> <br>';
    echo '<select name="Genero_Musical">
			<option>Clasico</option>
			<option>BSO</option>
			<option>Blues</option>
			<option>Folk</option>
            <option>Jazz</option>
            <option>New Age</option>
            <option>Pop</option>
            <option>Rock</option>
            <option>Electronica</option>
			</select>';
    echo '<input id="reg-mod" type="submit" value="Buscar"/>';
    echo '</form>';
}
?>