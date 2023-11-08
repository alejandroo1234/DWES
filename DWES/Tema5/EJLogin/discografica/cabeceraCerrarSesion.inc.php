<?php
    echo '<form action="#" method="GET">';
    echo '<input id="reg-mod" type="submit" name="btnCerrar" value="CerrarSesion"/>';
    echo '</form>';
    if(isset($_GET['btnCerrar'])){
        if($_GET['btnCerrar'] == "CerrarSesion"){
            header('Location: ./login.php');
            session_destroy();
        }
    }
?>