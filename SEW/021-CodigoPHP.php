// 021-CodigoPHP.php
// Versión 1.0 23/11/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

/**
 * Definición de la clase PilaLIFO
 */

class PilaLIFO {

    protected $pila;
    protected $tamagnoMax; //número de elementos máximo que se pueden almacenar en la pila

    public function __construct($tamagnoMax = 5 ){
        // Crea la pila con un array con 5 elementos como máximo (valor por defecto)
        $this->pila = array();
        // El tamaño es el número máximo de elementos en la pila
        $this->tamagnoMax = $tamagnoMax;
    }

    public function apilar($elemento) {
        // precondición: Comprueba que la pila no supere el tamaño máximo
        if ($this->longitud() < $this->tamagnoMax) {
            // inserta un elemento en la cabeza del array
            array_unshift($this->pila, $elemento);
        } else {
            throw new RunTimeException('¡Pila llena: no hay espacio para apilar más elementos!');
        }
    }

    public function desapilar() {
        //precondición: comprueba que la pila no esté vacía    
        if ($this->vacia()) {
            throw new RunTimeException('¡Pila vacía! No se pueden desapilar elementos');
        } else {
            // desapila un elemento del inicio del array
            return array_shift($this->pila);
        }
    }
            
    public function getTamagnoMax(){
         //devuelve el número de elementos máximo que se pueden almacenar en la pila
         return $this->tamagnoMax;   
    }
    
    public function longitud(){
         //devuelve el número de elementos de la pila
         return count($this->pila);   
    }

    public function ultimo() {
        return current($this->pila);
    }

    public function vacia() {
        return empty($this->pila);
    }
            
    public function ver(){
        echo '<pre>';
        print_r($this->pila);
        echo '</pre>';
    } 

}

/**
 * Objetos de la clase PilaLIFO
 */
echo "<p>Crear pila</p>";           
$miPila = new PilaLIFO();
$miPila->apilar(1);
$miPila->apilar("Juego de Tronos");
$miPila->apilar(2.7181823);
$miPila->apilar(3);
$miPila->apilar(3.141592);           

echo "<p>Ver la pila</p>";
echo "<p>" .$miPila->ver(). "</p>";
            
echo "<p>Último de la pila = " .$miPila->ultimo(). "</p>";

echo "<p>Elemento desapilado = " .$miPila->desapilar(). "</p>";

echo "<p>apilar(4)</p>";  
$miPila->apilar(4);
            
echo "<p>Ver la pila</p>";
echo "<p>" .$miPila->ver(). "</p>";
            
echo "<p>Tamaño máximo de la pila =" .$miPila->getTamagnoMax(). "</p>";
echo "<p>Número de elementos en la pila =" .$miPila->longitud(). "</p>";

try{
    echo "<p>Intentar apilar</p>";
    $miPila->apilar(5);
}
catch(Exception $e) {
            echo "<p>Mensaje: " .$e->getMessage()."</p>";
}
            
echo "<p>Elemento desapilado = " .$miPila->desapilar(). "</p>";
echo "<p>Elemento desapilado = " .$miPila->desapilar(). "</p>";
echo "<p>Elemento desapilado = " .$miPila->desapilar(). "</p>";
echo "<p>Elemento desapilado = " .$miPila->desapilar(). "</p>";
echo "<p>Elemento desapilado = " .$miPila->desapilar(). "</p>";
            
echo "<p>Número de elementos en la pila =" .$miPila->longitud(). "</p>";
            
try{
    echo "<p>Intentar desapilar</p>";
    $miPila->desapilar();
}
catch(Exception $e) {
            echo "<p>Mensaje: " .$e->getMessage()."</p>";
}          

