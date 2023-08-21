<?php

include_once 'game.php';

$win = False;

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', '/', $className) . '.php';
    $classPath = '../' . $classPath;

    require_once(__DIR__ . '/' . $classPath);
});


use Classes\Joueur;
use Classes\Monstre;
use Classes\Coffre;
use Classes\Carte;

function game()
{
    $joueur = new Joueur;
    $joueur->setPv(rand(125, 250));
    $joueur->setAtq(rand(100, 125));
    $joueur->setPosX(rand(0, 9));
    $joueur->setPosY(rand(0, 9));

    $nombreMonstre = rand(3, 8);
    $monstres = [];
    $i = 0;
    while ($i <= $nombreMonstre) {
        $monstre = new Monstre;
        $monstre->setPv(rand(50, 150));
        $monstre->setAtq(rand(75, 125));
        $monstre->setPosX(rand(0, 9));
        $monstre->setPosY(rand(0, 9));
        array_push($monstres, $monstre);
        $i++;
    }

    $coffre = new Coffre;
    $coffre->setPosX(rand(0, 9));
    $coffre->setPosY(rand(0, 9));

    $carte = new Carte();

    if ($win) {
        echo'Win';
    } else {
        echo'loose';
    }
    
}

game();