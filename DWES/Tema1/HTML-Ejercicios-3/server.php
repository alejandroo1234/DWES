<?php
    include_once("cabecera.inc.php");

    $arrayServer = $_SERVER;
    echo "<table border=2>";
    foreach ($arrayServer as $clave => $value) {
        echo "<tr><td>[".$clave."]</td>.<td>$value</td></tr>";
    }

    echo "</table>";












    include("footer.inc.php");

?>