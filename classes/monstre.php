<?php
declare(strict_types=1);

namespace Classes;
use Classes\Perso;

class Monstre extends Perso
{
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

    // __getter__
    public function getPv()
    {
        return $this->pv;
    }

    public function getAtq()
    {
        return $this->atq;
    }

    public function getPosX()
    {
        return $this->posX;
    }

    public function getPosY()
    {
        return $this->posY;
    }
}
