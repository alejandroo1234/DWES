<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Principal Html</title>
    <meta name='Html Principal' content='width=device-width, initial-scale=1'>
    <link rel='Principal' type='text/css' media='screen' href='main.css'>
</head>

<body> 
        <?php
            include("cabecera.inc.php");
            
        ?>
    <nav>
        <p>Desarrollador de programación multimedia y futuro Desarrollador web</p>
        <a href="mailto:paquito@correo.com">Escribir MAIL</a>
        <br>
        <a href="tecnologias.php">Tecnologias</a>
        <br>
        <a href="rrss.php">RRSS</a>
        <br>
        <img src="cr7.jpg" alt="CR7">

        <form name="formulario_prueba" action="consulta.php" method="post">
            <fieldset>
                <legend>Datos personales</legend>
                Nombre: <input type="text" name="nombre"> <br>
                Correo: <input type="text" name="correo"> <br>
                Si o no: <input type="checkbox" name="si/no"><br>
                Fecha <input type="date" name="dia"><br>
                <input type="submit" name="Enviar Formulario">
            </fieldset>
        </form>
    </nav>

    
        <?php
            include("footer.inc.php");    
        ?>    
</body>
</html>