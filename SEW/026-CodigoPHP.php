// 026-CodigoPHP.php
// Clase Botones
// Versión 1.0 04/12/2018 Juan Manuel Cueva Lovelle. Universidad de Oviedo

/**
 * Definición de la clase Botones
 */

class Botones {
    protected $mensaje;

    public function __construct(){
        $this->mensaje = "";
    }
    
    public function getMensaje(){
         //devuelve el mensaje
         return $this->mensaje;   
    }

    public function funcionBoton1(){
         //
         $this->mensaje = "Se ha pulsado el botón UNO";  
    }
    
    public function funcionBoton2(){
         //
         $this->mensaje = "Se ha pulsado el botón DOS";  
    }

    public function funcionBoton3(){
         //
         $this->mensaje = "Se ha pulsado el botón TRES";  
    }
}

$aviso = "";

//Solo se ejecutará si se ha pulsado un botón
if (count($_POST)>0) 
    {   
        $misBotones = new Botones();
        if(isset($_POST['boton1'])) $misBotones->funcionBoton1();
        if(isset($_POST['boton2'])) $misBotones->funcionBoton2();
        if(isset($_POST['boton3'])) $misBotones->funcionBoton3();
        $aviso = $misBotones->getMensaje();
    }

// Interfaz con el usuario. En el interior de comillas dobles se deben usar comillas simples
echo "  
        <h3>Pulse un botón</h3>
        <form action='#' method='post' name='botones'>
            <input type = 'submit' class='button' name = 'boton1' value = 'Botón 1'/>
            <input type = 'submit' class='button' name = 'boton2' value = 'Botón 2'/>
            <input type = 'submit' class='button' name = 'boton3' value = 'Botón 3'/> 
        </form>
    ";

echo "<h3>Variable</h3>";
echo "<p>aviso = " . $aviso . " { var_dump() = "; var_dump($aviso); echo" }</p>";

