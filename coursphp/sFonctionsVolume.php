<?php

function conevol ($volume):float{
    return round(0.33333333333*$volume,2);
}


function cylindrevol($rayon,$hauteur,$transCone = false): float
{
    $volume = round(pi()*pow($rayon,2)*$hauteur,5);
    if($transCone == true){
        return conevol($volume);
    }else {
        return $volume;
    }
}

if (isset($_POST['btnconfirm'])){
    $hauteur = $_POST['hauteur'];
    $radius = $_POST['radius'];
    if($hauteur<0||$radius<0){
        echo "Merci d'entrer des valeurs positives, enculé.";
    }else{
        if(isset($_POST['cone'])){
            echo 'le volume du cone est de: '.cylindrevol($radius,$hauteur,true);
        }else{
            echo 'le volume du cylindre est de: '.cylindrevol($radius,$hauteur);
        }

    }

}

?>
<form action="sFonctionsVolume.php" method="post">
    <label >Entrez le radius <input type="number" name="radius" value='1'/></label>
    <label >Entrez la hauteur <input type="number" name="hauteur" value='1'/></label>
    <label>Est-ce un cone? <input type="checkbox" name="cone[]" /></label>
    <input type="submit" name="btnconfirm" value="Envoyer"/>
</form>
