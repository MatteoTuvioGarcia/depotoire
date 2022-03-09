<?php
//appel de la classe assuré et des modules de connection bdd

require_once "assure.php";
require_once "include/infoconnection.php";
require_once "include/executerequete.php";
require_once "include/connection.php";
require_once "gererAssurer.php";
$cnx = connection();
$gerer = new gererAssure($cnx);
$x = $gerer->count();
$e = $gerer->getListAssure();


function htmlGetcount()
{
    $cnx = connection();
    $gerer = new gererAssure($cnx);
    echo $gerer->count();
}

function htmlAssureTable()
{
    $cnx = connection();
    $gerer = new gererAssure($cnx);
    $x = $gerer->getListAssure();
    if ($x <> null) {
        echo "<table class='col-md-12 text-center'>
        <thead>
        <tr>
            <th>N.</th>
            <th>Nom</th>
            <th>BonusMalus</th>
            <th>Fidélité</th>
            <th>Régler</th>
            <th>Accident</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>";
        foreach ($x as $assure) {
            echo "<form action='sAssure.php' method='POST'><tr>";
            echo "<td><input  type='number' name='id' value='" . $assure->getidAssure() . "'readonly hidden/>" . $assure->getidAssure() . "</td>";
            echo "<td>" . $assure->getNom() . "</td>";
            echo "<td>" . $assure->getbonusMalus() . "</td>";
            echo "<td>" . $assure->getPointsFidelite() . "</td>";
            echo "<td>" . "<input class='btn btn-primary' type='submit' name=regler value='Régler'/>" . "</td>";
            echo "<td>" . "<input class='btn btn-primary' type='submit' name=accident value='Accident'/>" . "</td>";
            echo "<td>" . "<input class='btn btn-primary' type='submit' name=supp value='Supprimer'/>" . "</td>";
            echo "</tr></form>";
        }
        echo "</tbody>
            </table>";
    }
}


if (isset($_POST['regler'])) {
    $ass = $gerer->getAssure($_POST['id']);
    $ass->reglerassurance();
    $gerer->editAssure($ass);

}


if (isset($_POST['accident'])) {
    $ass = $gerer->getAssure($_POST['id']);
    $ass->avoiraccident();
    $gerer->editAssure($ass);

}


if (isset($_POST['supp'])) {
    if ($gerer->count() >= 1) {
        $ass = $gerer->getAssure($_POST['id']);
        $gerer->delAssure($ass);
    }
}
if (isset($_POST['btn_ajout'])) {
    if ($_POST['nom'] <> "" && $_POST['domicile'] <> "" && $_POST['age'] <> "") {
        $assure = new Assure($_POST);
        $gerer->addAssure($assure);
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

</head>
<body>
<div class="container text-center">
    <h1 class="count">Il y a <?php htmlGetcount();?> adhérent[s].</h1>
        <?php htmlAssureTable();?>
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


