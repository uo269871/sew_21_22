// 011-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

$archivo = fopen ("./011-prueba.txt", "r");

while (!feof($archivo)) {
    $linea = fgets($archivo); 
    echo "<p>" .$linea ."</p>";
}
fclose ($archivo);    