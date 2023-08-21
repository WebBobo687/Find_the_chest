<?php

declare(strict_types=1);
namespace Classes;

class Coffre
{
    public int $posX;
    public int $posY;

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
    public function getPosX($posX)
    {
        return $this->$posX;
    }
    
    public function getPosY($posY)
    {
        return $this->$posY;
    }
}
