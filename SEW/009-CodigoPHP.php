// 009-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

echo "<h3>Funciones con varios return</h3>"; 

function factorial($n){
    if ($n<0) return "No existe el factorial de un número negativo";
    if ($n==0) return 1;
    if ($n>1) return ($n*factorial($n-1));
        else 
            return ($n);   
}
echo "<p>factorial(4) = " . factorial(4) . "</p>";
echo "<p>factorial(-20) = " . factorial(-20) . "</p>";