<?php
//appel de la classe assuré
require_once "assure.php";
//création d'une instance de classe
$objPierre = new Assure("Pierre","Déols",22);
$objJulie = new Assure("Julie","Paris",21);
$objPierre->reglerassurance();
$objPierre->avoiraccident();
$objJulie->reglerassurance();
$objPierre->parrainer($objJulie);
echo "avant règlement(Pierre): " . $objPierre->getBonusMalus()."<br>";
echo "avant règlement(Julie): " . $objJulie->getBonusMalus()."<br>";
//Appel de méthode dans classe Assure
$objPierre->reglerassurance();

//Renvoie grâce à la méthode getBonusMalus définie dans classe Assure
echo "après règlement(Pierre)+4: " . $objPierre->getBonusMalus() . "<br>";
echo "après règlement(Julie)+4: " . $objJulie->getBonusMalus() . "<br>";

//Test de fonction à instance d'objets multiples (Julie et Pierre)
$objPierre->parrainer($objJulie);
echo "après Parrainage(Pierre->Julie)+4/+10: " . $objJulie->getBonusMalus() . "<br>";
//Affection de la propriété de classe par fonction setBonusMalus
//$objJulie->setBonusmalus(10);
//$objPierre->setBonusmalus(10);
echo "après setBonusmalus +10(Pierre): " . $objPierre->getBonusMalus() . "<br>";
echo "après setBonusmalus +10(Julie): " . $objJulie->getBonusMalus() . "<br>";

//Affectation de la propriété de classe par fonction setNom
$objPierre->setNom("Pierre");
echo $objPierre->getNom()."<br>";

//Affectation de la propriété de classe par fonction setAge
$objPierre->setAge(12);
echo "age de Pierre: ".$objPierre->getAge()." ans"."<br>";
//Affectation de la propriété de classe par fonction setBonusmalus
$objPierre->setBonusmalus(5);
echo "bonusmalus de Pierre: ".$objPierre->getBonusMalus()."<br>";
//Affectation de la propriété de classe par fonction setdomicile
$objPierre->setDomicile("Déols");
echo "Domicile de Pierre: ".$objPierre->getDomicile();
