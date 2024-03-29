<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', '/', $className) . '.php';
    $classPath = '../' . $classPath;

    require_once __DIR__ . '/' . $classPath;
});


use Classes\Joueur;
use Classes\Monstre;
use Classes\Coffre;


if (session_status() != 2) {
    session_start();
}


if (!isset($_POST['endgame'])) {
    main();
} else {
    session_destroy();
    $_SESSION['jeu'] = [];
}


function main()
{
    # Création du joueur
    if (!isset($_SESSION['joueur'])) {
        $_SESSION['joueur'] = createJoueur();
    }
    $joueur = $_SESSION['joueur'];
    $joueurStatut = 'en vie';

    # Création du monstre
    if (!isset($_SESSION['monstres'])) {
        $_SESSION['monstres'] = createMonstres();
    }
    $monstres = $_SESSION['monstres'];


    if (!isset($_SESSION['coffre'])) {
        $_SESSION['coffre'] = createCoffre();
    }
    $coffre = $_SESSION['coffre'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        mouvement($joueur, $coffre);
    }

    foreach ($monstres as $monstre) {
        if ($joueur->posX == $monstre->posX && $joueur->posY == $monstre->posY) {
            //Combat
            $joueurStatut = combat($joueur, $monstre);
            if ($joueurStatut == 'survive') {
                unset($monstres[array_search($monstre, $monstres)]);
                $_SESSION['monstres'] = $monstres;
            }
        }
    }
}


function createJoueur(): object
{
    $_SESSION['joueur'] = new Joueur(rand(125, 250), rand(100, 125), 0, 0);
    ;
    return $_SESSION['joueur'];
}



function createCoffre(): object
{
    do {
        $_SESSION['coffre'] = new Coffre(rand(0, 9), rand(0, 9));
    } while ($_SESSION['coffre']->posX == 0 && $_SESSION['coffre']->posY == 0);
    return $_SESSION['coffre'];
}



function createMonstres(): array
{
    $_SESSION['monstres'] = [];
    $_SESSION['nombreMonstres'] = rand(10, 50);

    for ($i = 0; $i <= $_SESSION['nombreMonstres']; $i++) {
        $_SESSION['monstres'][] = createUniqueMonstre();
    }
    return $_SESSION['monstres'];
}



function createUniqueMonstre(): object
{
    do {
        $monstre = new Monstre(rand(125, 250), rand(100, 125), rand(0, 9), rand(0, 9), rand(1, 20));
    } while ($monstre->posX == 0 && $monstre->posY == 0);
    return $monstre;
}



function coffreTrouve($joueur, $coffre): void
{
    if ($joueur->posX == $coffre->posX && $joueur->posY == $coffre->posY) {
        gagner();
    }
}



/*
 * Si le joueur est sur l'emplacement du coffre,
 *   La pertie s'arrête et le joueur gagne.
 */
function gagner()
{
    session_destroy();
    die("<div class='text-center'><h1>VOUS AVEZ <span class='text-success'>GAGNE</span>, BRAVO !</h1><br><a href='index.php' class='btn btn-success'>Accueil</a></div>");
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
        $_SESSION['jeu'][] = "<p class='jeu fw-bold'>Le joueur est à gauche de la carte.</p>";
    } elseif ($joueur->posX === 9) {
        $_SESSION['jeu'][] = "<p class='jeu fw-bold'>Le joueur est à droite de la carte.</p>";
    }

    if ($joueur->posY === 0) {
        $_SESSION['jeu'][] = "<p class='jeu fw-bold'>Le joueur est en bas de la carte.</p>";
    } elseif ($joueur->posY === 9) {
        $_SESSION['jeu'][] = "<p class='jeu fw-bold'>Le joueur est en haut de la carte.</p>";
    }
    coffreTrouve($joueur, $coffre);

    $_SESSION['jeu'][] = '<p class="jeu"><span style="color: black; font-weight: bold; text-decoration: underline;">' . date('h:i:s') . '</span> | Coordonées du joueur : X => ' . $joueur->posX . ' Y => ' . $joueur->posY . '</p>';
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
    $_SESSION['jeu'][] = "<p class='jeu'>Le combat commence</p>";
    $pv = $joueur->pv;

    while ($joueur->pv > 0 && $monstre->pv > 0) {
        $joueur->attaque($monstre);
        $_SESSION['jeu'][] = "<p class='joueur'>Le joueur inflige <span class='degat'>$joueur->atq dégats</span> au monstre</p>";

        if ($monstre->pv > 0) {
            $_SESSION['jeu'][] = "<p class='monstre'>Il reste <span class='pv'>$monstre->pv pv</span> au monstre</p>";
            $monstre->attaque($joueur);
            $_SESSION['jeu'][] = "<p class='monstre'>Le monstre inflige <span class='degat'>$monstre->atq dégats</span> au joueur";
            $_SESSION['jeu'][] = "<p class='joueur'>Il reste <span class='pv'>$joueur->pv pv</span> au joueur";
        }
    }

    if ($joueur->pv <= 0) {
        $_SESSION['jeu'][] = "<p class='joueur'>Le joueur est mort</p>";
        // $_SESSION['jeu'][] = ;
        session_destroy();
        die("<div class='text-center'><h1>VOUS AVEZ <span class='text-danger'>PERDU</span> ...</h1><br><a href='index.php' class='btn btn-success'>Accueil</a></div>");
        // return "mort";
    } elseif ($monstre->pv <= 0) {
        $_SESSION['jeu'][] = "<p class='monstre'>Le monstre est mort";
        $_SESSION['jeu'][] = "<p class='joueur'>Le joueur fini le combat avec <span class='pv'>$joueur->pv pv</span>";
        $joueur->pv = $pv;
        $_SESSION['jeu'][] = "<p class='joueur'>Le joueur regagne ses pv, il lui reste <span class='pv'>$joueur->pv pv</span>";
        $joueur->exp += $monstre->atq;
        $_SESSION['jeu'][] = "<p class='joueur'>Le joueur gagne $monstre->atq EXP<br> $joueur->exp EXP total</p><br>";
        unset($monster);
        return "survive";
    }
}
