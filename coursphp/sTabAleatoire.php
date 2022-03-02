<?php
$tablo[] = [];
for($i=0;$i<20;$i++){
    $tablo[$i]= mt_rand(-100,100);
    echo $tablo[$i]." ";
}