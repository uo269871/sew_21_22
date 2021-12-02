// 001-CodigoPHP.php
// Versión 1.0 09/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 08/12/2018 Uso de empty() con un string vscío
// Versión 1.2 15/12/2018 Uso de empty() con un string no vscío

# Inferencia de tipos en PHP
# Los tipos de las constantes y variables en PHP se infieren de la parte derecha de la asignación

# Definir constantes

define("GRACIAS", "Muchas gracias por utilizar mis ejemplos de PHP");
define("DIASAÑO", 365.256363004);

# Mostrar valores y tipos de las constantes
#var_dump(): muestra los valores y tipos de las constantes 

echo"<p>" .GRACIAS. " { var_dump() = ";
    var_dump(GRACIAS);
echo" }</p>";

echo"<p>días al año = " .DIASAÑO. " { var_dump() = ";
    var_dump(DIASAÑO);
echo" }</p>";

# Declarar variables

$entero = 27;
$flotante = 2.7271728;
$cadena = "¡Hola a todos!";
$cadenaVacia = '';
$booleanoTrue = true;
$amigos = array("Luis", "Amparo", "Carlos");

# Declaración de un array asociativo clave-valor

$agenda = [
    "Cris"      => "+3412345678",
    "Antonio"   => "+3487654321",
    "Paloma"    => "+3498712345",
    "Guillermo" => "+1765432190"
];

# Se muestran los valores y tipos de las variables
#var_dump(): muestra los valores y tipos de las variables 

echo "<p>entero = " . $entero . " { var_dump() = ";
    var_dump($entero); 
echo" }</p>";

echo "<p>flotante = " . $flotante . " { var_dump() = ";
    var_dump($flotante); 
echo" }</p>";

echo "<p>cadena = " . $cadena . " { var_dump() = ";
    var_dump($cadena); 
echo" }</p>";

echo "<p>cadena = " . $cadena . " { var_dump() = ";
    var_dump(empty($cadena)); 
echo" }</p>";

echo "<p>cadenaVacia = " . $cadenaVacia . " { var_dump() = ";
    var_dump(empty($cadenaVacia)); 
echo" }</p>";

echo "<p>booleanoTrue = " . $booleanoTrue . " { var_dump() = ";
    var_dump($booleanoTrue); 
echo" }</p>";

echo"<p>amigos = [ " .$amigos[0] . " , " .$amigos[1] ." , " .$amigos[2]. " ] { var_dump() = ";
    var_dump($amigos); 
echo" }</p>";

echo"<p>agenda = [ " .$agenda["Cris"] . " , " .$agenda["Antonio"] ." , " .$agenda["Paloma"]. " , " .$agenda["Guillermo"] . " ] { var_dump() = ";
    var_dump($agenda);
echo" }</p>";

echo"<pre>agenda = ";
    print_r($agenda);
echo"</pre>";