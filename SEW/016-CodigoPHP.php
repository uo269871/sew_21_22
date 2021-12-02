// 016-CodigoPHP.php
// Versión 1.0 12/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 13/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

/*
Precaución:
El uso de eval() es muy peligroso porque permite la ejecución de código PHP arbitrario.
Su uso está totalmente desaconsejado.
*/

echo "<h3>Evaluacion de expresiones</h3>";

$expresion = "24 + 2 * 500";
echo "<p>eval(\" return " . $expresion . "; \") = " .eval("return $expresion ;"). "</p>";

echo "<h3>Evaluación de código</h3>";

$codigo = "sin(deg2rad(45))";
echo "<p>eval(\" return " . $codigo . "; \") = " .eval("return $codigo ;"). "</p>";

echo "<h3>Manejo de excepciones</h3>";

try {
    eval ("return 27 % 0 ;");
}
catch (DivisionByZeroError $e) {
    echo "<p>Error: " .$e->getMessage(). "</p>";
}
