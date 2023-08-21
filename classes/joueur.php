<?php

declare(strict_types=1);
namespace Classes;
use Classes\Perso;

$win = False;

class Joueur extends Perso {

    public int $exp;
    public bool $win;

    // __setter__
    public function setPv($pv)
    {
        parent::setPv($pv);
    }

    public function setAtq($atq)
    {
        parent::setAtq($atq);
    }

    public function setPosX($posX)
    {
        parent::setPosX($posX);
    }
    
    public function setPosY($posY)
    {
        parent::setPosY($posY);
    }

    protected function setExp($exp)
    {
        $this->$exp = 0;
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

    public function getPosX($posX)
    {
        return $this->$posX;
    }
    
    public function getPosY($posY)
    {
        return $this->$posY;
    }

    public function getExp($exp)
    {
        return $this->$exp;
    }

    public function gagner($posCoffre, $posJoueur)
    {
        if ($posCoffre == $posJoueur) {
            $win = True;
            die("Vous avez trouver le coffre, félicitation!");
        }
    }
}
