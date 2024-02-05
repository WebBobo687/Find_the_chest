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
    public int $gold;
    public int $posX;
    public int $posY;

    public function __construct($pv, $atq, $posX, $posY, $gold=0) {
        $this->pv = $pv;
        $this->atq = $atq;
        $this->gold = $gold;
        $this->posX = $posX;
        $this->posY = $posY;
    }

    // __setter__
    protected function setPv($pv)
    {
        $this->$pv = $pv;
    }

    protected function setAtq($atq)
    {
        $this->$atq = $atq;
    }
    
    protected function setGold($gold)
    {
        $this->$gold = $gold;
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
   
    public function getGold()
    {
        return $this->gold;
    }

    public function getPosX(){
        return $this->posX;
    }
    
    public function getPosY(){
        return $this->posY;
    }
    

    public function attaque(Perso $cible)
    {
        $cible->degats($this->atq);
    }
    
    public function degats($dommage)
    {
        $this->pv -= $dommage;
    }

    public function lvlUp($cible)
    {
        $this->pv += 50;
        $this->atq += 50;
    }

}
