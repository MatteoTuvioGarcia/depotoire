<!DOCTYPE html>
<html lang="fr">
<head>

    <title>Intro PHP</title>
    <meta charset="utf-8">
</head>
<body>
<?php
//Les structures conditionnelles

//Les alternatives
// if($a>$b){1 ou n instructions}
$tester = 3;
switch($tester){
    case 1:
        echo 1;
        break;
    case 2:
        echo "eezezez";
        break;
  
}
echo "<br>";
/*
$condition = 1;
while ($condition<5){
    echo "<p>$condition </p>";
    $condition++;
}

//les tableaux

 * 2 types de tableaux
 * Numérique; Indice numérique, on commence à 0
 * Associatif: Nommer la clé
 */
$livre=[
        "prenom"=>"Billy",
        "nom"=>"Machin",
        "ville"=>"Paris",
];


foreach($livre as $x => $valeur){
    echo $x." ".$valeur."<br>";
    
}
$tabnul = [
        
]

var_dump($tabnul);

//traitement du formulaire
$message = "";
if (isset($_POST["texte"])) {
    $message = $_POST["texte"];
    printf('L\'utilisateur à tappé: ' . $message);
}
if (isset($_POST["mdp"])) {
    $mdp = $_POST["mdp"];
    echo 'votre mdp est: .' . $mdp . "<br>";
}

if (isset($_POST["type"])) {
    $type = $_POST["type"];
    echo 'votre type est: <strong>' . $type . "</strong><br>";
}

if (isset($_POST["btnpl"])) {
    // var_dump($_POST);
    $menu = $_POST["menu"];
    echo "Vous avez choisi: " . implode(', ', $menu);
}
if (isset($_POST["btncol"])) {
    $color = $_POST["couleur"];
    echo "Votre couleur préférée est: " . $color;
}

if (isset($_POST["btnfrui"])) {
    // var_dump($_POST);
    $fruit = $_POST["fruit"];
    echo "Vous avez choisi: " . implode(" ", $fruit);
}

if (isset($_POST["btnoeil"])) {
    $color = $_POST["yeux"];
    echo "Votre couleur d'yeux est: " . $color;
}

if (isset($_POST["btndate"])) {
    $date = $_POST["date"];
    echo "La date choisie est: " . $date;
}

if (isset($_POST["btntime"])) {
    $time = $_POST["sub"];
    echo "L'heure choisie est: " . $time;
}
?>
<form action="sFormulaire.php" method="post">
    <p>Saisir un mot:</p>
    <input type="text" name="texte" autofocus/>
    <input type="submit" name="btntxt" value="envoyer"/>
</form>

<form action="sFormulaire.php" method="post">
    <p>Saisir un mot de passe:</p>
    <input type="password" name="mdp" value=""/>
    <input type="submit" name="btnpw" value="envoyer pw"/>
</form>

<form action="sFormulaire.php" method="post">
    <p>Zone bouton radio</p>
    <p>De quelle type êtes vous?</p>
    <input type="radio" name="type" value="F"/>F<br>
    <input type="radio" name="type" value="M"/>M<br>
    <input type="radio" name="type" value=""/>non défini
    <input type="submit" name="btnty" value="envoyer type"/>
</form>

<form action="sFormulaire.php" method="post">
    <p>Zone checkbox</p>
    <p>Que souhaitez vous?</p>
    <input type="checkbox" name="menu[]" value="Entree" checked/>Entree<br>
    <input type="checkbox" name="menu[]" value="Plat"/>Plat<br>
    <input type="checkbox" name="menu[]" value="Dessert"/>Dessert<br>
    <input type="checkbox" name="menu[]" value="Café"/>Café<br>
    <input type="checkbox" name="menu[]" value="Whiskey"/>Whiskey
    <input type="submit" name="btnpl" value="envoyer plat"/>
</form>

<form action="sFormulaire.php" method="post">
    <p>Votre couleur préférée ?</p>
    <select name="couleur">
        <option value="">choisir</option>
        <option value="blanc">blanc</option>
        <option value="bleu">bleu</option>
        <option value="noir">noir</option>
        <option value="jaune">jaune</option>
    </select>
    <input type="submit" name="btncol" value="envoyer type"/>
</form>


<form action="sFormulaire.php" method="post">
    <p>Vos fruits préférés ?</p>
    <select name="fruit[]" multiple>
        <option value="">choisir</option>
        <option value="pomme">pomme</option>
        <option value="poire">poire</option>
        <option value="tomate">tomate</option>
        <option value="lapin">lapin</option>
    </select>
    <input type="submit" name="btnfrui" value="envoyer fruits"/>

    <form action="sFormulaire.php" method="post">
        <p>Vos fruits préférés ?</p>
        <textarea name="fruit[]"></textarea>


        <input type="submit" name="btnfrui" value="envoyer fruits"/>
    </form>

    <datalist id="coloreye">
        <option value="Blanc">
        <option value="Bleu">
    </datalist>

    <form action="sFormulaire.php" method="post">
        couleur de vos yeux:
        <input type="text" name="yeux" list="coloreye" placeholder="Saisir la couleur de vos yeux.."
               autocomplete="off"/>
        <input type="submit" name="btnoeil" value="envoyer yeux"/>
    </form>
    <form action="sFormulaire.php" method="post">

        <input type="date" id="date" name="party" min="1910-01-01" max="2050-04-30" step="5">
        <input type="submit" name="btndate" value="envoyer date"/>
    </form>
    <form action="sFormulaire.php" method="post">
        <input type="time" id="time" name="time" min="8:00" max="17:00" step=""/>
        <input type="range" id="range" name="range" min="0" max="120"/>
        <input type="number" id="range" name="range"/>
        <input type="email" id="range" name="range" required/>
        <input type="submit" name="btndate" value="envoyer date"/>
        <input type="color" name="btndate" value="envoyer date"/>
    </form>

</body>
</html>
