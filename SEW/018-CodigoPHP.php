// 018-CodigoPHP.php
// Versión 1.0 26/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
// Versión 1.1 04/12/2018 Se cierran las etiquetas input

// Método GET de HTTP - Envía información del cliente al servidor Web usando una codificación de la URL
// Método GET de HTTP - La codificación URL son pares nombre/valor con un signo igual, separados por ampersand 
//                      nombre1=valor1&nombre2=valor2&nombre3=valor3
// Método GET de HTTP - Produce un string largo que aparece en los logs del servidor Web
// Método GET de HTTP - Está limitado a 1024 caracteres
// Método GET de HTTP - Nunca debe usarse para enviar password  u otra información sensible al servidor
// Método GET de HTTP - No puede ser utilizado para enviar datos binarios o imágenes

// $_GET - Es una variable predefinida en PHP
// $_GET - Es superglobal en PHP
// $_GET - Es un array asociativo de variables en PHP, pasado al script actual vía parámetros URL

$errorFormulario = false;

$errorNombre     = "";
$errorApellidos  = "";
$errorGenero     = "";
$errorEmail      = "";

$formularioGET  = "";


//Solo se ejecutará si se han enviado los datos desde el formulario al pulsar el boton Enviar
if (count($_GET)>0) 
    {   
        $formularioGET  = $_GET;

        // Comprueba que el nombre no está en blanco
        if($_GET["nombre"] == ""){
            $errorNombre = " * El nombre es obligatorio ";
            $errorFormulario = true;
        }

        // Comprueba que los apellidos no están en blanco
        if($_GET["apellidos"] == ""){
             $errorApellidos = " * Los apellidos son obligatorios";
             $errorFormulario = true;
        }

        // Comprueba que se ha elegido el género
        if (empty($_GET["genero"])) {
            $errorGenero = " * El género es obligatorio";
            $errorFormulario = true;
        } 

        // Comprueba que el e-mail es válido
        if(filter_var($_GET["e-mail"], FILTER_VALIDATE_EMAIL) === false){
            $errorEmail = " * e-mail no válido";
            $errorFormulario = true;
        }
    }

echo "
        <form action='#' method='get' name='formulario'>
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
            <p>Pais 
                <select name='opcion'>
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

if ($formularioGET) {
    echo "<h3>Array asociativo enviado por GET</h3>";
    echo "<pre>";
    print_r($formularioGET); //Imprime el contenido de $formularioGET
    echo "</pre>";
    if ($errorFormulario == true){
         echo "<h4>Formulario NO PROCESADO en el servidor</h4>";
    }
}