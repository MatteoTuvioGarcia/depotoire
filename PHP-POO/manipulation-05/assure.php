<?php

class Assure
{
    //Espace déclaration de variables
    private string $nom = "Billy";
    private string $domicile = "Déols";
    private int $age = 5;
    private float $bonusmalus = 0;


    //constructeur, vient construire une instance
    public function __construct(string $nom, string $domicile, int $age)
    {
        $this->setNom($nom);
        $this->setDomicile($domicile);
        $this->setAge($age);
        $this->setBonusmalus(0);
    }

    public static $information = "Tout les avantages de nos abonnés";
    const BRONZE = 50;
    const ARGENT = 100;
    const GOLD = 150;
    //espace définition de méthodes


    public function reglerassurance(): void
    {
        //augmentation de 4 points
        $this->bonusmalus = $this->bonusmalus + 4;
    }

    public function avoiraccident(): void
    {
        $this->bonusmalus = $this->bonusmalus - 14;
    }

    public function parrainer(Assure $parraine): void
    {
        if ($this->getBonusMalus() >= 10) {
            $parraine->bonusmalus = $parraine->bonusmalus + 10;
        } else {
            $parraine->bonusmalus = $parraine->bonusmalus + 4;
        }

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
    public static function getInfo()
    {
        return self::$information;
    }
    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        if (empty($nom) || ctype_space($nom)) {
            trigger_error("LE NOM EST INVALIDE.");
            return;
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
    public function setAge($age): void
    {
        if (is_int($age) == false || $age < 7 || $age > 130) {
            trigger_error("AGE NON VALIDE.");
            return;
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
}

