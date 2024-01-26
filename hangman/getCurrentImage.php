<?php
function getCurrentImage() {
    $images = [
        './assets/img/hangman_nohead.png',
        './assets/img/hangman_head.png',
        './assets/img/hangman_throat.png',
        './assets/img/hangman_body.png',
        './assets/img/hangman_hand.png',
        './assets/img/hangman_hands.png',
        './assets/img/hangman_leg.png',
        './assets/img/hangman_legs.png'
    ];

    $currentIndex = $_SESSION['currentImageIndex'];

    if ($currentIndex >= count($images)) {
        return ''; 
    }

    if ($currentIndex == 0 && !isset($_SESSION['clickedLetters'])) {
        return './assets/img/hangman_nohead.png';
    }

    return $images[$currentIndex];
}
?>