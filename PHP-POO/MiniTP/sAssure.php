<?php
//appel de la classe assuré
require_once "assure.php";
//création d'une instance de classe
$objPierre = new Assure("Pierre", "Déols", 22);
$objJulie = new Assure("Julie", "Paris", 21);

$objPierre->reglerassurance();
$objPierre->parrainer($objJulie);

$objJulie->avoiraccident();
$objJulie->reglerassurance();
$objPierre->setPointsFidelite(20);
$objPierre->setBonusmalus(20);
$objPierre->reglerassurance();
echo $objPierre->getPointsFidelite() . " " . $objPierre->getBonusMalus() . "<br>";
echo $objJulie->getPointsFidelite() . " " . $objJulie->getBonusMalus();
