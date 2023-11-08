<?php

if ($_POST) {
    $n_nombre = $_POST['usuario'];
    $pass = $_POST['contrasena'];
    $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
    $consulta = $discografica->prepare('SELECT * from tabla_usuarios where usuario="' . $n_nombre . '";');
    if ($consulta) {
        echo 'No se puede poner el mismo nombre de usuario';
        echo '<button  onclick=location.href="./registro.php">Volver a registro</button>';
    } else {
        $consulta = $discografica->prepare('INSERT into tabla_usuarios(usuario,password) VALUES(?,?)');
        $consulta->bindParam(1, $n_nombre);
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $consulta->bindParam(2, $hash);
        $consulta->execute();
    }
} else {
    enseñarRegistro();
}

function enseñarRegistro()
{
    echo '<h1> FORMULARIO PARA registrar en las canciones</h1>';
    echo '<form action="#" method="post">';
    echo '<label name="usuario">Usuario: </label>';
    echo '<input type="text" required name="usuario" placeholder="" />';
    echo '<label for="contrasena">Contraseña: </label>';
    echo '<input type="password" required name="contrasena" placeholder="" />';
    echo '<input id="reg-mod" type="submit" value="Comprobar"/>';
    echo '</form>';
}
?>