<?php
if(isset($a)){
    echo "a est initialisee(isset)";
}else{
    echo "a n'existe pas(isset).";
}
echo '<br>';
if(empty($a)){
    echo "a n'existe pas(empty)";
}else{
    echo "a existe.(empty)";
}
echo '<br>'."a = 16".'<br>';
$a = 16;
if(isset($a)){
    echo "a est initialisee(isset)";
}else{
    echo "a n'existe pas(isset).";
}
echo '<br>';
if(empty($a)){
    echo "a n'existe pas(empty)";
}else{
    echo "a existe.(empty)";
}
echo '<br>'."a = 0".'<br>';
$a = 0;
if(isset($a)){
    echo "a est initialisee(isset)";
}else{
    echo "a n'existe pas(isset).";
}
echo '<br>';
if(empty($a)){
    echo "a n'existe pas(empty)";
}else{
    echo "a existe.(empty)";
}
echo '<br>'."a = null".'<br>';
if(isset($a)){
    echo "a est initialisee(isset)";
}else{
    echo "a n'existe pas(isset).";
}
echo '<br>';
if(empty($a)){
    echo "a n'existe pas(empty)";
}else{
    echo "a existe.(empty)";
}
echo '<br>'."a = null+unset".'<br>';
$a=16;
unset($a);
if(isset($a)){
    echo "a est initialisee(isset)";
}else{
    echo "a n'existe pas(isset).";
}
echo '<br>';
if(empty($a)){
    echo "a n'existe pas(empty)";
}else{
    echo "a existe.(empty)";
}