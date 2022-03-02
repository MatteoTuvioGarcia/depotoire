<?php
$instruments = [
    "les familles d'instruments"=>[
        "par defaut, la notion multidimentsionnelle",
    ],
   "cordes"=>[
"violon","alto","violoncelle",
    ],
    "bois"=>[
        "sax soprano","sax alto","sax tenor","sax baryton",
    ],
];
foreach($instruments as $x){

    foreach ($x as $detail){

        echo $detail."<br>";
    }
}