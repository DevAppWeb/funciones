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
            <h1>Entrada Datos</h1>
            <div class="capaform">
                <form class="form-font" name="Formregistro" 
                      action="funciones_static.php" method="POST">
                    <div class="form-section">
                        <label for="input"> Cadena: </Label> 
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

    function checkAciertos($word, $str) {
        static $aciertos = 0;
        if (strpos($word, $str) !== false) {
            $aciertos++;
        };
        return ($aciertos);
    }

    define('STRING', "ero");

    $input = filter_input(INPUT_POST, 'input', FILTER_SANITIZE_STRING);
    $words = str_word_count($input, 1);
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
                echo "<h1>Con la palabra $word se acumulan " . checkAciertos($word, STRING) . " aciertos </h1>";
            }
            ?>
        </body>
    </html>
    <?php
}