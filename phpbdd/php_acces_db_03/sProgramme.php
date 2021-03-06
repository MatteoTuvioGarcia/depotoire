<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Acces BD avec PDO</title>
</head>
<body>
<header class="container">
    <h1 class="col-md-12">Acces BD avec PDO</h1>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            // Utilisation de PDO : PHP DATA OBJECT
            //import des scripts au clic de btn_choix
            if (isset($_POST['btn_choix']))
            {
                require_once 'include/infoconnection.php';
                require_once 'include/connection.php';
                require_once 'include/executerequete.php';
                //Vérification d'erreur, min>max impossible
                if ($_POST['min'] <> "" && $_POST['max'] <> "")
                {
                    if ($_POST['min'] > $_POST['max'])
                    {
                        echo "La valeure maximale ne peut pas être inférieure à la valeure maximale.";
                    } else {
                        $minmax = [$_POST['min'], $_POST['max']];   //Assignation de min/max dans un tableau pour les passer à la requete
                        if (isset($_POST['count']))
                        {
                            $doCount = true;
                        } else
                        {
                            $doCount = false;
                        }
                        $req = 'SELECT * FROM biere WHERE TauxAlcool BETWEEN ? AND ?';
                        $idRequete = executerequete(connection(), $req, $minmax);   //Envoie de la requête (executerequete.php, connection()->connection.php)
                        afficherrequete($idRequete, $doCount);   //affichage de la requête (executerequete.php)


                    }
                } else
                {
                    $req = 'SELECT * FROM biere';
                    $cnx = connection();
                    $idRequete = $cnx->query($req);
                    //Envoie de la requête (executerequete.php, connection()->connection.php)
                    afficherrequete($idRequete, true);
                }
            }
            ?>
            <form method="post" action="sProgramme.php">
                <label>Minimum <input type="number" name="min"/></label>
                <label>Maximum <input type="number" name="max"/></label>
                <label>Afficher le compte? <input type="checkbox" name="count"/></label>
                <input type="submit" name="btn_choix"/>
            </form>
        </div>


    </div>


</div>


</body>

</html>


