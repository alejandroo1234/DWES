<?php
include_once("cabecera.inc.php");


$numero = 30;

for ($i = 0; $i <= $numero; $i++) {
    echo "$i ";
}

function factorial($num)
{
    $fact = 1;
    echo "<p>$num!=$num";
    for ($i = $num; $i >= 1; $i--) {
        $fact = $fact * $i;
        if ($num != $i) {
            echo "X $i";
        }
    }
    echo "=$fact </p>";
}
factorial(5);

include_once("footer.inc.php");
?>