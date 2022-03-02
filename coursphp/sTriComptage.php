<?php
$tablo = [1,5,2,1,27];
echo count($tablo)."<br>";

sort($tablo);
foreach ($tablo as $x) {
    echo $x . "<br>";
}
echo rsort($tablo)."<br>";