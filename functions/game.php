<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', '/', $className) . '.php';
    $classPath = '../' . $classPath;
    
    require_once(__DIR__ . '/' . $classPath);
});


use Classes\Joueur;
use Classes\Monstre;
use Classes\Coffre;
use Classes\Carte;

game();

function game()
{
    $win = false;
    $nombreMonstre = rand(3, 8);

    # Création du joueur
    $joueur = (new Joueur(rand(125, 250), rand(100, 125), 0, 0));
    echo "<pre>";
    print_r($joueur);
    echo "</pre>";
    
    # Création du monstre
    $monstre = (new Monstre(rand(125, 250), rand(100, 125), 0, 0));
    echo "<pre>";
    print_r($monstre);
    echo "</pre>";

    $coffre = new Coffre;
    $coffre->setPosX(rand(0, 9));
    $coffre->setPosY(rand(0, 9));

    $carte = new Carte();

    if ($joueur->posX == $monstre->posX && $joueur->posY == $monstre->posY){
        //Combat
        combat($joueur, $monstre);
    }
}

/*
* Fonction de combat
*
* @var class $joueur
* @var class $monstre
*
* Tant que les pvJoueur > 0 ou pvMonstre > 0
*   le joueur afflige $atq de dommage au monstre
*   echo du nombre de dommage + pvMonstre restant
*   si pvMonstre > 0
*       le monstre afflige $atq de dommage au joueur
*       echo du nombre de dommage + pvJoueur restant
* Si pvMonstre <= 0
*   expJoueur += $atqMonstre
*   echo nombre d'exp gagner
*   echo nombre d'exp total
* Si pvJoueur <= 0
*   Fin de la partie
*/

function combat($joueur, $monstre)
{
    echo "<p class='jeu'>Le combat commence</p><br>";
    $pv = $joueur->pv;
    while ($joueur->pv > 0 && $monstre->pv >0) {
        $joueur->attaque($monstre);
        echo "<p class='joueur'>Le joueur inflige <span class='degat'>$joueur->atq dégats</span> au monstre</p>";
        if ($monstre->pv > 0) {
            echo "<p class='monstre'>Il reste <span class='pv'>$monstre->pv pv</span> au monstre</p>";
            $monstre->attaque($joueur);
            echo "<p class='monstre'>Le monstre inflige <pans class='degat'>$monstre->atq dégats</span> au joueur";
        }
    }
    if ($joueur->pv <= 0) {
        echo "<p>Le joueur est mort";
        echo "<h1>VOUS AVEZ PERDU</h1>";
    } elseif ($monstre->pv <= 0) {
        echo "<p>Le monstre est mort";
        echo "<p>Le joueur fini le combat avec $joueur->pv pv";
        $joueur->pv = $pv;
        echo "<p>Le joueur regagne ses pv, il lui reste $joueur->pv pv";
        $joueur->exp += $monstre->atq;
        echo "<p>Le joueur gagne $monstre->atq EXP<br> $joueur->exp EXP total</p>";
    }
}
