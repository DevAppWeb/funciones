<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function checkEro($word, &$pos, &$a) {
            static $aciertos = 0;
            $pos = strpos($word, 'ero');
            return ($pos && ($pos === strlen($word) - 3) && $a = ++$aciertos);
        }

        $inputArrayWords = ["panadero", "escritor", "pescadero", "camionero", "piloto"];
        
        foreach ($inputArrayWords as $inputWord) {
            if (checkEro($inputWord, $posicion, $numAciertos)) {
                echo "<h1>La palabra $inputWord contiene 'ero' en la posicion $posicion. Num aciertos $numAciertos </h1>";
            } else {
                echo "<h1>La palabra $inputWord no contiene 'ero' al final</h1>";
            }
        }
        ?>
    </body>
</html>
