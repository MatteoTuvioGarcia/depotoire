<?php
//Procedure
//function
//method
/*
function somme($nb1,$nb2) {
return $nb1+$nb2;
}
echo somme(5,5);
*/

$var = true;
$nb1 = 5;
$nb2=10;
$nbnul = 3;
$nbnol = 4;
function multiplication($nb1,$nb2,$nb3=0,$nb4=1){
    $resultat = ($nb1+$nb2+$nb3)*$nb4;
    echo $resultat;
}

if($var){
    multiplication($nb1,$nb2);
}else{
    multiplication($nb1,$nb2,$nbnul,$nbnol);
}
echo "<br>";



function unefonction($a){
    $a = $a+12;
}
$resultat = 0;
unefonction($resultat);
echo $resultat;