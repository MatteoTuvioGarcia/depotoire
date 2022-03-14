<?php

class Societaire extends Assure
{
    //Ajout des propriétés propre au sociétaire
    private int $partSociale = 0;
    private int $facilitePaiement = 1;

    const MAJORATION = 10;
    /**
     * @return int
     */
    public function getPartSociale(): int
    {
        return $this->partSociale;
    }

    /**
     * @return int
     */
    public function getFacilitePaiement(): int
    {
        return $this->facilitePaiement;
    }

    /**
     * @param int $facilitePaiement
     */
    public function setFacilitePaiement(int $facilitePaiement)
    {
        $this->facilitePaiement = $facilitePaiement;
    }

    /**
     * @param int $partSociale
     */
    public function setPartSociale(int $partSociale): void
    {
        if ($this->partSociale + $partSociale > 500) {
            $this->partSociale = 500;
        } else if ($this->partSociale + $partSociale < 0) {
            $this->partSociale = 0;
        } else {
            $this->partSociale += $partSociale;
        }
    }
    public function parrainer(Assure $parraine): void
    {
        $this->setPointsFidelite(5+self::MAJORATION);
        $parraine->setPointsFidelite(5);
    }
//Fausse surcharge
    public function reglerassurance($choix = 1)
    {
        //augmentation de 4 points

        switch ($choix) {
            case 3:
//                echo "Paiement en 3 fois";
                $this->setFacilitePaiement($choix);
                break;
            case 6:
//                echo "Paiement en 6 fois";
                $this->setFacilitePaiement($choix);
                break;
            case 12:
//                echo "Paiement en 12 fois";
                $this->setFacilitePaiement($choix);
                break;
            default:
//                echo  "Mauvaise valeure entrée.";
                $this->setFacilitePaiement(1);
        }

        $this->setBonusmalus(4);
        $this->setPointsFidelite(10);

    }

}
