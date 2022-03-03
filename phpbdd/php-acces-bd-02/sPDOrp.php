<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Acces BD avec PDO</title>
</head>
<body>
<header>
    <p>Acces BD avec PDO</p>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php
            // Utilisation de PDO : PHP DATA OBJECT

            // 1 - Définition des informations de connexion
            define('SERVEUR', 'localhost');
            define('UTILISATEUR', 'root');
            define('MOTDEPASSE', '');
            define('BASEDEDONNEES', 'bibliotheque');

            // 2 - Ouverture de connexion
            $cnx = new PDO('mysql:host=' .SERVEUR. ';dbname='.BASEDEDONNEES,UTILISATEUR,MOTDEPASSE,array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
            $min = 1790;
            $max=1850;
            // 3 - Ecrire la requête de manière préparée
            $varQuery = 'SELECT * FROM auteur WHERE date_naissance BETWEEN ? AND ?';

            // 4 - preparation de la requête et retourne un identifiant de connexion
            $idRequete = $cnx->prepare($varQuery);
            // Execution de la requete avec les parametres
            $idRequete->execute([$min, $max]);
            // 5 - Lecture des informations retournées
            while($row = $idRequete->fetch(PDO::FETCH_ASSOC)){
                echo $row['id_auteur'] . ' / ' . $row['nom'] . '<br>';
            }

            // 6 - Fermeture de la connexion
            $cnx = null;

            ?>

        </div>


    </div>


</div>


</body>

</html>


