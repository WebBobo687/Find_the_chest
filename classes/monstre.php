<?php
declare(strict_types=1);

namespace Classes;

class Monstre
{
    private int $life;
    private int $strength;

    public function getLife()
    {
        return $this->life;
    }
    public function setLife($life)
    {
        $this->life = $life;
    }
    public function getStrength()
    {
        return $this->strength;
    }
    public function setStrength($strength)
    {
        $this->strength = $strength;
    }
}
