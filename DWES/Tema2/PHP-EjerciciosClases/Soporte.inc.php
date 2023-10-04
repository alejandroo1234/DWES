<?php
include("Resumible.inc.php");
abstract class Soporte implements Resumible
{
    public $titulo;
    protected $numero;
    private $precio;

    private const IVA = 0.21;

    public function __construct($titulo, $numero, $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPrecioConIva()
    {
        return $this->precio * self::IVA;
    }
    public function getMuestraResumen()
    {
        echo `El precio normal es: ` . $this->precio . "<br>" .`y con IVA es: ` . $this->precio * self::IVA. "<br>";
    }
}

// $soporte1 = new Soporte("Tenet", 22, 3);
// echo "<strong>" . $soporte1->titulo . "</strong>";
// echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
// echo "<br>Precio IVA incluido: " .
//     $soporte1->getPrecioConIva() . " euros";
// $soporte1->getMuestraResumen();


?>