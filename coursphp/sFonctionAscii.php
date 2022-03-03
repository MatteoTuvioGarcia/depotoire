<?php
function stringreverse($str):string
{
    $i=strlen($str)-1;
    $reverse = "";
 
    while ($i>=0){
        $reverse = $reverse.$str[$i];
        $i = $i -1;
    }
    return $reverse;
}


function binary2ascii($bin): int
{
    if (strlen($bin) <> 7) {
        echo "Mauvaise taille de tableau.";
        return "";
    } else {
        $bin = stringreverse($bin);
        $res = 0;
        $i = 0;
   
        while ($i < 7) {
            
            if ($bin[$i] == '1') {
                $res = $res + pow(2, $i);
            }
            $i++;
        }
    }
    return $res;
}
if (isset($_POST['btn_bits'])){
    $tst= $_POST['bits'];
    $int = binary2ascii($tst);
    echo chr($int);
}


?>
<form action="sFonctionAscii.php" method="post">
    <label >Entrez les 7 bits <input type="text" name="bits" value="0"/></label>
    <input type="submit" name="btn_bits" value="Envoyer"/>



</form>
