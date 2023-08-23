<?php

declare(strict_types=1);
namespace Classes;
use Classes\Perso;

class Joueur extends Perso {

    public int $exp;

    public function __construct($pv, $atq, $posX, $posY, $exp) {
        parent::__construct($pv, $atq, $posX, $posY);
        $this->exp = $exp;
    }

    // __setter__
    protected function setExp($exp)
    {
        $this->$exp = 0;
    }

    // __getter__
        public function getExp()
    {
        return $this->exp;
    }

    public function attaque($cible) {
        parent::attaque($cible);
    }

    public function degats($dommage)
    {
        parent::degats($dommage)   ;
    }

}
