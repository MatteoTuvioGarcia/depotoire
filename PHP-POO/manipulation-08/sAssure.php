<?php
//Appel des modules de classes et de connection BDD
require_once "assure.php";
require_once "include/infoconnection.php";
require_once "include/executerequete.php";
require_once "include/connection.php";
require_once "gererAssurer.php";

//Definition de variables globales utiles (Nombre d'abonnés, liste des abonnés sous forme de tableau, objet de gestion Gerer)
$gerer = new gererAssure(connection());
$nbrAssure = $gerer->count();
$listeObjAssure = $gerer->getListAssure();

//Fonction qui retourne le compte d'assures dans l'HTML
function htmlGetcount()
{
    global $gerer;
    echo $gerer->count();
}


//Fonction pour générer une table contenant tout les assurés dans l'HTML
function htmlAssureTable()
{
    global $gerer, $listeObjAssure, $nbrAssure;
    $listeObjAssure = $gerer->getListAssure();
    $nbrAssure = $gerer->count();
    if ($nbrAssure !== 0) {
        echo "<table class='col-md-12 text-center'>
        <thead>
        <tr>
            <th>N.</th>
            <th>Nom</th>
            <th>BonusMalus</th>
            <th>Fidélité</th>
            <th>Classe</th>
            <th>Régler</th>
            <th>Accident</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($listeObjAssure as $assure) {
            echo "<form action='sAssure.php' method='POST'><tr>";
            echo "<td><input  type='number' name='id' value='" . $assure->getidAssure() . "'readonly hidden/>" . $assure->getidAssure() . "</td>";
            echo "<td>" . $assure->getNom() . "</td>";
            echo "<td>" . $assure->getbonusMalus() . "</td>";
            echo "<td>" . $assure->getPointsFidelite() . "</td>";
            if ($assure->getPointsFidelite() >= Assure::BRONZE && $assure->getPointsFidelite() < Assure::ARGENT) {
                echo "<td class='bronze'>BRONZE</td>";
            } elseif ($assure->getPointsFidelite() >= Assure::ARGENT && $assure->getPointsFidelite() < Assure::GOLD) {
                echo "<td class='argent'>ARGENT</td>";
            } elseif ($assure->getPointsFidelite() >= Assure::GOLD) {
                echo "<td class='gold'>GOLD</td>";
            } else {
                echo "<td class=''></td>";
            }

            echo "<td>" . "<input class='btn btn-primary' type='submit' name=regler value='Régler'/>" . "</td>";
            echo "<td>" . "<input class='btn btn-primary' type='submit' name=accident value='Accident'/>" . "</td>";
            echo "<td>" . "<input class='btn btn-primary' type='submit' name=supp value='Supprimer'/>" . "</td>";
            echo "</tr></form>";
        }
        echo "</tbody>
            </table>";
    }
}

//Appui sur bouton Regler
if (isset($_POST['regler'])) {
    $ass = $gerer->getAssure($_POST['id']);
    $ass->reglerassurance();
    $gerer->editAssure($ass);

}

//Appui sur bouton Accident
if (isset($_POST['accident'])) {
    $ass = $gerer->getAssure($_POST['id']);
    $ass->avoiraccident();
    $gerer->editAssure($ass);

}

//Appui sur bouton de suppression
if (isset($_POST['supp'])) {
    if ($gerer->count() >= 1) {
        $ass = $gerer->getAssure($_POST['id']);
        $gerer->delAssure($ass);
    }
}

//Appui sur bouton d'ajout
if (isset($_POST['btn_ajout'])) {
    if ($_POST['nom'] !== "" && $_POST['domicile'] !== "" && $_POST['age'] !== "") {
        $nom = $_POST['nom'];
        $domicile = $_POST['domicile'];
        $age = $_POST['age'];

        if (ctype_space($domicile) == 1 || ctype_space($nom) == 1 || ctype_space($age) == 1) {
            error_log("Entrée invalide::Fonction AJOUT ASSURE (Nom, domicile ou age seulement espaces)");
        } else {
            if ($age > 0 && $age < 120) {
                $assure = new Assure(['nom' => $nom, 'domicile' => $domicile, 'age' => $age]);
                $gerer->addAssure($assure);
            } else {
                error_log("Entrée invalide::Fonction AJOUT ASSURE (Age >120)");
            }
        }
    } else {
        error_log("Entrée invalide::Fonction AJOUT ASSURE (Nom, domicile ou age vide)");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP PhP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container text-center">
    <h1 class="count">Il y a <?php htmlGetcount(); ?> adhérent[s].</h1>
    <?php htmlAssureTable(); ?>
    <form class="form-group col-md-12 mt-4" method="post" action="sAssure.php">
        <label for="nom">Nom:</label>
        <input class="form-control" type="text" name="nom" placeholder="Nom du nouvel assuré"/>
        <label for="age">Age:</label>
        <input class="form-control" type="number" name="age" placeholder="Age du nouvel assuré"/>
        <label for="domicile">Domicile:</label>
        <input class="form-control" type="text" name="domicile" placeholder="Ville du nouvel assuré"/>
        <input class="btn btn-primary mt-3" type="submit" name="btn_ajout" value="Ajouter">

    </form>

</div>
</body>
</html>


