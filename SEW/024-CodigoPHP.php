// 024-CodigoPHP.php
// Cookies usando COOKIE
// Versión 1.0 02/12/2018 Juan Manuel Cueva Lovelle. Universidad de Oviedo

// Las cookies (galletas) son archivos de texto que se almacenan en el cliente
// Se almacenan con el propósito de mantener en la máquina cliente información del sitio web visitado
// Hay tres pasos en el manejo de cookies
// 1 - El servidor envía un conjunto de cookies al navegador
// 2 - El navegador almacena las cookies en la máquina cliente, para que puedan ser utilizadas posteriormente
// 3 - La siguiente vez que el navegador envíe una petición al servidor web , envía también las cookies al servidor y el servidor usa esta información para identificar al usuario

// $_COOKIE - Es un array asociativo que contiene las cookies
// $_COOKIE - Es una variable predefinida superglobal en PHP

echo "<p>Establecer cookies</p>";

//setcookie(nombre, valor, expira, path, dominio, securidad);

setcookie("nombre", "Juan Manuel Cueva Lovelle", time()+3600, "/","", 0);
setcookie("edad", "60", time()+3600, "/", "",  0);

// Comprueba si hay cookies activas

if( isset($_COOKIE["nombre"])){
    echo "<p>Bienvenido " . $_COOKIE["nombre"] . "</p>";
}else{
    echo "<p>Lo siento no te conozco</p>";
}

if( isset($_COOKIE["edad"])){
    echo "<p>Su edad es " . $_COOKIE["edad"] . "</p>";
}else{
    echo "<p>Lo siento no conozco su edad</p>";
}

echo "<p>Recargar la página para ver las cookies</p>";

// Eliminar las cookies, usando una fecha de expiración ya pasada

//setcookie( "nombre", "", time()- 60, "/","", 0);
//setcookie( "edad", "", time()- 60, "/","", 0);

//echo "<p>Eliminadas las cookies</p>";
