<?php
//appel de la classe assuré
require_once "assure.php";
//création d'une instance de classe
$objPierre = new Assure();
$objJulie = new Assure();
echo "avant règlement(Pierre): " . $objPierre->getBonusMalus() . "<br>";
echo "avant règlement(Julie): " . $objJulie->getBonusMalus() . "<br>";
//        //Appel de méthode dans classe Assure
$objPierre->reglerassurance();
//        //Renvoie grâce à la méthode getBonusMalus définie dans classe Assure
echo "après règlement(Pierre): " . $objPierre->getBonusMalus() . "<br>";
echo "après règlement(Julie): " . $objJulie->getBonusMalus() . "<br>";
$objPierre->parrainer($objJulie);
echo "après Parrainage(Julie): " . $objJulie->getBonusMalus() . "<br>";
