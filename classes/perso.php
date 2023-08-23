<?php
declare(strict_types=1);

namespace Classes;
abstract class Perso {
    /*
    * @var int $pv (point de vie)
    * @var int $atq (attaque / force)
    */

    public int $pv;
    public int $atq;
    public int $posX;
    public int $posY;

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
    public function getPv()
    {
        return $this->pv;
    }

    public function getAtq()
    {
        return $this->atq;
    }

    public function getPosX(){
        return $this->posX;
    }
    
    public function getPosY(){
        return $this->posY;
    }

    
    
}
