<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <title>Factorial</title>
	<link rel="stylesheet" href="009-FuncionFactorial.css">
</head>
<body>
	<h1>Funciones recursivas: factorial</h1>
    <section>
        <h2>Código fuente PHP</h2>
        <?php
        $archivo = "009-CodigoPHP.php";
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
    <footer>
        <a href="http://validator.w3.org/check/referer" hreflang="en-us">
            <img src="valid-html5-button.png" alt="¡HTML5 válido!" />
        </a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" />
        </a>
    </footer>
</body>
</html>