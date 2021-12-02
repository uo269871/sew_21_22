// 019-CodigoPHP.php
// Versión 1.0 30/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 04/12/2018 Se cierran las etiquetas input

// Método POST de HTTP - Los datos enviados van a través de la cabecera HTTP
// Método POST de HTTP - La seguridad depende del protocolo HTTP
// Método POST de HTTP - Si se usa HTTP seguro se puede transmitir la información de forma segura
// Método POST de HTTP - No tiene restricciones en el tamaño de los datos enviados
// Método POST de HTTP - Puede utilizar tanto datos en texto como datos binarios

// form enctype='multipart/form-data' - Los caracteres no están codificados. Es obligatorio para cargar archivos

// $_FILES - Es una variable predefinida en PHP
// $_FILES - Es superglobal en PHP
// $_FILES - Es un array asociativo de variables en dos dimensiones que almacena toda la información relativa al archivo cargado
// $_FILES['archivoCliente']['tmp_name'] - El archivo cargado en un directorio temporal en el servidor Web
// $_FILES['archivoCliente']['name'] - El nombre actual del archivo cargado
// $_FILES['archivoCliente']['size'] - El tamaño en bytes del archivo cargado
// $_FILES['archivoCliente']['type'] - El tipo MIME del archivo cargado
// $_FILES['archivoCliente']['error'] - El código de error asociado con el archivo cargado

// UPLOAD_ERR_OK - Valor: 0 - No hay error, archivo cargado con éxito
// UPLOAD_ERR_OK - Valor: 1 - El archivo cargado excede del tamaño máximo permitido. Se define en upload_max_filesize en php.ini

echo "
        <form action='#' method='post' enctype='multipart/form-data'>
            <p>Archivo a cargar desde la máquina cliente</p> 
            <p>
                <input type='file' name='archivo'/>
            </p>
            <p>
                <input type='submit' value='Enviar'/>
            </p>
        </form>
    ";

if ($_FILES) {
    echo "<h3>Información del archivo subido desde la máquina cliente</h3>";
    echo "<ul><li>Nombre: " . $_FILES['archivo']['name'] . "</li>";
    echo "<li>Tamaño: " . $_FILES['archivo']['size'] . " bytes</li>";
    echo "<li>Tipo: " . $_FILES['archivo']['type'] . "</li></ul>";

    echo "<h4>Contenido del array asociativo _FILES</h4>";
    echo "<pre>";
    print_r($_FILES); //Imprime el contenido del array asociativo
    echo "</pre>"; 

    // Solamente se muestran los archivos de texto

    $tipo = substr($_FILES['archivo']['type'], 0, 4);
    if( strcmp($tipo, 'text') == 0) {
        echo "<h4>Contenido del archivo de texto</h4>";
        $fp = fopen($_FILES['archivo']['tmp_name'], 'rb');
        while ( ($linea = fgets($fp)) !== false) {
            echo "<p>" . $linea . "</p>";
        }
    }
}