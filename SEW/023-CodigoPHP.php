// 023-CodigoPHP.php
// Contador usando SESSION
// Versión 1.0 01/12/2018 Juan Manuel Cueva Lovelle. Universidad de Oviedo

// $_SESSION - Almacena en el servidor un array asociativo con la información compartida de varias páginas de un sitio Web
// $_SESSION - Es una variable predefinida superglobal en PHP

session_start();
   
if( isset( $_SESSION['contador'] ) ) {
    $_SESSION['contador'] += 1;
}else {
    $_SESSION['contador'] = 1;
}
	
$mensaje = "Ha visitado esta página ".  $_SESSION['contador'] . " veces" ;

echo "<p>$mensaje</p>"; 

echo "<p>Recargar la página para incrementar el contador</p>"; 
