<!DOCTYPE html>
<html lang="es">
<head>
    <title>Recursos PHP - Cristina Pelayo< - JM Cueva</title>
    <meta charset="utf-8"/>
    <meta name="author" content="Cris Pelayo JM Cueva" /> 
    <!-- enlace a la hoja de estilos -->
    <link href="200-MySQL.css" rel="stylesheet" />
</head>   
<body>
    <h1>200-Creación de la Base de Datos con MySQLi</h1>  
    <section>
        <h2>Resultado interpretado</h2>
        <p>Se crea la base de datos "agenda" utilizando ordenación en español</p> 
        <p>PRECONDICIÓN: debe existir el usuario en la base de datos MySQL creado en XAMPP</p>       
        <?php
			//Versión 1.1 22/Noviembre/2020 Juan Manuel Cueva Lovelle. Universidad de Oviedo
			// Es necesario crear el usuario en la base de datos MySQL en XAMPP: MySQL [Admin]
            //datos de la base de datos
            $servername = "localhost";
            $username = "DBUSER2021";
            $password = "DBPSWD2021";
          
            // Conexión al SGBD local con XAMPP con el usuario creado 
            $db = new mysqli($servername,$username,$password);
             
            //comprobamos conexión
            if($db->connect_error) {
                exit ("<p>ERROR de conexión:".$db->connect_error."</p>");  
            } else {echo "<p>Conexión establecida con " . $db->host_info . "</p>";}
           
            // Se crea la base de datos de trabajo "agenda" utilizando ordenación en español
            $cadenaSQL = "CREATE DATABASE IF NOT EXISTS agenda COLLATE utf8_spanish_ci";
            if($db->query($cadenaSQL) === TRUE){
                echo "<p>Base de datos 'agenda' creada con éxito</p>";
            } else { 
                echo "<p>ERROR en la creación de la Base de Datos 'agenda'. Error: " . $db->error . "</p>";
                exit();
            }   
        //cerrar la conexión
        $db->close();    
        ?> 
    </section>
</body>
</html>