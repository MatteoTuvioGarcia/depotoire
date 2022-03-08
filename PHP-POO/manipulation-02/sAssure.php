<?php
//appel de la classe assuré
require_once "assure.php";
//création d'une instance de classe
$objAssure = new Assure();
echo "cette variable est de type: " . gettype($objAssure) . "<br>";
var_dump($objAssure);
echo "<br>";
echo $objAssure->age = 45;
echo "<br>";
echo $objAssure->parrainer();