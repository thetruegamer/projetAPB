<?php
require_once('connection.php'); // connexion à la BDD
include 'PHPExcel.php'; // on a besoin de IOFactory dans la librairie PHPExcel

// si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0)
{
	echo" si c'est une extension autorisée<br>";
	$infosfichier = pathinfo($_FILES['fichier']['name']);
	$extension_upload = $infosfichier['extension'];
	$extensions_autorisees = array('xls', 'xlsx', 'ods');
	if (in_array($extension_upload, $extensions_autorisees)) // si tout va bien
	{
		echo "tout va bien<br>";
		//on chope le chemin du fichier pour que PHPExcel puisse travailler
		$fichierImporte = $_FILES['fichier']['tmp_name'];
	}
}
else
{
	echo "Erreur lors de l'importation du fichier <br>";
	print_r($_FILES);
	exit;
}
 
try
{
	echo "on va charger<br>";
	$objPHPExcel = PHPExcel_IOFactory::load($fichierImporte); // la magie de phpExcel
	echo "c'est chargé<br>";
} 
catch(Exception $e)
{
	die('Error loading file "'.pathinfo($fichierImporte,PATHINFO_BASENAME).'": '.$e->getMessage());
}

$j=0;
echo "ca bug pas lol num 1";
$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true); // on se met sur la bonne feuille ( la première en l'occurrence )
echo "ca bug pas lol num2";
$arrayCount = count($allDataInSheet);  // on a le nombre de colonnes remplies 

for($i=2;$i<=$arrayCount;$i++) // tant qu'il y a des colonnes remplies
{
	echo "ca bug pas lol";
	$numero=trim($allDataInSheet[$i]["B"]); // la ligne numéro "i" de la colonne "A" est stockée dans monNom
	//$nom=trim($allDataInSheet[$i]["D"]);
	//$prenom=trim($allDataInSheet[$i]["E"]);
	//$sexe=trim($allDataInSheet[$i]["G"]);
	//$dateNaissance=trim($allDataInSheet[$i]["H"]);

	$test=$bd->prepare('SELECT * FROM importationFI WHERE numero=:numero');
	$test->bindValue(':numero',$numero);
	$test->execute();
	$verdict = $test->fetch();

	if ( $numero == $verdict['numero'] )
	{
		echo "<br>";
	}
	else
	{
		//$req= $bd->prepare('INSERT INTO importationFI (numero, nom, prenom, sexe, dateNaissance) values(:numero, :nom, :prenom, :sexe, :dateNaissance)');
		$req= $bd->prepare('INSERT INTO importationFI (numero) values(:numero)');

		$req->bindValue(':numero',$numero);
		/*$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':sexe',$sexe);
		$req->bindValue(':dateNaissance',$dateNaissance);*/
		$req->execute();
		$j++;
		echo "insertion n°" .$j."<br>";
	}
} // fin boucle
echo "Total d'insertions :" . $j;
?>