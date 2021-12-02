// 010-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 08/12/2018 Escribe el contenido de $_SERVER

// Variables predefinidas - PHP proporciona una gran cantidad de variables predefinidas
// Algunas de las variables predefinidas son superglobales
// Las variables superglobales se pueden accedidas desde cualquier función, clase o archivo.
// Variables predefinidas superglobales:
// $GLOBALS
// $_SERVER
// $_REQUEST
// $_POST
// $_GET
// $_FILES
// $_ENV
// $_COOKIE
// $_SESSION

echo "<h3>Variables superglobales: GLOBALS</h3>";

$a = 27;
$b = 5;
 
function suma() {
    $GLOBALS['c'] = $GLOBALS['a'] + $GLOBALS['b'];
}
 
suma();
echo "<p>27 + 5 = " . $c. "</p>";

echo "<h3>Variables superglobales: _SERVER</h3>";

$nombreServidor = $_SERVER["SERVER_NAME"]; 
echo "<p>Su servidor es " . $nombreServidor. "</p>";

$ipServidor = $_SERVER["SERVER_ADDR"];
echo "<p>La dirección IP del servidor es " . $ipServidor. "</p>";

$softwareServidor =  $_SERVER["SERVER_SOFTWARE"];
echo "<p>El software del servidor es " . $softwareServidor. "</p>";

$ipCliente = $_SERVER["REMOTE_ADDR"];
echo "<p>La IP de la máquina cliente " . $ipCliente. "</p>";

$navegador = $_SERVER["HTTP_USER_AGENT"];
echo "<p>Información del USER AGENT del navegador: " . $navegador. "</p>"; 

$idiomaNavegador = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
echo "<p>Idioma del navegador: " . $idiomaNavegador. "</p>"; 

echo "<h3>Array asociativo con el contenido de _SERVER</h3>";
echo "<pre>";
print_r($_SERVER); //Escribe el contenido de $_SERVER
echo "</pre>";
