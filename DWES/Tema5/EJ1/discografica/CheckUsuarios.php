<?php
$discografica = new PDO('mysql:host=localhost;dbname=discografia', 'agenda2', 'agenda');
$consulta = $discografica->prepare('INSERT into tabla_usuarios(usuario,password) VALUES(?,?)');
$n_nombre = 'Cuki';
$consulta->bindParam(1, $n_nombre);
$pass = 'Amador';
$hash = password_hash($pass, PASSWORD_DEFAULT);
$consulta->bindParam(2, $hash);
$consulta->execute();
?>