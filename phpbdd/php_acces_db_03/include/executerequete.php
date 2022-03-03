<?php
function executerequete($cnx, $born =[]){
    $varQuery = 'SELECT * FROM auteur WHERE date_naissance BETWEEN ? AND ?';

    // 4 - preparation de la requête et retourne un identifiant de connexion
    $idRequete = $cnx->prepare($varQuery);
    // Execution de la requete avec les parametres
    $idRequete->execute($born);

    return $idRequete;
}