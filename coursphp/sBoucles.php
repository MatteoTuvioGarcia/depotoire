<?php
$i=0;
while ($i < 8){
    echo pow(2,$i)." ";
    $i++;
}
echo" || ";
$i=0;
do {
    echo pow(2,$i)."<br>";
    $i++;
} while ($i<8);