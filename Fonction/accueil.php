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


/* ---------TP1--------- */


function AfficherSoiree($idS, $date, $premPartie, $teteAffiche)
{
	
	$connexion = @connexion();

	$requete = "SELECT *, COUNT(DISTINCT o.idB) AS Count_NbBuvettes, COUNT(DISTINCT p.idV) AS Count_NbVolontaire
				FROM artiste a, est_ouverte o, est_present p, soiree s
				WHERE s.ids=".$idS."
                	AND (s.premPartie=a.idA OR s.teteAffiche=a.idA)
					AND o.idS=s.ids
			    	AND p.idS=s.ids
			    	AND o.ids=p.ids
				Group by a.idA;";

	/* execution de requête */
	$resultat = mysqli_query($connexion, $requete);

	if ($resultat)
	{
		?>
		<center><table>
			<caption>Programme pour la soirée du <?php echo $date ; ?></caption>
			<thead>
				<tr>
					<th>
					<th>Nom</th>
					<th>Genre musical</th>
					<th>Image</th>
					<th>Nombre de buvettes ouvertes</th>
					<th>Nombre de volontaires</th>
				</tr>
			</thead>

		<?php

		$txt="En première partie";

		while ($artiste = mysqli_fetch_array($resultat))
		{
			echo "<tr>

						<td>"
						. $txt."
						</td>

						<td>"
						. $artiste["nomA"]."
						</td>

						<td>"
						. $artiste["genre"]."
						</td>

						<td>
							<figure>
								<img src=".$artiste["chImage"]." alt='Photo de ".$artiste ["nomA"]."' height='100'>
							</figure>
						</td>

						<td>"
						. $artiste["Count_NbBuvettes"]."
						</td>

						<td>"
						. $artiste["Count_NbVolontaire"]."
						</td>

				  </tr>";

			$txt="En tête d'affiche";
		}

		?>
		</table></center>

		<?php
	} 
	else
	{
		echo "<em>Erreur dans l'exécution de la requête.</em><br/>";
		echo "<em>Message de MySql : </em>".mysqli_error($connexion);
	}

	mysqli_close($connexion);
}
?>

