<?php

declare(strict_types=1);

namespace Classes;

class Carte
{
    private int $largeur = 10;
    private int $longueur = 10;
    private array $cases = [];

    public function __construct()
    {
        for ($i = 0; $i < $this->longueur; $i++) {
            $ligne = [];
            for ($j = 0; $j < $this->largeur; $j++) {
                $ligne[] = $j;
            }
            $this->cases[] = $ligne;
        }
    }
}