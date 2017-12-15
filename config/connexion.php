<?php
include('parameters.php');

try
{
  $bdd = new PDO("mysql:host=$serverName;dbname=$databaseName;charset=utf8", "$user", "$password");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
