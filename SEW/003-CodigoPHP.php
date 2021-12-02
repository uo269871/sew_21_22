/*  003-CodigoPHP.php
    Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo
*/
# Para que salga la fecha en español si el servidor soporta setLocale :S
# setlocale (LC_ALL,"es_ES");
# $fecha = strftime("%A %d de %B del %Y");
# echo "<p>Fecha = " . $fecha . "</p>";

# Si no soporta el servidor setlocale :S
# Se definen dos arrays
$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
echo "<p>Fecha = " .$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " de " .date('Y') . " " . date('G:i:s') . "</p>";
# Por defecto en inglés
echo "<p>Date = " . date('l jS \of F Y h:i:s A') . "</p>";