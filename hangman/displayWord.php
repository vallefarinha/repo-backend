<?php
function displayWord($word, $clickedLetters) {
    $displayArray = array();

    if (isset($clickedLetters) && is_array($clickedLetters)) {
        $clickedLetters = array_map('strtoupper', $clickedLetters);

        for ($i = 0; $i < strlen($word); $i++) {
            $letter = strtoupper($word[$i]);

            if (in_array($letter, $clickedLetters)) {
                $displayArray[] = $letter;
            } else {
                $displayArray[] = '_';
            }
        }
    } else {
        $displayArray = array_fill(0, strlen($word), '_');
    }

    foreach ($displayArray as $char) {
        $class = ($char === '_') ? 'char-inactive' : 'char-active';
        echo "<div class='char-container'><p class='$class'>$char</p></div>";
    }
}
?>