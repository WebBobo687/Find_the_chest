<?php

namespace Classes;
abstract class Perso {
    /*
    * @var int $pv (point de vie)
    * @var int $atq (attaque / force)
    */

    public $pv;
    public $atq;
    public $posX;
    public $posY;

    // __setter__
    protected function setPv($pv)
    {
        $this->$pv = $pv;
    }

    protected function setAtq($atq)
    {
        $this->$atq = $atq;
    }

    protected function setPosX($posX){
        $this->$posX = $posX;
    }
    
    protected function setPosY($posY){
        $this->$posY = $posY;
    }

    // __getter__
    public function getPv($pv)
    {
        return $this->$pv;
    }

    public function getAtq($atq)
    {
        return $this->$atq;
    }

    public function getPosX($posX){
        return $this->$posX;
    }
    
    public function getPosY($posY){
        return $this->$posY;
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
    public function combat($joueur, $monstre)
    {
        echo "<p><span class='jeu'>Jeu:</span> Le combat commence</p>";
        while ( $joueur->getPv() > 0 && $monstre->getPv() >0 )
        {
            // Le joueur attaque
            echo "<p><span class='jeu'>Jeu:</span> Le joueur attaque le monstre</p>";
            echo "<p><span class='joueur'>Joueur:</span> Afflige <span class='dommage'>"+ $joueur->getAtq()+ "</span> au monstre";
            $monstre->pv -= $joueur->getAtq();
            echo "<p><span class='jeu'>Jeu: </span>Il reste <span class='life'>"+ $monstre->getPv() + "</span> au monstre";

            // Le monstre attaque
            if ($monstre->getPv() > 0)
            {
            echo "<p><span class='jeu'>Jeu:</span> Le monstre attaque le joueur</p>";
            echo "<p><span class='monstre'>Monstre:</span> Afflige <span class='dommage'>"+ $monstre->getAtq()+ "</span> au joueur";
            $joueur->pv -= $monstre->getAtq();
            echo "<p><span class='jeu'>Jeu: </span>Il reste <span class='life'>"+ $joueur->getPv() + "</span> au joueur";
            }
        }

        if ( $joueur->getPv() > 0)
        {
            $joueur->pv = $joueur->getPvStart();
            echo "<p><span class='jeu'>Jeu: </span> Le joueur à restauré tout ses pv</p>";
            echo "<p><span class='joueur'>Joueur: </span> possède <span class='life'>"+ $joueur->getPv() +"</span> pv</p>";
        }

        else
        {
            echo "<h1>Fin du jeu</h1>";
        }
    }
}
