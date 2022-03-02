<?php
$i=1;
$rando=1;
while($rando <> 0){
    $rando= mt_rand(-15,15);
    if($rando == 0){
        break;
    }else{

    echo "$rando ";
    }
}