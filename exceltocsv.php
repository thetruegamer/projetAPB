<?php
require_once('connection.php'); // connexion à la BDD
include 'PHPExcel.php'; // on a besoin de la librairie PHPExcel, placée dans le répertoire ou est exceltocsv.php 

set_time_limit(1000); // j'ai été obligé de faire ça, le fichier mettait plus de 30s à se charger ( 432 chez moi ). Oui c'est très long :s

$timestart=microtime(true); // pour calculer le temps d'éxécution


// si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0)
{
	// si c'est une extension autorisée
	$infosfichier = pathinfo($_FILES['fichier']['name']);
	$extension_upload = $infosfichier['extension'];
	$extensions_autorisees = array('xls', 'xlsx', 'ods');
	if (in_array($extension_upload, $extensions_autorisees)) // si tout va bien
	{
		//PHPExcel a juste besoin du chemin, on part du principe que l'excel est dans le répertoire du serveur donc le fichier peut rester dans la variable $_FILES
		$nomFichierImporte = $_FILES['fichier']['name'];
	}
}
 
try
{
	$identify = PHPExcel_IOFactory::identify($nomFichierImporte);
	$reader = PHPExcel_IOFactory::createReader($identify);
	$reader->setReadDataOnly(true);
	$excel = $reader->load($nomFichierImporte);

	$loadedSheetNames = $excel->getSheetNames(); // on récupère le nom de toutes les feuilles du fichier dans un tableau

	foreach ($loadedSheetNames as $key => $value) // et on les importe une par une
	{
		$reader->setLoadSheetsOnly($value);
		$writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
		$nom = $value.'.csv';
		$writer->setUseBOM(TRUE);
		$writer->save('csv/'.iconv("UTF-8", "ISO-8859-1//TRANSLIT", $nom)); // tous les csv sont sauvegardés dans un fichier CSV préalablement crée ( le iconv est pour le souci des accents : Windaube encode en ISO le vilain )
	}

	echo "Tout va bien, bravo </br>"; // message pour dire que tout s'est bien passé
 
}
catch(Exception $e)
{
	die('Error loading file "'.pathinfo($nomFichierImporte,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//Afficher le temps d'éxecution
$timeend=microtime(true);
$time=$timeend-$timestart;
$page_load_time = number_format($time, 3);
echo "Debut du script: ".date("H:i:s", $timestart);
echo "<br>Fin du script: ".date("H:i:s", $timeend);
echo "<br>Script execute en " . $page_load_time . " sec";

?>