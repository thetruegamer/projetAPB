<?php

$login = 'root'; 
//$motDePasse = '';

try
{
	$bd = new PDO('mysql:host=localhost;dbname=toast', $login);
	$bd->query('SET NAMES utf8');
	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
	die('<p> La connexion a échoué. Erreur[' .$e->getCode().'] : ' .$e->getMessage() . '</p>');
}