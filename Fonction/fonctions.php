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


/* Fonctions pour afficher les tables */

function artiste()
{
	$connexion=@connexion();

	$requete="SELECT *
			FROM artiste;";

	$resultat = mysqli_query($connexion, $requete);

	if ($resultat)
	{
		?>
		<center><table>
		<caption>Artiste</caption>
		<thead>
			<tr>
				<th>Id de l'artiste</th>
				<th>Nom de l'artiste</th>
				<th>Genre musical</th>
				<th>Image </th>
			</tr>
		</thead>

		<?php
		while($artiste = mysqli_fetch_array($resultat))
		{
			echo "<tr>

					<td>"
						.$artiste["idA"]."
					</td>

					<td>"
						.$artiste["nomA"]."
					</td>

					<td>"
						.$artiste["genre"]."
					</td>

					<td>
						<figure>
							<img src=".$artiste["chImage"]." alt='Photo de ".$artiste["nomA"]."' height='100'>
						</figure>
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

	mysqli_close($connexion);
}



function buvette()
{
	$connexion=@connexion();

	$requete="SELECT *
			FROM buvette;";

	$resultat = mysqli_query($connexion, $requete);

	if ($resultat)
	{
		?>
		<center><table>
		<caption>Buvette</caption>
		<thead>
			<tr>
				<th>Id de la buvette</th>
				<th>Nom de la buvette</th>
				<th>Emplacement</th>
				<th>Id du responsable</th>
			</tr>
		</thead>

		<?php

		while($buvette = mysqli_fetch_array($resultat))
		{
			echo "<tr>

					<td>"
						.$buvette["idB"]."
					</td>

					<td>"
						.$buvette["nomB"]."
					</td>

					<td>"
						.$buvette["emplacement"]."
					</td>

					<td>"
						.$buvette["responsable"]."
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

	mysqli_close($connexion);
}


function soiree()
{
	$connexion=@connexion();

	$requete="SELECT *
			FROM soiree;";

	$resultat = mysqli_query($connexion, $requete);

	if ($resultat)
	{
		?>
		<center><table>
		<caption>Soiree</caption>
		<thead>
			<tr>
				<th>Id de la soiree</th>
				<th>Date de la soiree</th>
				<th>Id artiste en première partie</th>
				<th>Id artistte en tête d'affiche </th>
			</tr>
		</thead>

		<?php

		while($soiree = mysqli_fetch_array($resultat))
		{
			echo "<tr>

					<td>"
						.$soiree["idS"]."
					</td>

					<td>"
						.$soiree["date"]."
					</td>

					<td>"
						.$soiree["premPartie"]."
					</td>

					<td>"
						.$soiree["teteAffiche"]."
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

	mysqli_close($connexion);
}



function volontaire()
{
	$connexion=@connexion();

	$requete="SELECT *
			FROM volontaire;";

	$resultat = mysqli_query($connexion, $requete);

	if ($resultat)
	{
		?>
		<center><table>
		<caption>Volontaire</caption>
		<thead>
			<tr>
				<th>Id du volontaire</th>
				<th>Nom du volontaire</th>
				<th>Age</th>
			</tr>
		</thead>

		<?php

		while($volontaire = mysqli_fetch_array($resultat))
		{
			echo "<tr>

					<td>"
						.$volontaire["idV"]."
					</td>

					<td>"
						.$volontaire["nomV"]."
					</td>

					<td>"
						.$volontaire["age"]."
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

	mysqli_close($connexion);
}

?>
