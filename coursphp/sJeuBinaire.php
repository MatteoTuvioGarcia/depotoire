<?php
$saisie = 0;
if (isset($_POST["btnval"])) {
    $saisie = $_POST["value"];
}
if($saisie > 32){
    echo "Merci d'entrer une valeure inférieure à 32.";
}else{
    $val = 0;
    $tot = 0;

    for ($i = 0; $i < $saisie; $i++) {
        $val = pow(2, $i);
        echo $val . " "."<br>";
        $tot = $tot + $val;
    }

echo "<br>||Nombre de possibilités: "."<strong>".$tot."</strong>||";
}
?>
<form action="sJeuBinaire.php" method="post">
    <label for="value">Choisir un nombre <input type="number" name="value" value=1/></label>
    <input type="submit" name="btnval" value="Envoyer"/>
</form>
