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
if($x <> null){
    foreach ($x as $assure) {
        echo "<form action='sAssure.php' method='POST'><tr>";
        echo "<td><input  type='number' name='id' value='".$assure->getidAssure() . "'readonly hidden/>".$assure->getidAssure()."</td>";
        echo "<td>" . $assure->getNom() . "</td>";
        echo "<td>" . $assure->getbonusMalus() . "</td>";
        echo "<td>" . $assure->getPointsFidelite() . "</td>";
        echo "<td>" . "<input class='btn btn-primary' type='submit' name=regler value='régler'/>" . "</td>";
        echo "<td>" . "<input class='btn btn-primary' type='submit' name=accident value='Accident'/>" . "</td>";
        echo "<td>" . "<input class='btn btn-primary' type='submit' name=supp value='Supprimer'/>" . "</td>";
        echo "</tr></form>";
    }
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
    if($gerer->count() >= 1) {
        $ass = $gerer->getAssure($_POST['id']);
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
    <h1 class="count">Il y a <?php htmlGetcount(); ?> adhérent[s].</h1>
    <table  class='col-md-12 text-center'>
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
        <label>Nom: <input type="text" name="nom" placeholder="Nom du nouvel assuré"/></label>
        <label>Age: <input type="number" name="age" placeholder="Age du nouvel assuré"/></label>
        <label>Domicile: <input type="text" name="domicile" placeholder="Ville du nouvel assuré"/></label>
        <input type="submit" name="btn_ajout" value="Ajouter">

    </form>

</div>
</body>
</html>


