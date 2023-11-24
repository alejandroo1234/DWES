<?php
if($_POST){
    $n_nombre = $_POST['usuario'];
    $n_contra = $_POST['contrasena'];
    $discografia = new PDO('mysql:host=localhost;dbname=tareasdb','root','');
    $consultaNombre = $discografia->prepare('SELECT * from usuarios where nombre="'.$n_nombre.'"');
    $consultaNombre->execute();
    $resultNombre = $consultaNombre->fetch(PDO::FETCH_ASSOC);
    if($resultNombre){
        if(password_verify($n_contra,$resultNombre['contrasena'])){
            echo 'Login correcto';
            session_start();
            $_SESSION['usuario'] = $n_nombre;
            $_SESSION['dameID'] = $resultNombre['nombre'];
            header('Location: ./index.php');
        }else{
            echo 'Login incorrecto';
            header('Location: ./login.php');
        }
    }
}else{
    session_start();
    if($_SESSION){
        echo '<label> Deseas inicar sesion con: ' . $_SESSION['usuario']. ' </label>';
        echo '<form action="#" method="GET">';
        echo '<input id="reg-mod" type="submit" name="btnSi" value="Si"/>';
        echo '<input id="reg-mod" type="submit" name="btnNo" value="No"/>';
        echo '</form>';
        if(isset($_GET['btnSi']) || isset($_GET['btnNo'])){
            if($_GET['btnSi'] == 'Si'){
                header('Location: ./index.php');
            }else{
                session_unset();
                header('Location: ./login.php');
            }
        }
    }else{
        enseñarLogin();
    }
    
}




function enseñarLogin()
{
    echo '<h1> FORMULARIO para el login de los usuarios</h1>';
    echo '<form action="#" method="post">';
    echo '<label name="usuario">Usuario: </label>';
    echo '<input type="text" required name="usuario" placeholder="" />';
    echo '<label for="contrasena">Contraseña: </label>';
    echo '<input type="password" required name="contrasena" placeholder="" />';
    echo '<input id="reg-mod" type="submit" value="Comprobar"/>';
    echo '<button  onclick=location.href="./registro.php"> Registrate!</button>';
    echo '</form>';     
}
?>