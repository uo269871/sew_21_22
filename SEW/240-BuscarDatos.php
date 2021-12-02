<?php
           // Versión 1.1 22/Noviembre/2020 Juan Manuel Cueva Lovelle. Universidad de Oviedo
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
 
            // prepara la consulta
            $consultaPre = $db->prepare("SELECT * FROM persona WHERE nombre = ?");   
        
            // obtiene los parámetros de la variable predefinida $_POST
            // s indica que se le pasa un string
            $consultaPre->bind_param('s', $_POST["nombre"]);    

            //ejecuta la consulta
            $consultaPre->execute();

            //Obtiene los resultados como un objeto de la clase mysqli_result
            $resultado = $consultaPre->get_result();

            //Visualización de los resultados de la búsqueda
            if ($resultado->fetch_assoc()!=NULL) {
                echo "<p>Las filas de la tabla 'persona' que coinciden con la búsqueda son:</p>";
                $resultado->data_seek(0); //Se posiciona al inicio del resultado de búsqueda
                while($fila = $resultado->fetch_assoc()) {
                    echo "id = " . $fila["id"] . " dni = " . $fila["dni"] . " nombre = ".$fila['nombre']." apellidos = ". $fila['apellidos'] ."</p>"; 
                }               
            } else {
                echo "<p>Búsqueda sin resultados</p>";
            }
           
            // cierre de la consulta y la base de datos
            $consultaPre->close();
            $db->close();           
?>
