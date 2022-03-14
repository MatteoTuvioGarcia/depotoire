<?php
require "gerer.php";
class gererAssure extends gerer
{




    public function getMinInAssure($data)
    {
        $min = 1000;
        foreach ($data as $row) {
            $currentval = $row->getPointsFidelite();
            if ($currentval <= $min) {
                $min = $currentval;
            }
        }

        return $min;
    }

    public function addAssure(Assure $assure)
    {
        $sql = "INSERT INTO assure(Nom, Age, Domicile, bonusMalus, pointsFidelite) VALUES (?,?,?,?,?)";
        $this->executeRequete($sql,[
            $assure->getNom(),
            $assure->getAge(),
            $assure->getDomicile(),
            $assure->getBonusMalus(),
            $assure->getPointsFidelite()
        ]);

    }

    public function editAssure(Assure $assure)
    {
        //requete préparée attendue de type update
        $sql = "UPDATE assure SET Nom = ?, Age = ?, Domicile = ?, bonusMalus = ?, pointsFidelite = ? WHERE idAssure = ?";
        $idRequete = $this->cnx->prepare($sql);
        $idRequete->execute([
            $assure->getNom(), $assure->getAge(), $assure->getDomicile(), $assure->getBonusMalus(), $assure->getPointsFidelite(), $assure->getIdAssure()
        ]);
    }

    public function delAssure(Assure $assure)
    {
        $sql = "DELETE FROM assure WHERE idAssure = ?";
        $idRequete = $this->cnx->prepare($sql);
        $idRequete->execute([$assure->getIdAssure()]);
    }

    public function getAssure($id)
    {
        //requete préparée attendue type select
        $sql = "SELECT * from assure WHERE idAssure = ?";
        $idRequete = $this->cnx->prepare($sql);
        $idRequete->execute([$id]);
        $data = $idRequete->fetch(PDO::FETCH_ASSOC);
        return new Assure($data);
    }

    public function getListAssure()
    {
        //requete préparée attendue type select
        $sql = "SELECT * from assure";
        $idRequete = $this->executeRequete($sql);
        while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
            if (isset($row)) {
                $assures[] = new Assure($row);

            }
        }
        return $assures ?? null;
    }

    public function count()
    {
        $i = $this->getListAssure();
        $x = 0;
        if ($i <> null) {
            foreach ($i as $b) {
                $x = $x + 1;
            }
            return $x;
        } else {
            return 0;
        }
    }
}