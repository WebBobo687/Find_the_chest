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

main();

function main()
{
    if (session_status() != 2){
        session_start();
    }

    # Création du joueur
    if (!isset($_SESSION['joueur'])){
        $_SESSION['joueur'] = createJoueur();
    }
    $joueur = $_SESSION['joueur'];
    $joueurStatut = 'en vie';
    
    # Création du monstre
    if (!isset($_SESSION['monstres'])){
        $_SESSION['monstres'] = createMonstres();
    }
    $monstres = $_SESSION['monstres'];
    

    if (!isset($_SESSION['coffre'])){
        $_SESSION['coffre'] = createCoffre();
    }
    $coffre = $_SESSION['coffre'];
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        mouvement($joueur, $coffre);
    }

    foreach ($monstres as $monstre){
        if ($joueur->posX == $monstre->posX && $joueur->posY == $monstre->posY){
            //Combat
            $joueurStatut = combat($joueur, $monstre);
            if ($joueurStatut == 'survive') {
                unset($monstres[array_search($monstre, $monstres)]);
                $_SESSION['monstres'] = $monstres;
            }
        }
    }
}


function createJoueur():object
{
    $_SESSION['joueur'] = new Joueur(rand(125, 250), rand(100, 125), 0, 0);;
    return $_SESSION['joueur'];
}



function createCoffre():object
{
    do {
        $_SESSION['coffre'] = new Coffre(rand(0, 9), rand(0, 9));
    } while($_SESSION['coffre']->posX == 0 && $_SESSION['coffre']->posY == 0);
    return $_SESSION['coffre'];
}



function createMonstres():array
{
    $_SESSION['monstres'] =[];
    $_SESSION['nombreMonstres'] = rand(3, 8);

    for ($i=0; $i<=$_SESSION['nombreMonstres']; $i++)
    {
        $_SESSION['monstres'][] = createUniqueMonstre();
    }
    return $_SESSION['monstres'];
}



function createUniqueMonstre():object
{
    do {
        $monstre = new Monstre(rand(125, 250), rand(100, 125), rand(0, 9), rand(0, 9));
    } while ($monstre->posX == 0 && $monstre->posY == 0);
    return $monstre;
}



function coffreTrouve($joueur, $coffre):void
{
    if($joueur->posX == $coffre->posX && $joueur->posY == $coffre->posY) {
        gagner();
    }
}



/*
* Si le joueur est sur l'emplacement du coffre,
*   La pertie s'arrête et le joueur gagne.
*/
function gagner() {
    session_destroy();
    die("<h1>VOUS AVEZ GAGNER !!</h1>");
}



function mouvement($joueur, $coffre)
{
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
        echo "<br>Le joueur est au bout à gauche de la carte.";
    } elseif ($joueur->posX === 9) {
        echo "<br>Le joueur est au bout à droite de la carte.";
    }

    if ($joueur->posY === 0) {
        echo "<br>Le joueur est au bout en bas de la carte.";
    } elseif ($joueur->posY === 9) {
        echo "<br>Le joueur est au bout en haut de la carte.";
    }
    coffreTrouve($joueur, $coffre);

    echo "<br>Position du joueur après déplacement - X: " . $joueur->posX . ", Y: " . $joueur->posY;
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
        session_destroy();
        return "mort";
    }
    elseif ($monstre->pv <= 0) {
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


