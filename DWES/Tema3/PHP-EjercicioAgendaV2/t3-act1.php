<?php
    require_once('Contacto.inc.php');
    require_once('Agenda.inc.php');

    $agenda = new Agenda();

    $cont1 = new Contacto("diego", "rico", "mamalon", 49823847293874);
    $cont2 = new Contacto("adrian", "danvila", "feo", 5353452);
    $cont3 = new Contacto("alejandro", "estupefaciente", "morgue", 254566756);

    $agenda->añadirContacto($cont1);
    $agenda->añadirContacto($cont2);
    $agenda->añadirContacto($cont3);
    $agenda->mostrarContacto();
    $agenda->eliminarContacto($cont1);
    $agenda->mostrarContacto();
?>