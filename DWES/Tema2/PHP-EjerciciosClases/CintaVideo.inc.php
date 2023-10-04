<?php
include("Soporte.inc.php");
class CintaVideo extends Soporte
{
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    public function getMuestraResumen()
    {
        echo parent::getMuestraResumen(). "Pelicula en VHS". "<br>". $this->titulo . "<br>". $this->getPrecio(). "(IVA NO INCLUIDO)". "<br>". "Duracion". $this->duracion;
    }
}

// $miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
// echo "<strong>" . $miCinta->titulo . "</strong>";
// echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
// echo "<br>Precio IVA incluido: " .
//     $miCinta->getPrecioConIva() . " euros";
// $miCinta->getMuestraResumen();
?>