<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', '/', $className) . '.php';
    $classPath = '../' . $classPath;

    require_once(__DIR__ . '/' . $classPath);
});

use \Classes\Joueur;
use \Classes\Carte;

$launched = false;
session_start(); // Start the session

if (isset($_POST['top']) || isset($_POST['left']) || isset($_POST['right']) || isset($_POST['bottom'])) {
    $launched = true;
}

if ($launched != false) {


    if (!isset($_SESSION['joueur'])) {
        $positionX = rand(0, 9);
        $positionY = rand(0, 9);
        $_SESSION['joueur'] = new Joueur(rand(125, 250), rand(100, 125), $positionX, $positionY);
    }

    $joueur = $_SESSION['joueur'];

    if (!isset($_POST['endgame'])) {
        if (array_key_exists('top', $_POST) && $joueur->posY < 9) {
            $joueur->posY += 1;
        } elseif (array_key_exists('bottom', $_POST) && $joueur->posY > 0) {
            $joueur->posY -= 1;
        } elseif (array_key_exists('left', $_POST) && $joueur->posX > 0) {
            $joueur->posX -= 1;
        } elseif (array_key_exists('right', $_POST) && $joueur->posX < 9) {
            $joueur->posX += 1;
        }

        if ($joueur->posX === 0) {
            $_SESSION['jeu'][] = "<p class='fw-bold text-danger'>Le joueur est à gauche de la carte.</p>";
        } elseif ($joueur->posX === 9) {
            $_SESSION['jeu'][] = "<p class='fw-bold text-danger'>Le joueur est à droite de la carte.</p>";
        }

        if ($joueur->posY === 0) {
            $_SESSION['jeu'][] = "<p class='fw-bold text-danger'>Le joueur est en bas de la carte.</p>";
        } elseif ($joueur->posY === 9) {
            $_SESSION['jeu'][] = "<p class='fw-bold text-danger'>Le joueur est en haut de la carte.</p>";
        }

        $_SESSION['jeu'][] = '<p class="jeu"><span style="color: black; font-weight: bold; text-decoration: underline;">' . date('h:i:s') . '</span> | Coordonées du joueur : X => ' . $joueur->posX . ' Y => ' . $joueur->posY . '</p>';

    }

}

if (isset($_POST['endgame'])) {
    session_destroy();
    $_SESSION['jeu'] = [];
}

$carte = new Carte();

?>