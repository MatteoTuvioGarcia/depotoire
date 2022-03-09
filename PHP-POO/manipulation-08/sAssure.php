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

if (isset($_POST['btn_ajout'])) {
    $assure = new Assure($_POST);
    $gerer->addAssure($assure);

}
function htmlGetcount()
{
    $cnx = connection();
    $gerer = new gererAssure($cnx);
    echo $gerer->count();
}

function htmlAssure()
{
    $cnx = connection();
    $gerer = new gererAssure($cnx);
    $x = $gerer->getListAssure();

    foreach ($x as $assure) {
        echo "<tr>";
        echo "<td>" . $assure->getidAssure() . "</td>";
        echo "<td>" . $assure->getNom() . "</td>";
        echo "<td>" . $assure->getbonusMalus() . "</td>";
        echo "<td>" . $assure->getPointsFidelite() . "</td>";
        echo "<td>" . "<form action='sAssure.php' method='post'><input type='submit' name=regle_" . $assure->getIdAssure() . " value='régler'/></form>" . "</td>";
        echo "<td>" . "<form action='sAssure.php' method='post'><input type='submit' name=accident_" . $assure->getIdAssure() . " value='Accident'/></form>" . "</td>";
        echo "<td>" . "<form action='sAssure.php' method='post'><input type='submit' name=supp_" . $assure->getIdAssure() . " value='Supprimer'/></form>" . "</td>";
        echo "</tr>";
    }
}

foreach ($e as $assure) {
    if (isset($_POST['regle_' . $assure->getIdAssure()])) {
        $ass = $gerer->getAssure($assure->getIdAssure());
        $ass->reglerassurance();
        $gerer->editAssure($ass);

    }
}

foreach ($e as $assure) {
    if (isset($_POST['accident_' . $assure->getIdAssure()])) {
        $ass = $gerer->getAssure($assure->getIdAssure());
        $ass->avoiraccident();
        $gerer->editAssure($ass);

    }
}
foreach ($e as $assure) {
    if (isset($_POST['supp_' . $assure->getIdAssure()])) {
        $ass = $gerer->getAssure($assure->getIdAssure());
        $gerer->delAssure($ass);

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP PhP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="count">Il y a <?php htmlGetcount(); ?> adhérents.</h1>
    <table>
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
        <tbody>
        <?php htmlAssure(); ?>
        </tbody>
    </table>
    <form method="post" action="sAssure.php">
        <label>Nom: <input type="text" name="nom"/></label>
        <label>Age: <input type="number" name="age"/></label>
        <label>Domicile: <input type="text" name="domicile"/></label>
        <input type="submit" name="btn_ajout" value="Ajouter">

    </form>

</div>
</body>
</html>


