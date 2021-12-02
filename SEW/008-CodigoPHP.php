// 008-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo


echo "<h3>Función hola()</h3>"; 

//Funciones sin parámetros
function hola(){
    return "Hola a todos"; 
}
echo "<p>" . hola() . "</p>"; 

echo "<h3>Función ver()</h3>";

//Funciones con parámetros pasados por valor
function ver($nombre, $apellidos, $telefono){
    echo "<p>Nombre: " . $nombre . "</p>"; 
    echo "<p>Apellidos: " .$apellidos. "</p>"; 
    echo "<p>Teléfono: " .$telefono. "</p>"; 
}

ver("Cris","Solana Pellón", "+3412345678");
ver("Juan Manuel","Cueva Lovelle", "+3410341578");

echo "<h3>Función suma()</h3>";

//Funciones que devuelven valores
function suma ($a,$b){
    $a += $b;
    return $a;
}

echo "<p> 27 + 5 =" . suma(27,5) . "</p>"; 
echo "<p> 27 - 5 =" . suma(27,-5) . "</p>"; 
