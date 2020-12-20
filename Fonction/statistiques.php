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

<!-- ---------TP2--------- -->

<!-- Fonction affichant les volontaires les plus présents -->

<?php
function TopVolontaires($date)
{

	
	$connexion=connexion();

	$req = 'SELECT *, COUNT(p.idV) AS Max_Participation
							FROM volontaire v, est_present p, soiree s
							WHERE v.idV=p.idV
								AND p.idS=s.idS
								AND s.date="'.$date.'"
							GROUP BY p.idv;';

	$resultat = mysqli_query($connexion, $req);


	if ($resultat)
	{
		?>
		<center><table>
		<caption>Liste des volontaires les plus présents à la soirée du <?php echo $date ?></caption>
		<thead>
			<tr>
				<th>Nom du volontaire</th>
				<th>Age</th>
				<th>Nombre de participations</th>
			</tr>
		</thead>

		<?php

		while ($volontaire = mysqli_fetch_array($resultat))
		{
			echo "<tr>
						<td>"
						. $volontaire["nomV"]."
						</td>

						<td>"
						. $volontaire["age"]."
						</td>

						<td>"
						. $volontaire["Max_Participation"]."
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



<!-- Fonction affichant les buvettes mobilisants le plus de volontaires -->

<?php
function TopBuvettes($date)
{

	/* execution de requête */
	$connexion=@connexion();

	$req = 'SELECT *, COUNT( p.idV) AS Max_Participants
							FROM est_present p, buvette b, soiree s
							WHERE p.idB=b.idB
								AND p.ids=s.idS
								AND s.date="'.$date.'"
							GROUP BY p.idB 
							ORDER BY Max_Participants DESC ;';
	
	$resultat = mysqli_query($connexion, $req);
		
	if ($resultat)
	{
		?>
		<center><table>
			<caption>Les buvettes les plus actives lors de la soirée du <?php echo $date; ?></caption>
			<thead>
				<tr>
					<th>Nom de la buvette</th>
					<th>Emplacement</th>
					<th>Nombre de participants</th>
				</tr>
			</thead>
		<?php

		while ($buvette = mysqli_fetch_array($resultat))
		{
			echo "<tr>
						<td>"
						. $buvette["nomB"]."
						</td>

						<td>"
						. $buvette["emplacement"]."
						</td>

						<td>"
						. $buvette["Max_Participants"]."
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



<!-- Fonction affichant les buvettes ouvertes et les volontaires présents lors d'une soirée -->

<?php
function StatSoiree($date)
{
	$connexion=@connexion();

	$requeteSoiree = 'SELECT DISTINCT *
				  FROM  est_ouverte o, est_present p, volontaire v, soiree s, buvette b
				  WHERE o.idb=p.idb
					  AND o.idb=b.idb
                      and o.idS=p.ids
                      ANd p.ids=s.ids
                      AND p.idV=v.idV
					  AND s.date="'.$date.'"
				  ORDER BY o.idB ASC;';

	$resultat = mysqli_query($connexion, $requeteSoiree);

	if ($resultat)
	{
		?>
		<center><table>
			<caption>Liste des buvettes ouvertes et volontaires présents lors de la soirée <?php echo $date; ?></caption>
			<thead>
				<tr>
					<th>Id soirée</th>
					<th>Date</th>
					<th>Id buvette</th>
					<th>Buvette ouverte</th>
					<th>Emplacement</th>
					<th>Id responsable</th>
					<th>Id volontaire</th>
					<th>Nom</th>
					<th>Age</th>
					<th>Heure début</th>
					<th>Heure fin</th>
					<th>Present(e) dans buvette n° :</th>
				</tr>
			</thead>

		<?php

		while ($soiree = mysqli_fetch_array($resultat))
		{
			echo "<tr>
						<td>"
						. $soiree["idS"]."
						</td>

						<td>"
						. $soiree["date"]."
						</td>

						<td>"
						. $soiree["idB"]."
						</td>

						<td>"
						. $soiree["nomB"]."
						</td>

						<td>"
						. $soiree["emplacement"]."
						</td>

						<td>"
						. $soiree["responsable"]."
						</td>

						<td>"
						. $soiree["idV"]."
						</td>

						<td>"
						. $soiree["nomV"]."
						</td>

						<td>"
						. $soiree["age"]."
						</td>

						<td>"
						. $soiree["hdeb"]."
						</td>

						<td>"
						. $soiree["hfin"]."
						</td>

						<td>"
						. $soiree["idB"]."
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


