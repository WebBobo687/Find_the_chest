<?php

declare(strict_types=1);

namespace Classes;

class Carte
{
    private int $largeur = random_int(10, 50);
    private int $longueur = random_int(10, 50);
    private array $cases = [];

    public function __construct()
    {
        for ($i = 0; $i < $this->longueur; $i++) {
            $ligne = [];
            for ($j = 0; $j < $this->largeur; $j++) {
                $ligne[] = ' ';
            }
            $this->cases[] = $ligne;
        }
    }
}