<?php

declare(strict_types=1);
namespace Classes;

class Coffre
{
    public int $posX;
    public int $posY;

    public function __construct($posX, $posY) {
        $this->posX = $posX;
        $this->posY = $posY;
    }

    // __setter__
    public function setPosX($posX)
    {
        $this->$posX = $posX;
    }
    
    public function setPosY($posY)
    {
        $this->$posY = $posY;
    }

    // __getter__
    public function getPosX()
    {
        return $this->posX;
    }
    
    public function getPosY()
    {
        return $this->posY;
    }
}
