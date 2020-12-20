<?php
function connexion()
{
	require("./connect.php"); /* inclusion du fichier */
	$conn = @mysqli_connect(SERVEUR, NOM, PASSE); /*essaie d'établir une connexion à la BDD */
	if (!$conn)
	{
		echo "Désolé, connexion à ".SERVEUR." impossible<br/>";
	}

	if (!@mysqli_select_db($conn, BD))
	{
		echo "Désolé, accès à la base ".BD." impossible<br/>";
		exit;
	}
	return $conn;
}


/* ---------TP5--------- */


function InsererVolontaire($id, $nom, $age)
{
	
	$connexion = @connexion();

	$insertion = "INSERT INTO volontaire
				VALUES (".$id.", ".$nom.", ".$age.");";

	$resultat = mysqli_query($connexion, $insertion);


	if($resultat)
		echo "Insertion du volontaire ".$nom." réussi !"; 
	else
	{
		echo "<em>Erreur dans l'exécution de la requête.</em><br/>";
		echo "<em>Message de MySql : </em>".mysqli_error($connexion);
	}

	mysqli_close($connexion);

}


function Modifier($id, $nom, $age)
{
	
	$connexion = @connexion();

	$insertion = "INSERT INTO volontaire
				VALUES (".$id.", ".$nom.", ".$age.");";

	$resultat = mysqli_query($connexion, $insertion);
	if($resultat)
		echo "Insertion du volontaire ".$nom." réussi !"; 
	else
	{
		echo "<em>Erreur dans l'exécution de la requête.</em><br/>";
		echo "<em>Message de MySql : </em>".mysqli_error($connexion);
	}

	mysqli_close($connexion);
}

?>