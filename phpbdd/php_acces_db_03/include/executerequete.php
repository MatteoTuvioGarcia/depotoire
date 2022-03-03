<?php
function executerequete($cnx,$req, $born =[]){


    // 4 - preparation de la requête et retourne un identifiant de connexion
    $idRequete = $cnx->prepare($req);
    // Execution de la requete avec les parametres
    $idRequete->execute($born);

    return $idRequete;
}