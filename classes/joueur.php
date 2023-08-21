<?php

namespace Classes;
use Classes\Perso;

class Joueur extends Perso {

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

}
