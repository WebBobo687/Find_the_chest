<?php

declare(strict_types=1);
namespace Classes;
use Classes\Perso;

class Joueur extends Perso {

    public int $exp;

    // __setter__
    protected function setPv($pv)
    {
        parent::setPv($pv);
    }

    protected function setAtq($atq)
    {
        parent::setAtq($atq);
    }

    protected function setPosX($posX)
    {
        parent::setPosX($posX);
    }
    
    protected function setPosY($posY)
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
            die("Vous avez trouver le coffre, félicitation!");
        }
    }
}
