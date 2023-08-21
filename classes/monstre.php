<?php
declare(strict_types=1);

namespace Classes;

class Monstre
{
    private int $pv;
    private int $atq;

    public function getPv()
    {
        return $this->pv;
    }
    public function setPv($pv)
    {
        $this->pv = $pv;
    }
    public function getAtq()
    {
        return $this->atq;
    }
    public function setAtq($atq)
    {
        $this->atq = $atq;
    }
}
