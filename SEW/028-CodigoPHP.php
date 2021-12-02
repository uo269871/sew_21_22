// 028-CodigoPHP.php
// Registro de acontecimientos. Ejemplo de uso de SESSION
// Versión 1.0 05/12/2018 Juan Manuel Cueva Lovelle. Universidad de Oviedo

// Iniciar SESSION

session_start();

/**
 * Definición de la clase Botonera
 */

class Botonera {
    protected $mensaje;

    public function __construct(){
        $this->mensaje = "";
    }
    
    public function getMensaje(){
         //devuelve el mensaje
         return $this->mensaje;   
    }

    public function pulsarBoton($boton){
        // Construye el mensaje con el botón pulsado, la fecha y la hora
        $this->mensaje = "<p>Registro: " .date("Y/m/d h:i:s A") . " Acontecimiento: Se ha pulsado " . $boton . "</p>";  
    }
}

$registro = "";

//Solo se ejecutará si se ha pulsado un botón
if (count($_POST)>0) 
    {   
        $miBotonera = new Botonera();

        if(isset($_POST['boton1'])) $miBotonera->pulsarBoton("Botón 1");
        if(isset($_POST['boton2'])) $miBotonera->pulsarBoton("Botón 2");
        if(isset($_POST['boton3'])) $miBotonera->pulsarBoton("Botón 3");
        if(isset($_POST['boton4'])) $miBotonera->pulsarBoton("Botón 4");
        if(isset($_POST['boton5'])) $miBotonera->pulsarBoton("Botón 5");
        if(isset($_POST['boton6'])) $miBotonera->pulsarBoton("Botón 6");
        if(isset($_POST['boton7'])) $miBotonera->pulsarBoton("Botón 7");
        if(isset($_POST['boton8'])) $miBotonera->pulsarBoton("Botón 8");
        if(isset($_POST['boton9'])) $miBotonera->pulsarBoton("Botón 9");
        
        $aviso = $miBotonera->getMensaje();
        
        if( isset( $_SESSION['acontecimientos'] ) ) {
            $_SESSION['acontecimientos'] .= $aviso;
        }else {
            $_SESSION['acontecimientos'] = $aviso;
        }

        $registro =  $_SESSION['acontecimientos'];
    }

// Interfaz con el usuario. En el interior de comillas dobles se deben usar comillas simples
echo "  
        <h3>Pulse un botón</h3>
        <form action='#' method='post' name='botones'>
            <div>
                <input type = 'submit' class='button' name = 'boton1' value = 'Botón 1'/>
                <input type = 'submit' class='button' name = 'boton2' value = 'Botón 2'/>
                <input type = 'submit' class='button' name = 'boton3' value = 'Botón 3'/>
            </div>
            <div>
                <input type = 'submit' class='button' name = 'boton4' value = 'Botón 4'/>
                <input type = 'submit' class='button' name = 'boton5' value = 'Botón 5'/>
                <input type = 'submit' class='button' name = 'boton6' value = 'Botón 6'/>
            </div>
            <div> 
                <input type = 'submit' class='button' name = 'boton7' value = 'Botón 7'/>
                <input type = 'submit' class='button' name = 'boton8' value = 'Botón 8'/>
                <input type = 'submit' class='button' name = 'boton9' value = 'Botón 9'/>
            </div>                   
        </form>
    ";

echo "<h3>Registro de acontecimientos</h3>";
echo $registro;


