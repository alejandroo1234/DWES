<?php
include("cabecera.inc.php");

if ($_POST) {
    if ($_POST['contrasena'] != $_POST['repiteContrasena']) {
        echo 'La contraseña no es igual';
        $_POST['contrasena'] = "";
        $_POST['repiteContrasena'] = "";
        imprimRepit();
    } else if (!preg_match("'^(.+)@(\\S+)$'", $_POST['correo'])) {
        echo 'el correo esta mal';
        $_POST['correo'] = "";
        imprimRepit();
    } else if(preg_match('~[0-9]+~',$_POST['nombre'])) {
        echo 'El nombre no puede contener numeros';
        $_POST['nombre']="";
        imprimRepit();
    }else if(preg_match('~[0-9]+~',$_POST['apellido'])){
        echo 'El apellido no puede contener numeros';
        $_POST['apellido']="";
        imprimRepit();
    }else{
        echo 'todo ha salido bien :)';
    }

} else {
    echo '<nav>
    <form name="formulario_prueba_2" action="registro.php" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            Nombre: <input type="text" required name="nombre"> <br>
            Apellido: <input type="text" required name="apellido"> <br>
            Contraseña: <input type="password" required name="contrasena"><br>
            Repite Contrasena : <input type="password" required name="repiteContrasena"><br>
            Correo: <input type="email" required name="correo"> <br>
            Fecha de nacimiento: <input type="date" required name="fechaNacimiento"><br>
            Genero: <input type="text" required name="genero"><br>
            Condiciones: <input type="checkbox" required name="condiciones"><br>
            Newsletter: <input type="checkbox" required name="publicidad"><br>
            <input type="submit" required name="Enviar Formulario">
        </fieldset>
    </form>
</nav>';
}

function imprimRepit()
{
    echo '<nav>
    <form name="formulario_prueba_2" action="registro.php" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            Nombre: <input type="text" required name="nombre" value="' . $_POST['nombre'] . '"> <br>
            Apellido: <input type="text" required name="apellido" value="' . $_POST['apellido'] . '"> <br>
            Contraseña: <input type="password" required name="contrasena" value="' . $_POST['contrasena'] . '"><br>
            Repite Contrasena : <input type="password" required name="repiteContrasena" value="' . $_POST['repiteContrasena'] . '"><br>
            Correo: <input type="email" required name="correo" value="' . $_POST['correo'] . '"> <br>
            Fecha de nacimiento: <input type="date" required name="fechaNacimiento" value="' . $_POST['fechaNacimiento'] . '"><br>
            Genero: <input type="text" required name="genero" value="' . $_POST['genero'] . '"><br>
            Condiciones: <input type="checkbox" required name="condiciones" value="' . $_POST['condiciones'] . '"><br>
            Newsletter: <input type="checkbox" required name="publicidad" value="' . $_POST['publicidad'] . '"><br>
            <input type="submit" required name="Enviar Formulario">
        </fieldset>
    </form>
</nav>';
}


//var_dump($_POST);
include("footer.inc.php");
?>