<?php
if ($_POST) {
    include("Usuario.php");
    $insertUsuario = new Usuario;
    $n_nombre = $_POST['usuario'];
    $n_pass = $_POST['contrasena'];
    $n_mail = $_POST['correo'];
    $n_foto = $_FILES['archivo'];
    var_dump($_FILES);



    $discografia = new PDO('mysql:host=localhost;dbname=tareasdb', 'root', '');
    $consulta = $discografia->prepare('SELECT * FROM usuarios where nombre="' . $n_nombre . '";');
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);


    if ($_FILES['archivo']['error'] != UPLOAD_ERR_OK) { // Se comprueba si hay un error al subir el archivo
        echo 'Error: ';
        switch ($_FILES['archivo']['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'El fichero es demasiado grande';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo 'El fichero no se ha podido subir entero';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo 'No se ha podido subir el fichero';
                break;
            default:
                echo 'Error indeterminado.';
        }
        exit();
    }


    if ($_FILES['archivo']['type'] != 'image/png' && $_FILES['archivo']['type'] != 'image/jpeg' && $_FILES['archivo']['type'] != 'image/jpg') {
        echo 'No se trata de un fichero png o jpg';
        exit();

    } else {
        $imagenTamano = getimagesize($_FILES['archivo']['tmp_name']);
        if ($imagenTamano[0] > 360 || $imagenTamano[1] > 480) {
            echo 'Es mu grande';
            exit();
        }
        $imagenGrande = imagecreatetruecolor(360, 480);
        $imagenPeque = imagecreatetruecolor(70, 96);

        
        if(!is_dir('./img/users/'.$n_nombre)){
            mkdir('./img/users/'.$n_nombre);
        }

        switch ($_FILES['archivo']['type']) {
            case 'image/png':
                $sourcePng = imagecreatefrompng($n_foto['tmp_name']);
                
                imagecopyresized($imagenGrande, $sourcePng, 0, 0, 0, 0, 360, 480, $imagenTamano[0], $imagenTamano[1]);
                imagepng($imagenGrande,'./img/users/'.$n_nombre.'/'.$n_nombre.'.png');
                imagecopyresized($imagenPeque, $sourcePng, 0, 0, 0, 0, 70, 96, $imagenTamano[0], $imagenTamano[1]);
                imagepng($imagenPeque,'./img/users/'.$n_nombre.'/'.$n_nombre.'Peque.png');
                
                break;

            case 'image/jpeg':
                $sourceJpeg = imagecreatefromjpeg($n_foto['tmp_name']);
                imagecopyresized($imagenGrande, $sourceJpeg, 0, 0, 0, 0, 360, 480, $imagenTamano[0], $imagenTamano[1]);
                imagepng($imagenGrande,'./img/users/'.$n_nombre.'/'.$n_nombre.'.png');
                imagecopyresized($imagenPeque, $sourceJpeg, 0, 0, 0, 0, 70, 96, $imagenTamano[0], $imagenTamano[1]);
                imagepng($imagenPeque,'./img/users/'.$n_nombre.'/'.$n_nombre.'Peque.png');
                break;

            case 'image/jpg':
                $sourceJpeg = imagecreatefromjpeg($n_foto['tmp_name']);

                imagecopyresized($imagenGrande, $sourceJpeg, 0, 0, 0, 0, 360, 480, $imagenTamano[0], $imagenTamano[1]);
                imagepng($imagenGrande,'./img/users/'.$n_nombre.'/'.$n_nombre.'.png');
                imagecopyresized($imagenPeque, $sourceJpeg, 0, 0, 0, 0, 70, 96, $imagenTamano[0], $imagenTamano[1]);
                imagepng($imagenPeque,'./img/users/'.$n_nombre.'/'.$n_nombre.'Peque.png');
                break;

            default:
                
                break;
        }

    }






     if ($resultado) {
         echo 'No pueden tener el mismo nombre de usuario';
         echo '<button  onclick=location.href="./registro.php"> Volver Registro</button>';
     } else {
        
        $path = './img/users/'.$n_nombre.'/'.$n_nombre.'.png';
        $path2 = './img/users/'.$n_nombre.'/'.$n_nombre.'Peque.png';
         $insertUsuario->insertarUsuario($n_nombre, $n_mail, $n_pass,$path,$path2);
         header('Location: ./login.php');
     }
} else {
    enseñarRegistro();
}






function enseñarRegistro()
{
    echo '<h1> FORMULARIO para el registro de los usuarios</h1>';
    echo '<form action="#" method="post" enctype="multipart/form-data">';
    echo '<label name="usuario">Usuario: </label>';
    echo '<input type="text" required name="usuario" placeholder="" />';
    echo '<label name="correo">Correo: </label>';
    echo '<input type="mail" required name="correo" placeholder="" />';
    echo '<label for="contrasena">Contraseña: </label>';
    echo '<input type="password" required name="contrasena" placeholder="" />';
    echo '<input type="file" name="archivo" id="archivo"/>';
    echo '<input id="reg-mod" type="submit" value="Comprobar"/>';
    echo '</form>';
}
?>