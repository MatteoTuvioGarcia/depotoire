<?php
//appel de la classe assuré et des modules de connection bdd
require_once "assure.php";
require_once "include/infoconnection.php";
require_once "include/executerequete.php";
require_once "include/connection.php";
require_once "gererAssurer.php";
$cnx = connection();
$gerer = new gererAssure($cnx);
$gerer->getListAssure();
var_dump($gerer->getListAssure());


//création d'une instance de classe

