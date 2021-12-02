// 006-CodigoPHP.php
// Versión 1.0 10/12/2017 Juan Manuel Cueva Lovelle. Universidad de Oviedo

$df = diskfreespace("./"); // $df contiene el numero de bytes disponibles en "./"
printf("<p>Espacio libre en bytes  : %.0f  bytes </p>",$df);
printf("<p>Espacio libre en Kbytes : %.0f  Kbytes </p>",$df/1024);
printf("<p>Espacio libre en Mbytes : %.2f  Mbytes </p>",$df/1024/1024);
printf("<p>Espacio libre en Gbytes : %.2f  Gbytes </p>",$df/1024/1024/1024);  