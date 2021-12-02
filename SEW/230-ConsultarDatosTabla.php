<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recursos PHP - Cristina Pelayo - JM Cueva</title>
    <meta charset="utf-8"/>  
    <meta name="author" content="Cris Pelayo JM Cueva" /> 
    <!-- enlace a la hoja de estilos -->
    <link href="230-MySQL.css" rel="stylesheet" />
</head>   
<body> 
    <h1>230 - Consultar datos de una tabla con MySQLi</h1>
    <section>
        <h2>Resultado interpretado</h2>     
        <p>Consulta de los valores de la tabla "persona" de la base de datos "agenda"</p>      
    <?php
          // Versión 1.1 22/Noviembre/2020 Juan Manuel Cueva Lovelle. Universidad de Oviedo
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
          } else {echo "<p>Conexión establecida con " . $db->host_info . "</p>";}

          //consultar la tabla persona
          $resultado =  $db->query('SELECT * FROM persona');
            
          // compruebo los datos recibidos     
          if ($resultado->num_rows > 0) {
                // Mostrar los datos en un lista
                echo "<p>Los datos en la tabla 'persona' son: </p>";
                echo "<p>Número de filas = " . $resultado->num_rows . "</p>";
                echo "<ul>";
                echo "<li>". 'id' . " - " . 'dni' ." - ". 'nombre' ." - ". 'apellidos' ."</li>";
                while($row = $resultado->fetch_assoc()) {
                    echo "<li>". $row['id'] . " - " . $row['dni']." - ". $row['nombre']." - ". $row['apellidos'] ."</li>"; 
                }
                echo "</ul>";
            } else {
                echo "<p>Tabla vacía. Número de filas = " . $resultado->num_rows . "</p>";
            }          
        //cerrar la conexión
        $db->close();    
        ?> 
    </section>
</body>
</html>