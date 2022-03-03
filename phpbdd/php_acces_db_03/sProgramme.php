
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

//import des scripts
            if(isset($_POST['btn_choix'])) {
                require_once 'include/infoconnection.php';
                require_once 'include/connection.php';
                require_once 'include/executerequete.php';
            $min = $_POST['min'];
            $max=$_POST['max'];
            $cnx=connexion();
            $idRequete=executerequete($cnx,[$min,$max]);
                while($row = $idRequete->fetch(PDO::FETCH_ASSOC)){
                    echo $row['id_auteur'] . ' / ' . $row['nom'] . '<br>';
                }
            // 6 - Fermeture de la connexion
            $cnx = null;
            }
            ?>
        <form method="post" action="sProgramme.php">
            <input type="number" name="min"/>
            <input type="number" name="max"/>
            <input type="submit" name="btn_choix"/>
        </form>
        </div>


    </div>


</div>


</body>

</html>

