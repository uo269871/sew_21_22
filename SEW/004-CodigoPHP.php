// 004-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

echo "<h3>Bucle for</h3>";

for($i=0;$i<10;$i++){ 
    echo "<p>i=". $i . "</p>"; 
}
                    
echo "<h3>Bucle while</h3>";
                     
$i = 1;
                      
while ($i <= 10){
    echo "<p>i=" . $i++ . "</p>";  // el valor presentado es $i antes del incremento
}

echo "<h3>Bucle do-while</h3>";
                     
$i = 10;
do {
    echo "<p>i=" . $i-- . "</p>";// el valor presentado es $i antes del decremento
} while ($i >0);

echo "<h3>Bucle for con arrays asociativos</h3>";

$trabajadores = array(
    array('nombre' => 'Cris', 'salario' => 2300),
    array('nombre' => 'Juan', 'salario' => 3500)
);

echo "<pre>";
print_r($trabajadores);
echo "</pre>";

for($i = 0, $size = count($trabajadores); $i < $size; ++$i) {
    $trabajadores[$i]['salario'] = mt_rand(2000, 5000);  //mt_rand — Genera un número entero aleatorio entre dos valores                 
}
                                                    
echo "<h3>Salario modificado</h3>";
                                                     
echo "<pre>";
print_r($trabajadores);
echo "</pre>";
                                                     
echo "<h3>Bucle foreach con arrays asociativos. Solamente funciona con arrays y objetos</h3>";
echo "<h3>Salario duplicado</h3>";
                                                     
foreach($trabajadores as $persona){
    $persona ['salario'] *= 2;                                                 
    echo "<pre>";
    print_r($persona);
    echo "</pre>";                                               
}
    