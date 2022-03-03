<?php
function executerequete($cnx,$req, $born =[]){


    // 4 - preparation de la requête et retourne un identifiant de connexion
    $idRequete = $cnx->prepare($req);
    // Execution de la requete avec les parametres
    $idRequete->execute($born);

    return $idRequete;
}

function afficherrequete($req,$count = false)
{
    $i = 0;
    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nom'] . '<br>';
        $i++;
    }
    if ($count == true){
        echo '<br>' . ' <p>Nombre de résultats: ' . $i.'</p>';
    }

}