<?php
if (empty($_POST)) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" href="stylesheet.css">
            <title>Form Entrada Datos</title>
        </head>
        <body>
            <h1> Formulario de Registro de Cliente </h1>
            <div class="capaform">

                <form class="form-font" name="Formregistro" 
                      action="funciones.php" method="POST">
                    <div class="form-section">
                        <label for="input"> Nombre: </Label> 
                        <input id="nombre" type="text" name="input" size="30" /> 
                    </div>
                    <input class="submit" type="submit" 
                           value="Enviar" name="botonenvio" /> 
                </form>
            </div>
        </body>
    </html>
    <?php
} else {

    function checkEnding($word, $ending) {
        $pos = strpos($word, $ending);
        return (($pos !== false) && ($pos === strlen($word) - strlen($ending)));
    }

    $input = filter_input(INPUT_POST, 'input', FILTER_SANITIZE_STRING);
    $words = str_word_count($input, 1);
    
    define('ENDING', "ero");
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset = "UTF-8">
            <title>Info de palabra</title>
        </head>
        <body>
            <?php
            foreach ($words as $word) {
                if (checkEnding($word, ENDING)) {
                    echo "<h1>La palabra $word contiene " . ENDING . " al final</h1>";
                } else {
                    echo "<h1>La palabra $word no contiene " . ENDING . " al final</h1>";
                }
            }
            ?>
        </body>
    </html>
    <?php
}

