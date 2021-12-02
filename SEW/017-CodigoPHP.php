// 017-CodigoPHP.php
// Versión 1.0 14/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 15/12/2017 Muestra el contenido de $formularioPOST
// Versión 1.2 04/12/2018 Se cierran las etiquetas input

// Método POST de HTTP - Los datos enviados van a través de la cabecera HTTP
// Método POST de HTTP - La seguridad depende del protocolo HTTP
// Método POST de HTTP - Si se usa HTTP seguro se puede transmitir la información de forma segura
// Método POST de HTTP - No tiene restricciones en el tamaño de los datos enviados
// Método POST de HTTP - Puede utilizar tanto datos en texto como datos binarios

// $_POST - Es una variable predefinida en PHP
// $_POST - Es superglobal en PHP
// $_POST - Es un array asociativo de variables en PHP, pasadas desde el cliente al servidor a través de una petición HTTP con el método POST
// $_POST - En la petición HTTP se emplea application/x-www-form-urlencoded o multipart/form-data como Content-Type de HTTP

$errorFormulario = false;

$errorNombre     = "";
$errorApellidos  = "";
$errorGenero     = "";
$errorEmail      = "";

$formularioPOST  = "";


//Solo se ejecutará si se han enviado los datos desde el formulario al pulsar el boton Enviar
if (count($_POST)>0) 
    {   
        $formularioPOST  = $_POST;

        // Comprueba que el nombre no está en blanco
        if($_POST["nombre"] == ""){
            $errorNombre = " * El nombre es obligatorio ";
            $errorFormulario = true;
        }

        // Comprueba que los apellidos no están en blanco
        if($_POST["apellidos"] == ""){
             $errorApellidos = " * Los apellidos son obligatorios";
             $errorFormulario = true;
        }

        // Comprueba que se ha elegido el género
        if (empty($_POST["genero"])) {
            $errorGenero = " * El género es obligatorio";
            $errorFormulario = true;
        } 

        // Comprueba que el e-mail es válido
        if(filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL) === false){
            $errorEmail = " * e-mail no válido";
            $errorFormulario = true;
        }
    }

echo "
        <form action='#' method='post' name='formulario'>
            <p>Nombre</p> 
            <p>
                <input type='text' name='nombre'/>
                <span>" . $errorNombre . "</span>
            </p>
            <p>Apellidos</p>
            <p>
                <input type='text' name='apellidos'/>
                <span>" . $errorApellidos . "</span>
            </p>
            <p>Género</p>
            <p>
                <input type='radio' name='genero' value='Hombre'/>Hombre
                <input type='radio' name='genero' value='Mujer'/>Mujer
                <input type='radio' name='genero' value='Otros'/>Otros
                <span>" . $errorGenero . "</span>             
            </p>
            <p>e-mail</p>
            <p>
                <input type='text' name='e-mail'/>
                <span>" . $errorEmail . "</span>
            </p>
            <p>Pais <select name='opcion'>
                <option value='ES'>España</option>
                <option value='CO'>Colombia</option>
                <option value='PE'>Perú</option>
                <option value='MX'>México</option>
                <option value='AR'>Argentina</option>
                </select></p>
            <p>Commentario</p>
            <p>
                <textarea name='commentario' rows='5' cols='40'>
                </textarea>
            </p>
            <p>
                <input type='submit' value='Enviar'/>
            </p>
        </form>
    ";

if ($formularioPOST) {
    echo "<h3>Array asociativo enviado por POST</h3>";
    echo "<pre>";
    print_r($formularioPOST); //Imprime el contenido de $formularioPOST
    echo "</pre>";
    if ($errorFormulario == true){
         echo "<h4>Formulario NO PROCESADO en el servidor</h4>";
    }
}