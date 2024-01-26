<?php
if (!isset($_SESSION['word'])) {
    $_SESSION['word'] = sortedWord();
}

$word = $_SESSION['word'];

function countLetters($word){
    $numberOfLetters = strlen($word);
    return $numberOfLetters;
}

$numberOfLetters = countLetters($word);
?>