// 015-CodigoPHP.php
// Versión 1.0 11/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 12/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

/**
 * Definición de la clase Vehiculo
 */
class Vehiculo {
    // Las constantes de clase están asignadas una vez por clase, y no por cada instancia de la clase
    const PAISFABRICACION = "VW0";
    const FACTORIA = "T0270000V";
    protected $matricula;
    protected $modelo;
    protected $propietario;
    protected static $numeroVehiculosProducidos = 0;
    private $numeroBastidor;
    
    public function __construct($matricula, $modelo, $propietario){
        $this->matricula = $matricula;
        $this->modelo = $modelo;
        $this->propietario = $propietario;
        self::$numeroVehiculosProducidos++;
        $this->numeroBastidor = self::PAISFABRICACION . self::FACTORIA . self::$numeroVehiculosProducidos;
    }
    
    public function getMatricula(){
        return $this->matricula;
    }
    
    public function getModelo(){
        return $this->modelo;
    }

    public function getPropietario(){
        return $this->propietario;
    }

    public function setPropietario($propietario){
        $this->propietario = $propietario;
    }
    
    public function getNumeroVehiculosProducidos() {
        return self::$numeroVehiculosProducidos;
    }
    
    public function getNumeroBastidor(){
        return $this->numeroBastidor;
    }
    
    public function ver(){
        $cadena = "Matrícula: " .$this->getMatricula() . " Modelo: " .$this->getModelo(). " Propietario: ". $this->getPropietario(). " Número de bastidor: " . $this->getNumeroBastidor();
        return $cadena;
    }
}

$auris = new Vehiculo("1111-DDD","Auris Sport", "Juan Manuel");
$seat = new Vehiculo("3333-PPP","Ibiza GTi", "Cris");
$camaro = new Vehiculo("7777-XXX","Camaro", "Guillermo");
$mondeo = new Vehiculo("2222-AAA","Mondeo", "Antonio");
    
echo "<p>Número de vehiculos producidos: " .Vehiculo::getNumeroVehiculosProducidos(). "</p>";

echo "<p>" .$auris->ver(). "</p>";
echo "<p>" .$seat->ver(). "</p>";
echo "<p>" .$camaro->ver(). "</p>";
echo "<p>" .$mondeo->ver(). "</p>";

$mondeo->setPropietario("Paloma");

echo "<p>Nuevo propietario</p>";

echo "<p>" .$mondeo->ver(). "</p>";
