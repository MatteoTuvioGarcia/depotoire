<?php
function quick_sort($arr)
{
    if(count($arr) <= 1){
        return $arr;
    }
    else{
        $pivot = $arr[0];
        $left = array();
        $right = array();
        for($i = 1; $i < count($arr); $i++)
        {
            if($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }
            else{
                $right[] = $arr[$i];
            }
        }
        return array_merge(quick_sort($left), array($pivot), quick_sort($right));
    }
}

if (isset($_POST['btn_array'])){
    $max = $_POST['max'];
    if ($max<0){
        echo "La longueur du tableau ne peut pas être inférieure à 0.";
    }else{
        $tablo = [];
        $i = 0;
        while ($i <=$max){
            $tablo[$i] = mt_rand(0,100);
            $i++;
        }
        var_dump($tablo);
        echo "<br><br><br>";

        var_dump(quick_sort($tablo));

    }
}
?>
<form action="sFonctionReferenceTri.php" method="post">
    <label for="tva">Entrez la longueur de tableau <input type="number" name="max" value="0"/></label>
    <input type="submit" name="btn_array" value="Envoyer"/>
</form>
