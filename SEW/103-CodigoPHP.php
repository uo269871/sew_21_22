// 103-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

$api_key = '0565634739c78dcdbf56368cb0991f0b';
$tag = 'oviedo';
$perPage = 20;
// Fotos públicas recientes
$url = 'http://api.flickr.com/services/feeds/photos_public.gne?';
$url.= '&api_key='.$api_key;
$url.= '&tags='.$tag;
$url.= '&per_page='.$perPage;
$url.= '&format=json';
$url.= '&nojsoncallback=1';

$respuesta = file_get_contents($url);
$json = json_decode($respuesta);

if($json==null) {
    echo "<h3>Error en el archivo JSON recibido</h3>";
}
else {
    echo "<h3>JSON decodificado correctamente</h3>";
}

//echo "<h2>JSON recibido</h2>";

// Visualiza el archivo JSON
//print ("<pre>");
//print_r($json);
//print ("</pre>");

echo "<h2>Datos</h2>";

for($i=0;$i<$perPage;$i++) {
    echo "<h3>Foto [$i]</h3>";

    $titulo = $json->items[$i]->title;
    echo"<p>Título[" .$i. "]: " .$titulo. "</p>";

    $enlace = $json->items[$i]->link;
    echo"<p>Enlace[" .$i. "]: " .$enlace. "</p>";

    $etiquetas = $json->items[$i]->tags;
    echo"<p>Etiquetas[" .$i. "]: " .$etiquetas. "</p>";

    $fechaHora = $json->items[$i]->date_taken;
    echo"<p>Fecha[" .$i. "]: " . $fechaHora . "</p>";

    $URLfoto = $json->items[$i]->media->m;       
    print "<img alt='".$titulo."' src='".$URLfoto."' />";
}