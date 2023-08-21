<?php

declare(strict_types=1);

class Coffre
{
    public int $posX;
    public int $posY;

    // __setter__
    private function setPosX($posX)
    {
        $this->$posX = $posX;
    }
    
    private function setPosY($posY)
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
