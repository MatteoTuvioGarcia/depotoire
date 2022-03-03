<?php
if (isset($_POST['btn_calculer'])) {
    $tva = $_POST['TVA'] / 100;
    $mtn = $_POST['montant'];
    $calc = 0;
    if ($mtn < 0 || $tva < 0) {
        echo "Merci d'entrer des valeurs supérieures à 0, enculé.";
    } else {
        $calc = $mtn + ($mtn * $tva);
        echo 'le montant est de: $' . $calc;
    }
}





?>
<form action="sFonctionTva.php" method="post">
    <label for="tva">Entrez le montant <input type="number" name="montant" value="0"/></label>
    <label for="tva">Entrez la TVA (en %) <input type="number" name="TVA" value='20'/></label>
    <input type="submit" name="btn_calculer" value="Envoyer"/>



</form>
