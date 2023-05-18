<?php

class Categories {
    private $id;
    private $nom;

    public function __construct(int $id, string $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

}