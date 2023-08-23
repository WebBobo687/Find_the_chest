<?php
declare(strict_types=1);

namespace Classes;
use Classes\Perso;

class Monstre extends Perso
{
    public function __construct($pv, $atq, $posX, $posY) {
        parent::__construct($pv, $atq, $posX, $posY);
    }

    public function attaque($cible) {
        parent::attaque($cible);
    }

    public function degats($dommage)
    {
        parent::degats($dommage)   ;
    }
}
