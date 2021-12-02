<?php
            //Versión 1.1 22/Noviembre/2020 Juan Manuel Cueva Lovelle. Universidad de Oviedo
            //datos de la base de datos
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
            $database = "agenda";

            // Conexión al SGBD local con XAMPP con el usuario creado 
            $db = new mysqli($servername,$username,$password,$database);

            // comprueba la conexion
            if($db->connect_error) {
                exit ("<h2>ERROR de conexión:".$db->connect_error."</h2>");  
            } else {echo "<h2>Conexión establecida</h2>";}
  
            //prepara la sentencia de inserción
            $consultaPre = $db->prepare("INSERT INTO persona (dni, nombre, apellidos) VALUES (?,?,?)");   
        
            //añade los parámetros de la variable Predefinida $_POST
            // sss indica que se añaden 3 string
            $consultaPre->bind_param('sss', 
                    $_POST["dni"],$_POST["nombre"], $_POST["apellidos"]);    

            //ejecuta la sentencia
            $consultaPre->execute();

            //muestra los resultados
            echo "<p>Filas agregadas: " . $consultaPre->affected_rows . "</p>";

            $consultaPre->close();

             //cierra la base de datos
            $db->close();           
?>
