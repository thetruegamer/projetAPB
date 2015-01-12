<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="deconnexion.css">

<title>Deconnexion</title>

<img src="logo-apb.jpg"> 
<img class="Logo" src="logo-ministere.jpg"> 


</head>

<div id="hmenu"> 
<ul> 
 
  <li><a href="index.php">Accueil</a></li> 
</ul>   
</div>

<body>

<?php
	session_start(); 
	session_destroy(); // On Supp les data !!
	//include('constantes.php');
	//include('fonctions.php'); 
		
	//On informe les gens 
		
		echo'<center><p> Vous êtes déconnecté <br /></p></center>';
		
		
		
	/*  Que fait on maintenant ???? 
		 -> :S je sais paaas !!!
	*/


?>

</html>