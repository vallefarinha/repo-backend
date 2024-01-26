<?php
session_start();

include 'fetchApi.php';
include 'sortWord.php';
include 'countLetters.php';
include 'displayWord.php';
include 'verifyLetter.php';
include 'getCurrentImage.php';
include 'gameover.php';

if (!isset($_SESSION['word']) || isset($_GET['restart'])) {
    $_SESSION['word'] = sortedWord();
    $_SESSION['displayWord'] = str_repeat('_', strlen($_SESSION['word']));
    $_SESSION['clickedLetters'] = [];
    $_SESSION['attempts'] = 0;
    $_SESSION['currentImageIndex'] = 0; 
    $word = $_SESSION['word'];
} else {
    $word = $_SESSION['word'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (verifyLetter()) {
        if ($_SESSION['attempts'] >= count($_SESSION['MAX_ATTEMPTS'])) {
            echo '<div class="debug">Reached maximum attempts</div>';
            $_SESSION['game_over'] = true;
            header("Location: game.php");
            exit;
        }
    }
}