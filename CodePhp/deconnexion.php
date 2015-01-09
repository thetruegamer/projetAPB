<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8"/>
	<title> Deconnexion <title>
	
</head>

<body>

<?php
	session_start(); 
	session_destroy(); // On Supp les data !!
	include('constantes.php');
	include('fonctions.php'); 
		
	//On informe les gens 
		
		echo'<p> Vous êtes déconnecté <br /></p>'; 
		
	/*  Que fait on maintenant ???? 
		 -> :S je sais paaas !!!
	*/


?>

</html>
