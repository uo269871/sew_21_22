// 007-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 08/12/2018 Escribe el contenido de $_SERVER

// $_SERVER - es una variable predefinida
// $_SERVER - Muestra información del entorno del servidor y y del entorno de ejecución
// $_SERVER - Es un array que contiene información, tales como cabeceras, rutas y ubicaciones de script

$IPcliente = $_SERVER["REMOTE_ADDR"]; 
echo "<p>La IP en su máquina cliente es " . $IPcliente . "</p>";

$servidor = $_SERVER["SERVER_NAME"];
echo "<p>El nombre del servidor es " . $servidor . "</p>";

$IPservidor = $_SERVER["SERVER_ADDR"];
echo "<p>La IP del servidor es " . $IPservidor . "</p>";

$softwareServidor = $_SERVER["SERVER_SOFTWARE"];
echo "<p>El software en el servidor es " . $softwareServidor . "</p>";

$protocolo = $_SERVER["SERVER_PROTOCOL"];
echo "<p>El protocolo que se utiliza para comunicarse con el servidor es " . $protocolo . "</p>";

$rutaScript = $_SERVER["SCRIPT_FILENAME"];
echo "<p>La ruta del script que se ejecuta en el servidor es " . $rutaScript . "</p>";

echo "<h3>Array asociativo con el contenido de _SERVER</h3>";
echo "<pre>";
print_r($_SERVER); //Escribe el contenido de $_SERVER
echo "</pre>";