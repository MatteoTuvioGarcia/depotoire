<?php

abstract class gerer{
    private object $cnx;

    public function __construct($cnx)
    {
        $this->cnx = connection();
    }

    public function setCnx(object $cnx)
    {
        $this->cnx = $cnx;
    }


    private function getCnx(){
        if($this->cnx == null){
            

        }
        return $this->cnx;

    }
    protected function executeRequete($sql, $param = [""]){
        if($param !== null){
            $resultat = $this->cnx->query($sql);

        }else{
            $resultat = $this->cnx->prepare($sql);
            $resultat = $resultat->execute($param);
            $resultat = $resultat->fetch(PDO::FETCH_ASSOC);
            
        }
        var_dump($resultat);
        return $resultat;
    }
}