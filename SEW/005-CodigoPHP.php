// 005-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

echo"<h2>Ejemplo de if - elseif - else</h2>";

$i=7;

if ($i == 0) {
    echo "<p>i es igual a 0 </p>";
} elseif ($i == 1) {
    echo "<p>i es igual a 1</p>";
} elseif ($i == 2) {
    echo "<p>i es igual a 2</p>";
} else {
    echo "<p>i = " . $i . "</p>";
}

echo"<h2>Ejemplo de switch</h2>";

switch ($i) {
    case 0:
        echo "<p>i es igual a 0</p>";
        break;
    case 1:
        echo "<p>i es igual a 1</p>";
        break;
    case 2:
        echo "<p>i es igual a 2</p>";
        break;
    default:
        echo "<p>i = " . $i . "</p>";
        break;
}

echo"<h2>Ejemplo de switch con string</h2>";

$fruta ="manzana";

switch ($i) {
    case "mango":
        echo "<p>mango</p>";
        break;
    case "pera":
        echo "<p>pera</p>";
        break;
    case "ciruela":
        echo "<p>ciruela</p>";
        break;
    default:
        echo "<p>fruta = " . $fruta . "</p>";
        break;
}

