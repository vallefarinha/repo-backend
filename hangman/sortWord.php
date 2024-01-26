<?php

function sortedWord(){
    $word = fetchData();
    if ($word === null){
        echo 'JSON error';
    } else {
        $_SESSION['word'] = $word[array_rand($word)];
    }

    return $_SESSION['word'];
}
?>