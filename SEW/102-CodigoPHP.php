// 102-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

#
# crear la URL de la API que se va a llamar
#

$params = array(
    'api_key'	=> '0565634739c78dcdbf56368cb0991f0b',
    'method'	=> 'flickr.photos.getInfo',
    'photo_id'	=> '33289594495',
    'format'	=> 'php_serial',
);

$encoded_params = array();

foreach ($params as $k => $v){

    $encoded_params[] = urlencode($k).'='.urlencode($v);
}

#
# llamar a la API y decodificar la respuesta
#

$url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);

$rsp = file_get_contents($url);

$rsp_obj = unserialize($rsp);

echo "<h2>Objeto PHP recibido</h2>";
print ("<pre>");
print_r($rsp_obj);
print ("</pre>");

echo "<h2>Datos recibidos</h2>";
#
# ver los datos de la imagen (o un error)
#

if ($rsp_obj['stat'] == 'ok'){

    $tituloImagen = $rsp_obj['photo']['title']['_content'];
    echo "<p>Título: $tituloImagen"."</p>";

    if (isset($rsp_obj['photo']['tags']['tag'][0]['raw'])){
        $subTituloImagen0 = $rsp_obj['photo']['tags']['tag'][0]['raw'];
        echo "<p>Subtítulo[0]: $subTituloImagen0"."</p>";    
    }

    if (isset($rsp_obj['photo']['tags']['tag'][1]['raw'])){
        $subTituloImagen1 = $rsp_obj['photo']['tags']['tag'][1]['raw'];
        echo "<p>Subtítulo[1]: $subTituloImagen1"."</p>";    
    }

    if (isset($rsp_obj['photo']['tags']['tag'][2]['raw'])){
        $subTituloImagen2 = $rsp_obj['photo']['tags']['tag'][2]['raw'];
        echo "<p>Subtítulo[2]: $subTituloImagen2"."</p>";    
    }

    $autorImagen = $rsp_obj['photo']['tags']['tag'][0]['authorname'];
    echo "<p>Autor: $autorImagen"."</p>";

    $fechaImagen = $rsp_obj['photo']['dates']['taken'];
    echo "<p>Fecha: $fechaImagen"."</p>";

    $URLimagen = $rsp_obj['photo']['urls']['url'][0]['_content'];
    echo "<p>URL: $URLimagen" ."</p>";

    echo "<p>Enlace: <a href = '$URLimagen'>'$tituloImagen'</a></p>";

    $farm_id = $rsp_obj['photo']['farm'];
    $server_id = $rsp_obj['photo']['server'];
    $photo_id = $rsp_obj['photo']['id'];
    $secret_id = $rsp_obj['photo']['secret'];
    // m = "Medium" width="500" height="333"
    $size = 'm';;

    $photo_url = 'http://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_'.$size.'.'.'jpg';

    print "<img alt='".$tituloImagen."' src=' ".$photo_url." '>" ;


}else{

    echo "<h3>¡Error al llamar al servicio Web!</h3>";
}