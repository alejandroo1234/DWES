<?php
    include('cabecera.inc.php');
    
    echo 'Nombre y correo ';
    echo $_POST['nombre'].''.$_POST['correo'].'<br>';
    echo 'el usuario a elegido y el dia ';
    echo $_POST['si/no'].''.$_POST['dia'];

    include('footer.inc.php');
    
?>