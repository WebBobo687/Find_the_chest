<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', '/', $className) . '.php';
    require_once($classPath);
});

use Classes\Joueur;
use Classes\Monstre;
use Classes\Coffre;

public function start_game()
{
    $joueur = new Joueur;
    $joueur->setPv(rand(125,250));
    $joueur->setAtq(rand(100,125));
    $joueur->setPosX($carteX(rand(0,9)));
    $joueur->setPosY($carteY(rand(0,9)));

    $nombre_monstre = rand(10, 50);
    $i = 0;
    while ($i <= $nombre_monstre)
    {
        $monstre = new Monstre;
        $monstre->setPv(rand(50,150));
        $monstre->setAtq(rand(75,125));
        $monstre->setPosX($carteX(rand(0,9)));
        $monstre->setPosY($carteY(rand(0,9)));
    }

    $coffre = new Coffre;
    $coffre->setPosX($carteX(rand(0,9)));
    $coffre->setPosY($carteY(rand(0,9)));

}
