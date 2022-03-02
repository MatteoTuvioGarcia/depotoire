<?php
function poidsImage($largeur,$hauteur){
    $poids = ($largeur*$hauteur)*24;
    return round($poids/10000000,2);
}
echo poidsImage(1024,1024);