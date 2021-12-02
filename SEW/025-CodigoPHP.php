// 025-CodigoPHP.php
// Calculadora para diabéticos usando clases y objetos
// Versión 1.0 02/12/2018 Juan Manuel Cueva Lovelle. Universidad de Oviedo

/**
 * Definición de la clase CalculadoraDiabetica
 */

class CalculadoraDiabetica {
    protected $glucosa;
    protected $glucosilada;

    public function __construct($glucosa){
        $this->glucosa = floatval($glucosa); //Convierte un string en un float
        $this->glucosilada = (46.7 + $this->glucosa) / 28.7 ;
    }
    
    public function getGlucosa(){
         //devuelve la glucosa
         return $this->glucosa;   
    }

    public function getGlucosilada(){
         //devuelve la glucosilada
         return $this->glucosilada;   
    }
}

$miGlucosa = 0.0;
$miGlucosilada = 0.0;

//Solo se ejecutará si se han enviado los datos desde el formulario al pulsar el boton Calcular
if (count($_POST)>0) 
    {   
        $miCalculadora = new CalculadoraDiabetica($_POST["glucosa"]);
        $miGlucosa = $miCalculadora->getGlucosa();
        $miGlucosilada = $miCalculadora->getGlucosilada();
    }

// Interfaz con el usuario. En el interior de comillas dobles se deben usar comillas simples
echo "  
        <h3>Convierte la glucosa media en Hemoglobina glucosilada</h3>
        <h4>Rango de validez de la conversión: valores entre 70 y 500 de glucosa media en mg/dL</h4>

        <form action='#' method='post' name='calculadora'>
            <p>Glucosa media en los últimos 90 días (mg/dL):
                <input type='text' name='glucosa' value='$miGlucosa'/>
            </p>
            <p>Hemoglobina glucosilada (%):
                <input type='text' name='glucosilada' value='$miGlucosilada' readonly/>
            </p>           
            <input type='submit'  value='Calcular'/>
        </form>
    ";

echo "<h3>Variables</h3>";
echo "<p>miGlucosa = " . $miGlucosa . " { var_dump() = "; var_dump($miGlucosa); echo" }</p>";
echo "<p>miGlucosilada = " . $miGlucosilada . " { var_dump() = "; var_dump($miGlucosilada); echo" }</p>";
