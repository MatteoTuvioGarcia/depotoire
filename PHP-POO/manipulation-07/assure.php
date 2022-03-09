<?php

class Assure
{
    //Espace déclaration de variables
    private int $idAssure;
    private string $nom = "Billy";
    private string $domicile = "Déols";
    private int $age = 5;
    private float $bonusmalus = 0;
    private int $pointsFidelite = 0;


    //Vient remplir les données à partir d'une source externe
    //Row = 1L %data
    public function hydrater(array $row)
    {
        foreach($row as $k => $v){
           $setter = 'set'.ucfirst($k);
           if(method_exists($this,$setter)){
                $this->$setter($v);
           }
        }
    }


    //constructeur, vient construire une instance
    public function __construct($data)
    {
        $this->hydrater($data);
    }

    public static $information = "Tout les avantages de nos abonnés";
    const BRONZE = 50;
    const ARGENT = 100;
    const GOLD = 150;


    public function getIdAssure(): int
    {
        return $this->idAssure;
    }


    public function setIdAssure(int $idAssure): void
    {
        $this->idAssure = $idAssure;
    }
    //espace définition de méthodes



    public function reglerassurance(): void
    {
        //augmentation de 4 points

        $this->setBonusmalus(4);
        $this->setPointsFidelite(10);
    }

    public function avoiraccident(): void
    {
        $this->setBonusmalus(-14);
    }

    public function parrainer(Assure $parraine): void
    {
        $this->setPointsFidelite(5);
        $parraine->setPointsFidelite(5);
    }


    public function getBonusMalus(): float
    {
        return $this->bonusmalus;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getDomicile(): string
    {
        return $this->domicile;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return int
     */
    public function getPointsFidelite(): int
    {
        return $this->pointsFidelite;
    }


    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        if (empty($nom) || ctype_space($nom)) {
            trigger_error("LE NOM EST INVALIDE.");
        } else {
            $this->nom = $nom;
        }
    }

    /**
     * @param string $domicile
     */
    public function setDomicile(string $domicile): void
    {
        if (is_string($domicile) == false || ctype_space($domicile)) {
            trigger_error("Domicile non valide");
        } else {
            $this->domicile = $domicile;
        }
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        if ($age < 7 || $age > 130) {
            trigger_error("AGE NON VALIDE.");
        } else {
            $this->age = $age;
        }
    }

    /**
     * @param float|int $bonusmalus
     */
    public function setBonusmalus(int $bonusmalus): void
    {
        if (is_int($bonusmalus) == false) {
            trigger_error("BONUSMALUS NON VALIDE.");
            return;
        }
        if ($this->bonusmalus + $bonusmalus >= 50) {
            echo "tjrs positif";
            $this->bonusmalus = 50;
        }
        if ($this->bonusmalus + $bonusmalus <= -50) {
            echo "tjrs negatif";
            $this->bonusmalus = -50;
        }
        if ($this->bonusmalus + $bonusmalus <= 50 && $this->bonusmalus + $bonusmalus >= -50) {
            $this->bonusmalus = $this->bonusmalus + $bonusmalus;
        }
    }

    public function setPointsFidelite(int $pointsFidelite): void
    {
        $this->pointsFidelite = $this->pointsFidelite + $pointsFidelite;
    }

}

