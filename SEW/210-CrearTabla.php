<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recursos PHP - Cristina Pelayo - JM Cueva</title>
    <meta charset="utf-8"/>  
    <meta name="author" content="Cris Pelayo JM Cueva" /> 
    <!-- enlace a la hoja de estilos -->
    <link href="210-MySQL.css" rel="stylesheet" />
</head>   
<body>
    <h1>210-Crear Tabla con MySQLi</h1>  
    <section>
        <h2>Resultado interpretado</h2>
        <p>Se crea la tabla "persona" en la Base de Datos "agenda" </p> 
        <ul>
            <li>Tabla persona (id, dni, nombre, apellidos)</li>
        </ul>
        <?php
            //Versión 1.1 22/Noviembre/2020 Juan Manuel Cueva Lovelle. Universidad de Oviedo
            //datos de la base de datos
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
            $database = "agenda";

            // Conexión al SGBD local con XAMPP con el usuario creado 
            $db = new mysqli($servername,$username,$password);
                         
            //selecciono la base de datos AGENDA para utilizarla
            $db->select_db($database);

            // se puede abrir y seleccionar a la vez
            //$db = new mysqli($servername,$username,$password,$database);

            //Crear la tabla persona DNI, Nombre, Apellido
            $crearTabla = "CREATE TABLE IF NOT EXISTS persona (id INT NOT NULL AUTO_INCREMENT, 
                        dni VARCHAR(9) NOT NULL,
                        nombre VARCHAR(255) NOT NULL, 
                        apellidos VARCHAR(255) NOT NULL,  
                        PRIMARY KEY (id))";
                      
            if($db->query($crearTabla) === TRUE){
                echo "<p>Tabla 'persona' creada con éxito </p>";
             } else { 
                echo "<p>ERROR en la creación de la tabla persona. Error : ". $db->error . "</p>";
                exit();
             }   
        //cerrar la conexión
        $db->close();    
        ?> 
    </section>

</body>
</html>