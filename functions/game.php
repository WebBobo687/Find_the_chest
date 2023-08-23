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
    $i=0;
    $win = false;
    $monstres = [];
    $nombreMonstre = rand(3, 8);

    # Création du joueur
    $joueur = (new Joueur(rand(125, 250), rand(100, 125), 0, 0));
    $joueurStatut = 'en vie';
    
    # Création du monstre
    while ($i <= $nombreMonstre) {
        $newMonstre = (new Monstre(rand(125, 250), rand(100, 125), 0, 0));
        if ($newMonstre->posX == $joueur->posX && $newMonstre->posY == $joueur->posY) {
            unset($newMonstre);
            $newMonstre = (new Monstre(rand(125, 250), rand(100, 125), 0, 0));
        } else {
            $monstres[$i]= $newMonstre;
        }
        $i++;
    }

    $coffre = new Coffre;
    $coffre->setPosX(rand(0, 9));
    $coffre->setPosY(rand(0, 9));

    $carte = new Carte();
    
    $j = 0;
    while ($joueurStatut !== 'mort' && $j < 3) {
        foreach ($monstres as $monstre){
            if ($joueur->posX == $monstre->posX && $joueur->posY == $monstre->posY){
                //Combat
                $joueurStatut = combat($joueur, $monstre);
            }
            if ($joueurStatut == 'survive') {
                unset($monstres[array_search($monstre, $monstres)]);
            }
            break;
        }
        $j++;
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
    echo "<p class='jeu'>Le combat commence</p>";
    $pv = $joueur->pv;
    while ($joueur->pv > 0 && $monstre->pv >0) {
        $joueur->attaque($monstre);
        echo "<p class='joueur'>Le joueur inflige <span class='degat'>$joueur->atq dégats</span> au monstre</p>";
        if ($monstre->pv > 0) {
            echo "<p class='monstre'>Il reste <span class='pv'>$monstre->pv pv</span> au monstre</p>";
            $monstre->attaque($joueur);
            echo "<p class='monstre'>Le monstre inflige <pans class='degat'>$monstre->atq dégats</span> au joueur";
            echo "<p class='joueur'>Il reste <span class='pv'>$joueur->pv pv au joueur";
        }
    }
    if ($joueur->pv <= 0) {
        echo "<p>Le joueur est mort";
        echo "<h1>VOUS AVEZ PERDU</h1>";
        return "mort";
    } elseif ($monstre->pv <= 0) {
        echo "<p>Le monstre est mort";
        echo "<p>Le joueur fini le combat avec $joueur->pv pv";
        $joueur->pv = $pv;
        echo "<p>Le joueur regagne ses pv, il lui reste $joueur->pv pv";
        $joueur->exp += $monstre->atq;
        echo "<p>Le joueur gagne $monstre->atq EXP<br> $joueur->exp EXP total</p><br>";
        unset($monster);
        return "survive";
    }
}
