<?php
function poidsImage($largeur,$hauteur){
    $poids = round(((($largeur * $hauteur)*3)/1024)/1024,2);
    return $poids;
}
if (isset($_POST['btn_imaj'])){
    $larg = $_POST['largeur'];
    $haut = $_POST['hauteur'];
    if($larg < 0 || $haut < 0){
        echo "Merci d'entrer des valeures positives.";
    }else{
        echo poidsImage($larg,$haut)."MO";
    }
}

?>
<form action="sFonctionPoidsImage.php" method="post">
    <label for="tva">Entrez la hauteur <input type="number" name="hauteur" value="0"/></label>
    <label for="tva">Entrez la largeur <input type="number" name="largeur" value='0'/></label>
    <input type="submit" name="btn_imaj" value="Envoyer"/>



</form>
