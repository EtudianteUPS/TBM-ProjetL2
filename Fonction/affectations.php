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


<!-- ---------TP4--------- -->


<?php
function AffecterVolResp($idb, $idv)
{
	
	$connexion=@connexion();

	$reqModifierTable='UPDATE Buvette
						SET responsable="'.$idv.'"
							WHERE idb="'.$idb.'";';
	$maj=mysqli_query($connexion, $reqModifierTable);

	$reqTable='SELECT *
				FROM Buvette
				WHERE idB="'.$idb.'";';

	$resultat = mysqli_query($connexion, $reqTable);
	
	if ($resultat)
	{

		?>
		<center><table>
			<caption>Le volontaire <?php echo $idv; ?> a été affecté en tant que responsable de la buvette <?php echo $idb; ?></caption>
			<thead>
				<tr>
					<th>Id de la buvette</th>
					<th>Nom de la buvette</th>
					<th>Son emplacement</th>
					<th>Id du responsable de la buvette</th>
				</tr>
			</thead>
		
		<?php

		while ($buvette = mysqli_fetch_array($resultat))
		{
			echo "<tr>
						<td>"
						. $buvette["idB"]."
						</td>

						<td>"
						. $buvette["nomB"]."
						</td>

						<td>"
						. $buvette["emplacement"]."
						</td>

						<td>"
						. $buvette["responsable"]."
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




<?php
function AffecterMemVol($idb, $idv, $ids)
{
	$connexion=@connexion();

	$reqModifierTable='UPDATE est_present
						SET idV="'.$idv.'"
							WHERE idB= "'.$idb.'"
									AND idS ="'.$ids.'";';
	$maj=mysqli_query($connexion, $reqModifierTable);
	
	$resultat = mysqli_query($connexion, $reqModifierTable);

	$reqTable='SELECT *
				FROM est_present
				WHERE idB="'.$idb.'"
						AND ids="'.$ids.'";';

	
	$resultat = mysqli_query($connexion, $reqTable);
	
	if ($resultat)
	{
		?>
		<center><table>
			<caption>Le membre <? echo $idv; ?> a été affecté à la buvette <?php echo $idb; ?> lors de la soiree <? echo $ids; ?></caption>
			<thead>
				<tr>
					<th>Id du volontaire</th>
					<th>Id de la buvette</th>
					<th>Id de la soirée</th>
					<th>Heure début</th>
					<th>Heure fin</th>
				</tr>
			</thead>

		<?php	

		while ($est_present = mysqli_fetch_array($resultat))
		{
			echo "<tr>
						<td>"
						. $est_present["idV"]."
						</td>

						<td>"
						. $est_present["idB"]."
						</td>

						<td>"
						. $est_present["idS"]."
						</td>

						<td>"
						. $est_present["hdeb"]."
						</td>

						<td>"
						. $est_present["hfin"]."
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
}?>




<?php
function AffecterBuvOuv($idb, $ids)
{
	$connexion=@connexion();

	$reqModifierTable='UPDATE est_ouverte
						SET idb="'.$idb.'"
							WHERE idS ="'.$ids.'";';

	$maj=mysqli_query($connexion, $reqModifierTable);
	
	$resultat = mysqli_query($connexion, $reqModifierTable);


	$reqTable='SELECT *
				FROM est_ouverte
				WHERE idB="'.$idb.'"
						AND ids="'.$ids.'";';
	
	$resultat = mysqli_query($connexion, $reqTable);

	if ($resultat)
	{
		?>
		<center><table>
		<caption>La buvette <?php echo $idb; ?> est ouverte lors de la soirée <?php echo $ids;?></caption>
		<thead>
			<tr>
				<th>Id de la buvette</th>
				<th>Id de la soirée</th>
			</tr>
		</thead>

		<?php

		while ($est_ouverte = mysqli_fetch_array($resultat))
		{
			echo "<tr>
						<td>"
						. $est_ouverte["idB"]."
						</td>

						<td>"
						. $est_ouverte["idS"]."
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
}?>