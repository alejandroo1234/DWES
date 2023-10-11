<?php


if ($_POST) {
    if (preg_match('~[0-9]+~', $_POST['nombre'])) {
        echo 'El nombre no puede contener numeros';
        $_POST['nombre'] = "";
        imprimRepit();
    } else if (preg_match('~[0-9]+~', $_POST['apellido'])) {
        echo 'El apellido no puede contener numeros';
        $_POST['apellido'] = "";
        imprimRepit();
    } else if (preg_match('~[0-9]+~', $_POST['apellido2'])) {
        echo 'El apellido2 no puede contener numeros';
        $_POST['apellido2'] = "";
        imprimRepit();


    } else {
        $conexion = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
        $resultado = $conexion->query('INSERT INTO contacto (nombre,apellido1,apellido2,phone) VALUES("'.$_POST["nombre"].'","'.$_POST["apellido"].'","'.$_POST["apellido2"].'","'.$_POST["numTel"].'");');
        echo 'todo ha salido bien : <br>';
        echo '<a href="./ContactoNuevo.inc.php" >Crear otro contacto </a> <br>';
    }

} else {
    echo '<nav>
    <form name="formulario_prueba_2" action="ContactoNuevo.inc.php" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            Nombre: <input type="text" required name="nombre"> <br>
            Apellido: <input type="text" required name="apellido"> <br>
            Segundo Apellido: <input type="text" required name="apellido2"> <br>
            Numero tel: <input type="number" required name="numTel"> <br>
            <input type="submit" required name="Enviar Formulario">
        </fieldset>
    </form>
</nav>';
}

function imprimRepit()
{
    echo '<nav>
    <form name="formulario_prueba_2" action="ContactoNuevo.inc.php" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            Nombre: <input type="text" required name="nombre" value="' . $_POST['nombre'] . '"> <br>
            Apellido: <input type="text" required name="apellido" value="' . $_POST['apellido'] . '"> <br>
            Segundo Apellido: <input type="text" required name="apellido2" value="' . $_POST['apellido2'] . '"> <br>
            Numero tel: <input type="number" required name="numTel" value="' . $_POST['numTel'] . '"> <br>
            <input type="submit" required name="Enviar Formulario">
        </fieldset>
    </form>
</nav>';
}

include("FooterContactos.inc.php");

//var_dump($_POST);
?>