// 013-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

$archivo = "./013-Oviedo.json";
// Obtiene el archivo JSON que se pasa como parámetro y se recibe como un string
$datos = file_get_contents($archivo);
echo "<h2>JSON visto como un array asociativo</h2>";

// Muestra el archivo JSON recibido como string maquetado en bonito
echo "<pre>";
    $jsonMaquetado = json_decode($datos, JSON_PRETTY_PRINT);
    print_r($jsonMaquetado);
echo "</pre>";

// Se convierte el JSON en un objeto PHP
$json = json_decode($datos);

if($json==null) {
    echo "<h3>Error en el archivo JSON recibido</h3>";
}
else {
    echo "<h3>JSON decodificado correctamente</h3>";
}

# Datos contenidos en el JSON
$estacion = $json->name;
$pais =$json->sys->country;
$lat = $json->coord->lat;
$lon = $json->coord->lon;
$temp = $json->main->temp;
$tempmax = $json->main->temp_max;
$tempmin = $json->main->temp_min;
$presion = $json->main->pressure;
$humedad = $json->main->humidity;
$velocidadViento = $json->wind->speed;
if(isset($json->wind->deg)) {
    $direccionViento = $json->wind->deg;
}
else{
    $direccionViento ="No disponible";
}
$estadoCielo = $json->weather[0]->main;
$descripcion = $json->weather[0]->description;
$icono = $json->weather[0]->icon;
$URLicono = "http://openweathermap.org/img/w/" . $icono . ".png";
$nubosidad = $json->clouds->all;
$amanece = $json->sys->sunrise;
$oscurece = $json->sys->sunset;
$fechaHoraMedida = $json->dt;


echo "<h2>Datos</h2>";
echo "<img src = '$URLicono' alt = '$descripcion' >";
echo "<p>Ciudad: " . $estacion . "</p>";
echo "<p>País: " . $pais . "</p>";
echo "<p>[longitud = ".$lon. " grados, latitud = ".$lat. " grados]</p>";
echo "<p>Estado del cielo: " .$estadoCielo ."</p>";
echo "<p>Descripción: ".$descripcion."</p>";
echo "<p>Nubosidad: " . $nubosidad . " %</p>";
echo "<p>Temperatura: ".$temp." grados Celsius [Máx: ".$tempmax." grados Celsius, Mín: ".$tempmin." grados Celsius]</p>";
echo "<p>Presión: ".$presion. " milibares</p>";
echo "<p>Humedad: ".$humedad. " %</p>";
echo "<p>Velocidad del viento: " . $velocidadViento . " metros/segundo</p>";
echo "<p>Dirección del viento: " . $direccionViento . " grados</p>";
echo "<p>Fecha y hora del amanecer: " . date("d-m-Y G:i:s",$amanece) . "</p>";
echo "<p>Fecha y hora del oscurecer: " . date("d-m-Y G:i:s",$oscurece) . "</p>";
echo "<p>Fecha y hora de la medida: " . date("d-m-Y G:i:s",$fechaHoraMedida) . "</p>";