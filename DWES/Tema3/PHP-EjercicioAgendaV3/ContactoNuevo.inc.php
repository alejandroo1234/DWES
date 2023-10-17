<?php
error_reporting(0);
function insertUsers()
{
    try {
        $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
        $consulta = $dwes->stmt_init();
        $consulta->prepare('INSERT INTO contacto (nombre,apellido1,apellido2,phone) VALUES(?,?,?,?);');
        $n_name = $_POST['nombre'];
        $n_apellido1 = $_POST['apellido'];
        $n_apellido2 = $_POST['apellido2'];
        $n_phone = $_POST['numTel'];
        $consulta->bind_param('ssss', $n_name, $n_apellido1, $n_apellido2, $n_phone);
        $consulta->execute();
        $consulta->close();
        $dwes->close();
        header("Location: ./ContactoNuevo.inc.php");
    } catch (\Throwable $th) {
        echo $th;
    }
}

function modificar(){
    $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
        $consulta = $dwes->stmt_init();
        $consulta->prepare('UPDATE contacto SET nombre=?,apellido1=?,apellido2=?,phone=? where IdContacto="' . $_GET['idContacto'] . '"');
        $n_name = $_POST['nombre'];
        $n_apellido1 = $_POST['apellido'];
        $n_apellido2 = $_POST['apellido2'];
        $n_phone = $_POST['numTel'];
        $consulta->bind_param('ssss', $n_name, $n_apellido1, $n_apellido2, $n_phone);
        $consulta->execute();
        $consulta->close();
        $dwes->close();
        header("Location: ./ContactoNuevo.inc.php");
}

function imprimirFormVacio()
{
    echo '<nav>
    <form name="formulario_prueba_2" action="#" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            Nombre: <input type="text" required name="nombre" > <br>
            Apellido: <input type="text" required name="apellido" > <br>
            Segundo Apellido: <input type="text" required name="apellido2" > <br>
            Numero tel: <input type="number" required name="numTel" > <br>
            <input type="submit" required name="Enviar Formulario">
        </fieldset>
    </form>
</nav>';
}

function borrarUser()
{
    $idContactoVar = $_GET['idContacto'];

    $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
    $consulta = $dwes->stmt_init();
    $resultado = $consulta->prepare('SELECT * from contacto where IdContacto="' . $idContactoVar . '"');
    if ($resultado) {
        $resultado = "";
        $consulta->prepare('DELETE from contacto where IdContacto="' . $idContactoVar . '"');
        $consulta->execute();
    }
    if ($consulta) {
        try {
            header("Location: ./ContactoNuevo.inc.php");
        } catch (\Throwable $th) {
            echo 'Ha ocurrido un error inesperado';
        }
    }
    $consulta->close();
    $dwes->close();
}

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


    } else if($_GET['action'] == 'Modificar'){
        modificar();
    }else{
        insertUsers();
    }



} else {
    if ($_GET['action'] == 'Borrar') {
        borrarUser();
    } else if ($_GET['action'] == 'Modificar') {
        $dwes = new mysqli('localhost', 'agenda2', 'agenda', 'agenda');
        $resultado = $dwes->query('SELECT * from contacto where IdContacto="' . $_GET['idContacto'] . '"');
        $varResult = $resultado->fetch_object();

        echo '<nav>
    <form name="formulario_prueba_2" action="#" method="post">
        <fieldset>
            <legend>Datos personales</legend>
            Nombre: <input type="text" required name="nombre" value="' . $varResult->nombre . '"> <br>
            Apellido: <input type="text" required name="apellido" value="' . $varResult->apellido1 . '"> <br>
            Segundo Apellido: <input type="text" required name="apellido2" value="' . $varResult->apellido2 . '"> <br>
            Numero tel: <input type="number" required name="numTel" value="' . $varResult->phone . '"> <br>
            <input type="submit" required name="Enviar Formulario">
        </fieldset>
    </form>
</nav>';


    }else{
        imprimirFormVacio();
    }

}

function imprimRepit()
{
    echo '<nav>
    <form name="formulario_prueba_2" action="#" method="post">
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