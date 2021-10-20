<?php define('ENDING', "ero");

function findEnding($word, $str, &$pos) {
        $pos = strpos($word, $str);
        return ($pos !== false);
    }
    

if (!empty($_POST)) {
    $input = filter_input(INPUT_POST, 'input', FILTER_SANITIZE_STRING);
    $words = str_word_count($input, 1);
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
                  action="funciones_ref.php" method="POST">
                <div class="form-section">
                    <label for="input"> Cadena: </label> 
                    <input id="nombre" type="text" name="input" size="30" /> 
                </div>
                <input class="submit" type="submit" 
                       value="Enviar" name="botonenvio" /> 
            </form>
        </div>
        <?php if (isset($words)): ?>
            <div>
                <?php foreach ($words as $word): ?>
                    <h1><?= (findEnding($word, ENDING, $pos)) ? "La palabra \"$word\" contiene " . ENDING . " en la posición " . $pos+1 : "La palabra $word no contiene " . ENDING . " al final" ?></h1>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </body>
</html>

