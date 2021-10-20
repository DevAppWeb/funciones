<?php
define('ENDING', "ero");

$gameOver = 5;

function checkEnding($word, $ending) {
    $pos = strpos($word, $ending);
    return (($pos !== false) && ($pos === strlen($word) - strlen($ending)));
}

function countMatch($word, $ending) {
    static $matches = 0;
    if (checkEnding($word, $ending)) {
        $matches++;
    }
    return ($matches);
}

function isGameOver ($matches) {
    global $gameOver;
    return ($matches >= $gameOver);
}

if (!empty($_POST)) {
    $input = filter_input(INPUT_POST, 'input', FILTER_SANITIZE_STRING);
    $words = str_word_count($input, 1);
    foreach ($words as $word) {
        $matches = countMatch($word, ENDING);
    }
}
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
                  action="funciones_global.php" method="POST">
                <div class="form-section">
                    <label for="input"> Cadena: </label> 
                    <input id="nombre" type="text" name="input" size="30" /> 
                </div>
                <input class="submit" type="submit" 
                       value="Enviar" name="botonenvio" /> 
            </form>
        </div>
        <?php if (isset ($matches)): ?>
            <h1><?= (!isGameOver($matches)) ? "Found " . $matches . " matches " : "Already got " . $gameOver . " matches " ?></h1>
        <?php endif ?>

    </body>
</html>