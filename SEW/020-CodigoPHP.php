// 020-CodigoPHP.php
// Versión 1.0 31/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
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

// max_file_uploads - define el límite máximo del número de archivos que se pueden cargar en una petición
// max_file_uploads - por defecto es 20
// max_file_uploads - su valor se puede consultar con phpinfo()

echo "
        <form action='#' method='post' enctype='multipart/form-data'>
            <p>Selección múltiple de archivos a cargar desde la máquina cliente</p> 
            <p>
                <input type='file' multiple='multiple' name='archivo[]'/>
            </p>
            <p>
                <input type='submit' value='Enviar'/>
            </p>
        </form>
    ";

if ($_FILES) {
    echo "<h3>Información de los archivos cargados desde la máquina cliente</h3>";

    $numeroArchivos =  count($_FILES['archivo']['name']);

    echo "<h4>Número de archivos cargados desde la máquina cliente: " . $numeroArchivos . "</h4>";

    for($i=0;$i<$numeroArchivos;$i++){
        echo "<ul><li>Nombre [" . $i . "] : " . $_FILES['archivo']['name'][$i] . "</li>";
        echo "<li>Tamaño [" . $i . "] : " . $_FILES['archivo']['size'][$i] . " bytes</li>";
        echo "<li>Tipo [" . $i . "] : " . $_FILES['archivo']['type'][$i] . "</li></ul>";
    }
                         
    echo "<h4>Contenido del array asociativo _FILES</h4>";
    echo "<pre>";
    print_r($_FILES); //Imprime el contenido del array asociativo
    echo "</pre>"; 

    // Solamente se muestran los archivos de texto
    for($i=0;$i<$numeroArchivos;$i++){
        $tipo = substr($_FILES['archivo']['type'][$i], 0, 4);
        if( strcmp($tipo, 'text') == 0) {
            echo "<h4>Contenido del archivo [" . $i . "] : " . $_FILES['archivo']['name'][$i] . "</h4>";
            $fp = fopen($_FILES['archivo']['tmp_name'][$i], 'rb');
            while ( ($linea = fgets($fp)) !== false) {
                echo "<p>" . $linea . "</p>";
            }
        }
    }
}