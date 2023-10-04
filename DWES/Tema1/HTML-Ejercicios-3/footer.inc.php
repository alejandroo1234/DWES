<?php


$fechaDia = date('l');
$diaNumero = date('d');
$fechaMes = date('M');
$diaMes = date('Y');

$arrayBidimensional = ["Dias"=>[
    "Monday" => "Lunes",
    "Tuesday" => "Martes",
    "Wednesday" => "Miercoles",
    "Thursday" => "Jueves",
    "Friday" => "Viernes",
    "Saturday" => "Sabado",
    "Sunday" => "Domingo"

],"Meses" =>[
    "Jan" => "Enero",
    "Fre" => "Febrero",
    "Mar"=> "Marzo",
    "Apr"=> "Abril",
    "May"=>"Mayo",
    "Jun"=>"Junio",
    "Jul"=>"Julio",
    "Aug"=>"Agosto",
    "Sep"=>"Septiembre",
    "Oct"=> "Octubre",
    "Nov"=>"Noviembre",
    "Dec"=>"Diciembre"
]];
/*
switch ($fechaDia) {
    case 'Monday':
        $fechaDia = 'Lunes';
        break;

    case 'Tuesday':
        $fechaDia = 'Martes';
        break;

    case 'Wednesday':
        $fechaDia = 'Miercoles';
        break;

    case 'Thursday':
        $fechaDia = 'Jueves';
        break;

    case 'Friday':
        $fechaDia = 'Viernes';
        break;

    case 'Saturday':
        $fechaDia = 'Sabado';
        break;

    case 'Sunday':
        $fechaDia = 'Domingo';
        break;

    default:
        break;
}

switch ($fechaMes) {
    case 'Jan':
        $fechaMes = 'Enero';
        break;

    case 'Fre':
        $fechaMes = 'Febrero';
        break;

    case 'Mar':
        $fechaMes = 'Marzo';
        break;

    case 'Apr':
        $fechaMes = 'Abril';
        break;

    case 'May':
        $fechaMes = 'Mayo';
        break;

    case 'Jun':
        $fechaMes = 'Junio';
        break;

    case 'Jul':
        $fechaMes = 'Julio';
        break;

    case 'Aug':
        $fechaMes = 'Agosto';
        break;

    case 'Sep':
        $fechaMes = 'Septiembre'; 
        break;

    case 'Oct':
        $fechaMes = 'Octubre';
        break;

    case 'Nov':
        $fechaMes = 'Noviembre';
        break;

    case 'Dec':
        $fechaMes = 'Diciembre';
        break;

    default:
        # code...
        break;
}
*/

$nombreYapellidos = "Alejandro Muñoz Gonzalez";
echo "<footer> $nombreYapellidos ".$arrayBidimensional["Dias"][$fechaDia].", $diaNumero de".$arrayBidimensional["Meses"][$fechaMes]." de $diaMes</footer>";

?>