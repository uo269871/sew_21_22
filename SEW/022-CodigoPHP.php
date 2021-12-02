// 022-CodigoPHP.php
// Calculadora elemental usando POST, eval() y try-catch
// Versión 1.0 29/11/2018 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 04/12/2018 Se cierran las etiquetas input

// Método POST de HTTP - Los datos enviados van a través de la cabecera HTTP
// Método POST de HTTP - La seguridad depende del protocolo HTTP
// Método POST de HTTP - Si se usa HTTP seguro se puede transmitir la información de forma segura
// Método POST de HTTP - No tiene restricciones en el tamaño de los datos enviados
// Método POST de HTTP - Puede utilizar tanto datos en texto como datos binarios

// $_POST - Es una variable predefinida en PHP
// $_POST - Es superglobal en PHP
// $_POST - Es un array asociativo de variables en PHP, pasadas desde el cliente al servidor a través de una petición HTTP con el método POST
// $_POST - En la petición HTTP se emplea application/x-www-form-urlencoded o multipart/form-data como Content-Type de HTTP

// Precaución:
// El uso de eval() es muy peligroso porque permite la ejecución de código PHP arbitrario.
// Su uso indiscriminado está totalmente desaconsejado.

$expresion       = "";
$resultado       = "";

$formularioPOST  = "";

//Solo se ejecutará si se han enviado los datos desde el formulario al pulsar el boton Calcular
if (count($_POST)>0) 
    {   
        $formularioPOST  = $_POST;

        $expresion = $_POST["expresion"];
        try {
            $resultado = eval("return $expresion ;"); 
        }
        catch (Exception $e) {
            $resultado = "Error: " .$e->getMessage();
        }      
    }

// Interfaz con el usuario. En el interior de comillas dobles se deen usar comillas simples
echo "
        <form action='#' method='post' name='calculadora'>
                <input type='text' name='expresion' value='$resultado'/>
                <input type='submit'  value='Calcular'/>
        </form>
    ";

// Información sobre el POST enviado
if ($formularioPOST) {
    echo "<h3>Array asociativo enviado por POST</h3>";
    echo "<pre>";
    print_r($formularioPOST); //Imprime el contenido de $formularioPOST
    echo "</pre>";
}