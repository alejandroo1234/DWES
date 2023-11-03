<?php
    if($_POST){
        $n_usuario = $_POST['usuario'];
        $n_contra = $_POST['contrasena'];
        $discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
        $consulta = $discografica->prepare('SELECT * from tabla_usuarios where usuario="'.$n_usuario.'";');
        $consulta->execute();
        if($consulta){
            $tenerUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
            if(password_verify($n_contra,$tenerUsuario['password'])){
                echo 'Login Correcto';
                setcookie('MiCoockieUsuario[0]',$n_usuario,time()+3600);
                setcookie('MiCoockieUsuario[1]',$n_contra,time()+3600);
            }else{
                echo 'Login Incorrecto';
            }
        }

    }else{
        if(isset($_COOKIE['MiCoockieUsuario'])){
            echo 'Deseas iniciar sesion con el usuario'. $_COOKIE['MiCoockieUsuario'][0];
            echo '<form action="#" method="GET">';
            echo '<input id="reg-mod" type="submit" name="btnSi" value="Si"/>';
            echo '<input id="reg-mod" type="submit" name="btnNo" value="No"/>';
            echo '</form>';
            if(isset($_GET['btnSi']) || isset($_GET['btnNo'])){
                if($_GET['btnSi'] == "Si"){
                    echo 'Acceso Correcto';
                }else{
                    setcookie('MiCoockieUsuario[0]',"",time()-3600);
                    setcookie('MiCoockieUsuario[1]',"",time()-3600);
                    header('Location: ./Login.php');
                }
            }
        }else{
            enseñarLogin();
        }
    }


    function enseñarLogin(){
        echo '<h1> FORMULARIO PARA Comprobar Usuarios</h1>';
        echo '<form action="#" method="post">';
		echo '<label name="usuario">Usuario: </label>';
        echo '<input type="text" required name="usuario" placeholder="" />';
		echo '<label for="contrasena">Contraseña: </label>';
        echo '<input type="password" required name="contrasena" placeholder="" />';
		echo '<input id="reg-mod" type="submit" value="Comprobar"/>';
		echo '</form>';
    }
?>