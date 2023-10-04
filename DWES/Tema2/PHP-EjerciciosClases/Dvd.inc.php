<?php
    include("Soporte.inc.php");

    class Dvd extends Soporte{
        public $idiomas;
        private $formatPantalla;

        public function __construct($titulo, $numero, $precio, $idiomas,$formatPantalla){
            parent::__construct($titulo,$numero,$precio);
            $this->idiomas=$idiomas;
            $this->formatPantalla=$formatPantalla;
        }

        public function getMuestraResumen(){
            echo parent::getMuestraResumen(). "Pelicula en DVD". "<br>".$this->titulo. "<br>". $this->getPrecio(). "(IVA NO INCLUIDO)". "<br>". "Idiomas: ". $this->idiomas. "<br>"."Formato pantallas". $this->formatPantalla;
        }
    }

// $miDvd = new Dvd("Origen", 24, 15, "es,en,fr",
// "16:9");
// echo "<strong>" . $miDvd->titulo . "</strong>";
// echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
// echo "<br>Precio IVA incluido: " .
// $miDvd->getPrecioConIva() . " euros";
// $miDvd->getMuestraResumen();
?>