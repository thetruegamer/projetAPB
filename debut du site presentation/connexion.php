<?php // Fichier de connexion a la base de donnée 


try{
	$db = new PDO('mysql:host=localhost; dbname=projet', 'root', ''); 
	$db->query('SET NAMES utf8');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
catch(PDOException $e){
	
	die('Erreur connexion : '.$e->getMessage()); 
	}

?>