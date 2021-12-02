// 014-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

$archivo = "./014-Oviedo.xml";

// Obtiene el archivo XML que se pasa como parámetro y se recibe como un string
$datos = file_get_contents($archivo);
if($datos==null) {
    echo "<h3>Error en el archivo XML recibido</h3>";
}
else {
    echo "<h3>XML recibido correctamente</h3>";
}

echo "<h2>XML</h2>";

$datos =preg_replace("/>\s*</",">\n<",$datos);

echo '<pre>', htmlentities($datos), '</pre>';

// Se convierte el string en un objeto XML
$xml = new SimpleXMLElement($datos);

echo "<h2>XML como objeto SimpleXMLElement</h2>";
echo '<pre>', print_r($xml), '</pre>';

echo "<h2>Datos</h2>";

$icono = $xml->weather['icon'];
$URLicono = "http://openweathermap.org/img/w/" . $icono . ".png";
$descripcion = $xml->weather['value'];
echo "<img src = '$URLicono' alt = '$descripcion' >";

echo "<p>Ciudad: {$xml->city['name']}</p>";
echo "<p>País: {$xml->city->country}</p>";
echo "<p>Coordenadas: Longitud {$xml->city->coord['lon']} grados</p>";
echo "<p>Coordenadas: Latitud {$xml->city->coord['lat']} grados</p>";
echo "<p>Temperatura: {$xml->temperature['value']} grados Celsius</p>";
echo "<p>Temperatura mínima: {$xml->temperature['min']} grados Celsius</p>";
echo "<p>Temperatura máxima: {$xml->temperature['max']} grados Celsius</p>";
echo "<p>Temperatura (unidades): {$xml->temperature['unit']} </p>";
echo "<p>Humedad: {$xml->humidity['value']} {$xml->humidity['unit']} </p>";
echo "<p>Presión: {$xml->pressure['value']} {$xml->pressure['unit']} </p>";
echo "<p>Velocidad del viento: {$xml->wind->speed['value']} metros/segundo</p>";
echo "<p>Tipo de viento: {$xml->wind->speed['name']} </p>";
echo "<p>Dirección del viento: {$xml->wind->direction['value']} grados</p>";
echo "<p>Orientación del viento: {$xml->wind->direction['code']} </p>";
echo "<p>Nombre del viento: {$xml->wind->direction['name']} </p>";
echo "<p>Nubosidad: {$xml->clouds['value']} %. Descripción: {$xml->clouds['name']} </p>";
echo "<p>Visibilidad: {$xml->visibility['value']} metros </p>";
echo "<p>Estado del tiempo: {$xml->weather['value']} </p>";
$fechaHoraAmanecer = new DateTime($xml->city->sun['rise'], new DateTimeZone('Europe/Madrid')); 
echo "<p>Amanece: " . $fechaHoraAmanecer->format("d/m/Y G:i:sP e") . "</p>";
$fechaHoraOscurecer = new DateTime($xml->city->sun['set'], new DateTimeZone('Europe/Madrid')); 
echo "<p>Oscurece: " . $fechaHoraOscurecer->format("d/m/Y G:i:sP e") . "</p>";
$fechaHoraActualizacion = new DateTime($xml->lastupdate['value'], new DateTimeZone('Europe/Madrid'));     
echo "<p>Última actualización: " .$fechaHoraActualizacion->format("d/m/Y G:i:sP e") ."</p>";
