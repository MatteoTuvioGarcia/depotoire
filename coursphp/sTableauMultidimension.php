<?php
$tabMulti["ligne1"]["colonne1"]= "premiere ligne/premiere colonne";
$tabMulti["ligne1"]["colonne2"]= "premiere ligne/2eme colonne";
$tabMulti["ligne2"]["colonne1"]= "2eme ligne/premiere colonne";
$tabMulti["ligne2"]["colonne2"]= "2eme ligne/2eme colonne";

foreach ($tabMulti as $x){
    foreach($x as $i){
        echo $i."<br>";
    }
}

