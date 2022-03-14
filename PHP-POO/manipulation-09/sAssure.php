<?php
require_once "assure.php";
require_once "Societaire.php";
const BR = "<br>";
$pierre = new Assure([
    'nom' => 'Pierre',
    'age' => 13,
    'domicile' => 'Chateauroux'
]);

$jean = new Societaire([
    'nom' => 'Jean',
    'age' => 12,
    'domicile' => 'Chateauroux'
]);
$jean->reglerassurance();
echo "Facilité de paiement: ".$jean->getFacilitePaiement() . " Fois";
