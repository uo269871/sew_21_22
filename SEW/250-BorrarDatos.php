<?php
            //Versión 1.1 22/Noviembre/2020 Juan Manuel Cueva Lovelle. Universidad de Oviedo
            //datos de la base de datos
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
            $database = "agenda";
 
            // Conexión al SGBD local con el usuario creado previamente en XAMPP
            $db = new mysqli($servername,$username,$password,$database);
 
            // compruebo la conexion
            if($db->connect_error) {
                    exit ("<h2>ERROR de conexión:".$db->connect_error."</h2>");  
            } else {echo "<h2>Conexión establecida</h2>";}
 
            //prepara la consulta
            $consultaPre = $db->prepare("SELECT * FROM persona WHERE nombre = ?");   
        
            //obtiene los parámetros de la variable predefinida $_POST
            // s indica que dni es un string
            $consultaPre->bind_param('s', $_POST["nombre"]);    

            //ejecuta la consulta
            $consultaPre->execute();

            //guarda los resultados como un objeto de la clase mysqli_result
            $resultado = $consultaPre->get_result();

            //Visualización de los resultados de la búsqueda
             if ($resultado->fetch_assoc()!=NULL) {
                echo "<p>Las filas de la tabla 'persona' que van a ser eliminadas son:</p>";
                $resultado->data_seek(0); //Se posiciona al inicio del resultado de búsqueda
                while($fila = $resultado->fetch_assoc()) {
                    echo "<p>" . "id = " . $fila["id"] . " / dni = " . $fila["dni"] . " / nombre = ".$fila['nombre']." / apellidos = ". $fila['apellidos'] . "</p>"; 
                } 
            echo "</ul>";

            //Realiza el borrado
            //prepara la sentencia SQL de borrado
            $consultaPre = $db->prepare("DELETE FROM persona WHERE nombre = ?");   
            //obtiene los parámetros de la variable almacenada
            $consultaPre->bind_param('s', $_POST["nombre"]);    
            //ejecuta la consulta
            $consultaPre->execute();
            // cierra la consulta
            $consultaPre->close();
            echo "<p>Borrados los datos</p>";               
            } 
            else {
                echo "<p>Búsqueda sin resultados. No se ha borrado nada</p>";
            }

            //consultar la tabla persona
            $resultado =  $db->query('SELECT * FROM persona');
            
            // compruebo los datos recibidos     
            if ($resultado->num_rows > 0) {
                // Mostrar los datos en un lista
                echo "<p>Los datos en la tabla 'persona' son: </p>";
                echo "<p>". 'id' . " - " . 'dni' ." - ". 'nombre' ." - ". 'apellidos' ."</p>";
                while($row = $resultado->fetch_assoc()) {
                    echo "<p>". $row['id'] . " - " . $row['dni']." - ". $row['nombre']." - ". $row['apellidos'] ."</p>"; 
                }
            } else {
                echo "<p>Tabla vacía</p>";
                }          
            //cerrar la conexión
            $db->close();           
?>
