<?php
function connection()
{
    return new PDO('mysql:host=' . SERVEUR . ';dbname=' . BASEDEDONNEES, UTILISATEUR, MOTDEPASSE, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}