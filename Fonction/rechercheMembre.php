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
?>




<?php
function AfficherMembre($req, $resp)
{
	$connexion = connexion();

	if ($resp=='oui')
	{
		$resultat = mysqli_query($connexion, $req);

		if ($resultat)
		{

			?>
			<center><table>
			<caption>Volontaire responsable d'une buvette</caption>
			<thead>
				<tr>
					<th>Id du volontaire</th>
					<th>Nom</th>
					<th>Age</th>
					<th>Date de participation</th>
					<th>Heure début</th>
					<th>Heure fin</th>
					<th>Nom buvette</th>
					<th>Emplacement</th>
					<th>Responsable combien de fois</th>
					<th>Total participations</th>
				</tr>
			</thead>

			<?php

			while ($volontaire = mysqli_fetch_array($resultat))
			{
				echo "<tr>
							<td>"
							. $volontaire["idV"]."
							</td>

							<td>"
							. $volontaire["nomV"]."
							</td>

							<td>"
							. $volontaire["age"]."
							</td>

							<td>"
							. $volontaire["date"]."
							</td>

							<td>"
							. $volontaire["hdeb"]."
							</td>

							<td>"
							. $volontaire["hfin"]."
							</td>

							<td>"
							. $volontaire["nomB"]."
							</td>

							<td>"
							. $volontaire["emplacement"]."
							</td>

							<td>"
							. $volontaire["Count_nbFoisResp"]."
							</td>

							<td>"
							. $volontaire["Count_nbParticipation"]."
							</td>
					  </tr>";
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
	}

	else if ($resp=='non')
	{

		$resultat = mysqli_query($connexion, $req);

		if ($resultat)
		{

			?>
			<center><table>
			<caption>Volontaire non responsable d'une buvette</caption>
			<thead>
				<tr>
					<th>Id du volontaire</th>
					<th>Nom</th>
					<th>Age</th>
					<th>Date de participation</th>
					<th>Heure début</th>
					<th>Heure fin</th>
					<th>Nom buvette</th>
					<th>Emplacement</th>
					<th>Total participations</th>
				</tr>
			</thead>

			<?php

			while ($volontaire = mysqli_fetch_array($resultat))
			{
				echo "<tr>
							<td>"
							. $volontaire["idV"]."
							</td>
							
							<td>"
							. $volontaire["nomV"]."
							</td>

							<td>"
							. $volontaire["age"]."
							</td>

							<td>"
							. $volontaire["date"]."
							</td>

							<td>"
							. $volontaire["hdeb"]."
							</td>

							<td>"
							. $volontaire["hfin"]."
							</td>

							<td>"
							. $volontaire["nomB"]."
							</td>

							<td>"
							. $volontaire["emplacement"]."
							</td>

							<td>"
							. $volontaire["Count_nbParticipation"]."
							</td>
					  </tr>";
			}

			?>
			</table></center>		
			<?php
		}

	}

	mysqli_close($connexion);
}
?>
