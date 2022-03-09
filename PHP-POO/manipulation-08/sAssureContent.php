<?php
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