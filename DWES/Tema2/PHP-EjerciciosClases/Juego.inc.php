<?php
    include("Soporte.inc.php");

    class Juego extends Soporte{
        public $consola;
        private $minNumJugadores;
        private $maxNumJugadores;

        public function __construct($titulo,$numero,$precio,$consola,$minNumJugadores,$maxNumJugadores){
            parent::__construct($titulo,$numero,$precio);
            $this->consola=$consola;
            $this->minNumJugadores=$minNumJugadores;
            $this->maxNumJugadores=$maxNumJugadores;
        }

        public function muestraJugadoresPosibles(){
            if($this->minNumJugadores==1 && $this->maxNumJugadores ==1){
                echo "Para un jugador";
            }else if($this->minNumJugadores == $this->maxNumJugadores){
                echo "Para". $this->maxNumJugadores . "jugadores";
            }else{
                echo "De ". $this->minNumJugadores . "a" . $this->maxNumJugadores;
            }
        }

        public function getMuestraResumen(){
            echo parent::getMuestraResumen(). "Juego para". $this->consola. "<br>" .$this->titulo . "<br>" . $this->getPrecio() ."(IVA NO INCLUIDO)". "<br>". $this->muestraJugadoresPosibles();
        }
    }

    $miJuego = new Juego("The Last of Us Part II", 26, 49.99,
"PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " .
$miJuego->getPrecioConIva() . " euros";
$miJuego->getMuestraResumen();

?>