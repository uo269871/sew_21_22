<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Versión PHP</title>
    <link rel="stylesheet" href="000-Version.css">
</head>
<body>
	<h1>Primer ejemplo de PHP</h1>
    <section>
        <h2>Código fuente PHP</h2>
        <?php
        $archivo = "000-CodigoPHP.php";
        $codigoFuente = implode('', file($archivo));
        echo '<pre><code>', htmlentities($codigoFuente), '</code></pre>';
        ?>
    </section>
    <section>
        <h2>Ejecución del código PHP</h2>
        <?php
            eval($codigoFuente);
        ?>
    </section>
</body>
</html>