<?php
//appel de la classe assuré et des modules de connection bdd
require_once "sAssureContent.php";
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


