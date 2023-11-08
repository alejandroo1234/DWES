<?php
if ($_POST) {
    $n_usuario = $_POST['usuario'];
    $n_contra = $_POST['contrasena'];
    $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
    $consulta = $discografica->prepare('SELECT * from tabla_usuarios where usuario="' . $n_usuario . '";');
    $consulta->execute();
    if ($consulta) {
        $tenerUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
        try {
            if (password_verify($n_contra, $tenerUsuario['password'])) {
                session_start();
                $_SESSION['usuario'] = $n_usuario;
                $_SESSION['contra'] = $n_contra;
                echo 'Login Correcto';
            } else {
                echo 'Login Incorrecto';
            }
        } catch (\Throwable $th) {
        }

    }

} else {
    session_start();
    if ($_SESSION) {
        echo 'Deseas iniciar sesion con el usuario' . $_SESSION['usuario'];
        echo '<form action="#" method="GET">';
        echo '<input id="reg-mod" type="submit" name="btnSi" value="Si"/>';
        echo '<input id="reg-mod" type="submit" name="btnNo" value="No"/>';
        echo '</form>';
        if (isset($_GET['btnSi']) || isset($_GET['btnNo'])) {
            if ($_GET['btnSi'] == "Si") {
                $_SESSION['nombreUsu'] = $tenerUsuario['usuario'];
                header("Location: ./index.php");
            } else {
                session_unset();
                header('Location: ./Login.php');
            }
        }
    } else {
        enseñarLogin();
    }
}


function enseñarLogin()
{
    echo '<h1> FORMULARIO PARA entrar en las canciones</h1>';
    echo '<form action="#" method="post">';
    echo '<label name="usuario">Usuario: </label>';
    echo '<input type="text" required name="usuario" placeholder="" />';
    echo '<label for="contrasena">Contraseña: </label>';
    echo '<input type="password" required name="contrasena" placeholder="" />';
    echo '<input id="reg-mod" type="submit" value="Comprobar"/>';
    echo '<button  onclick=location.href="./registro.php">Registro</button>';
    echo '</form>';
}
?>