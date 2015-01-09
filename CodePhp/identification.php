<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/> 
	<title> Connexion </title>
</head>
<body>

	<h1> Connexion </h1>

	<?php
	
			// Connexion a la base de donnée et Session 
		
		require_once('connexion.php'); 
		session_start(); 
	
			// On inclut les autres fichiers 
		
		include('constantes.php');
		include('fonctions.php'); 
		 
		 
			// On vérifie aussi que le visiteur n'est pas connecté 
		if (!isset($_POST['utilisateur']))
		{
				// Enfiiiiin viens le formulaire !!!!
				
				echo ' 
					
					<form method="post" action= "identification.php">
					<p>
					<label for="utilisateur"> Utilisateur : </label> <input name="utilisateur" type="text" id="utilisateur"/> <br />
					<label for="password"> Mot de Passe : </label> <input name="password" type="password" id="password"/> <br />
					<input type="submit" value="Connexion" /> <br />
					</form>
					</p>
				
				';
		
					
				
		}
		
		else 
		{       $message; 
		
			// On vérifie que les deux champs sont pleins 
			if(empty($_POST['utilisateur']) || empty($_POST['password']))
				{
					$message = '<p> Vous devez remplir tous les champs </p>
					<p> <a href="identification.php"> Recommencez ici </a> <p>'; 
				}
			//Si oui on vérifie le mdp
			else 
				{	// Requête
					$req=$db->prepare('SELECT id, mdp,nom,prenom FROM connexion WHERE nom = :utilisateur'); 
					$req->bindValue(':utilisateur',$_POST['utilisateur']); 
					$req->execute(); 
					$data=$req->fetch(PDO::FETCH_ASSOC);
					
					//On vérifie que l'utilisateur existe dans la base de donnée !!
					
					if( empty($data))
					{
						$message = 'Le nom d\'utilisateur est incorrect'; 
					}
					else //Si il existe
					{
					
						// OK :)
						if($data['mdp']== $_POST['password'] )
						{
							// Il faut enregistrer(c'est comme ça qu'on écrit ça ?) nos ptites données 
						
							$_SESSION['utilisateur']=$data['nom']; 
							$_SESSION['prenom']=$data['prenom'];
							$_SESSION['id']=$data['id'];
						
							// On personnalise un peu :p ! 
						
							$message = '<p> Bienvenue '.$data['nom'].' '.$data['prenom'].'</p>'; 
						
							// Et la qu'est ce qu'on fait ???
						
						}
					
						// PAS OK :(
						else
						{
							$message = '<p> Le mot de passe est incorrect.<br />
							<a href="identification.php">Réessayez !</a></p>'; 
						}
					

					}
				}
			
		
			echo '<p>'.$message.'<p>'; 
		}	
	?>

</body>
</html>