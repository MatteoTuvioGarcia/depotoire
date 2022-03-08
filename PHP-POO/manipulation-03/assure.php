<?php

class Assure
{
    //Espace déclaration de variables
    private $nom = "Billy";
    private $domicile = "Déols";
    private $age = 5;
    private $bonusmalus = 0;

    //espace définition de méthodes
    public function reglerassurance()
    {
        //augmentation de 4 points
        $this->bonusmalus = $this->bonusmalus + 4;
    }

    public function avoiraccident()
    {
        $this->bonusmalus = $this->bonusmalus - 14;
    }

    public function parrainer(Assure $parraine)
    {
        if ($this->getBonusMalus() >= 10) {
            $parraine->bonusmalus = 10;
        } else {
            $parraine->bonusmalus = 4;
        }

    }

    public function getBonusMalus()
    {
        return $this->bonusmalus;
    }
}