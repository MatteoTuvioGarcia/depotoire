<?php
class gererAssure {
    private object $cnx;
    public function __construct($cnx)
    {
        $this->setCnx($cnx);
    }
    public function setCnx(object $cnx)
    {
        $this->cnx=$cnx;
    }
    public function addAssure(Assure $assure)
    {
        $sql = "INSERT INTO assure(Nom, Age, Domicile, bonusMalus, pointsFidelite) VALUES (?,?,?,?,?)";
        $idRequete = $this->cnx->prepare($sql);
        $idRequete->execute([
            $assure->getNom(), $assure->getAge(),$assure->getDomicile(), $assure->getBonusMalus(), $assure->getPointsFidelite()
        ]);
    }

    public function editAssure(Assure $assure)
    {
        //requete préparée attendue de type update
        $sql = "UPDATE assure SET Nom = ?, Age = ?, Domicile = ?, bonusMalus = ?, pointsFidelite = ? WHERE idAssure = ?";
        $idRequete = $this->cnx->prepare($sql);
        $idRequete->execute([
            $assure->getNom(), $assure->getAge(),$assure->getDomicile(), $assure->getBonusMalus(), $assure->getPointsFidelite(), $assure->getIdAssure()
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
        $idRequete = $this->cnx->query($sql);
        while ($row = $idRequete->fetch(PDO::FETCH_ASSOC)) {
           $assures[] = new Assure($row);
        }
        return $assures;
    }

    public function count(){
        $i = $this->getListAssure();
        $x = 0;
        foreach($i as $b){
            $x=$x+1;
        }
        return $x;
    }
}