<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recursos PHP - Cristina Pelayo - JM Cueva</title>
    <meta charset="utf-8"/>  
    <meta name="author" content="Cris Pelayo JM Cueva" /> 
    <!-- enlace a la hoja de estilos -->
    <link href="270-MySQL.css" rel="stylesheet" />
</head>   
<body> 
    <h1>270 - Eliminar columna en una tabla con MySQLi</h1>
    <section>
        <h2>Resultado interpretado</h2>     
        <p>Elimina la columna "dni" en la tabla "persona" de la base de datos "agenda"</p>      
    <?php
          // Versión 1.0 23/Noviembre/2020 Juan Manuel Cueva Lovelle. Universidad de Oviedo
          //datos de la base de datos
          $servername = "localhost";
          $username = "DBUSER2021";
          $password = "DBPSWD2021";
          $database = "agenda";

          // Conexión al SGBD local. En XAMPP el usuario debe estar creado previamente 
          $db = new mysqli($servername,$username,$password,$database);

          // compruebo la conexion
          if($db->connect_error) {
              exit ("<p>ERROR de conexión:".$db->connect_error."</p>");  
          } else {echo "<p>Conexión establecida.</p>";}

          //Elimina la columna 'dni' de la tabla 'persona'
          $consulta  = "ALTER TABLE persona DROP dni ;";

          //POR SEGURIDAD: para evitar inyección de código NUNCA ejecutar consultas que provengan directamente de campos de texto del usuario
          //Debe usarse en esos casos $db->prepare()
          if($db->query($consulta))
            echo "<p>Eliminada la columna 'dni' de la tabla 'persona'</p>";
          else
            echo "<p>No se ha podido eliminar la columna 'dni'. Error: " . $db->error . "</p>";
        //cerrar la conexión
        $db->close();    
        ?> 
    </section>
</body>
</html>