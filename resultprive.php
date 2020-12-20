<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>TMBuvettes - Résultat de la recherche</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>

	<body>
		<?php include("PortionDePage/entete.php"); ?>
       
    	<?php include("PortionDePage/menus.php"); ?>

		<article>
			<?php
			
			if (!empty($_POST)) 
			{

				
			    if (isset($_POST['bouton1'])) 
			    {
			    	?>

			    	<form action="" method="post">
			    		<h2>Ajouter un volontaire:</h2>
			    		<label for="idV">Id du volontaire</label>
			    		<input type="number" placeholder="ex : 1" name="idV" id="idV" />
				    	<label for="nomV">Nom du volontaire </label>
						<input type="text" placeholder="Nom du volontaire" name="nomV" id="nomV" />
						<label for="age">Age</label>
						<input type="number" name="ageV" id="ageV"/>
						<input type="submit" value="ajouter" name="a1"/>
					</form>    

					<?php
					include("Fonction/prive.php");
    				echo $_POST["a1"];
    				echo $_POST["idV"];
    				echo $_POST["nomV"];

				    if (isset($_POST['a1'])) 
				    {
				    	echo "hola";
				    	
				        InsererVolontaire($_POST['idV'], $_POST['nomV'], $_POST['ageV']);

				        
				    } 
			    } 
			    if (isset($_POST['bouton2'])) 
			    {
			    	?>

			    	<form action="" method="post">
			    		<h2>Ajouter une buvette:</h2>
			    		<label for="idV">Id de la buvette</label>
			    		<input type="number" placeholder="ex : 1" name="idB" id="idB" />
				    	<label for="nomV">Nom de la buvette</label>
						<input type="text" placeholder="ex : buvette1" name="nomB" id="nomB" />
						<label for="age">Emplacement</label>
						<input type="text" placeholder="ex : Allée A" name="ageV" id="ageV"/>
						<label for="age">Responsable</label>
						
						<select name="idResp" id="idResp">
							<?php
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

							$requete="SELECT idV
									FROM volontaire;";

							$resultat = mysqli_query($connexion, $requete);

							if ($resultat)
							{
								while($volontaire = mysqli_fetch_array($resultat))
								{
									"<option value=".$volontaire["idV"].">".$volontaire["idV"]."</option>";
								}
							}
							mysqli_close($connexion);

							?>
						</select>

						<input type="submit" value="ajouter" name="a2"/>
					</form>    

				   <?php
			    }
			    if (isset($_POST['bouton3'])) 
			    {
			    	?>

			    	<form action="" method="post">
			    		<h2>Ajouter une soirée:</h2>
			    		<label for="idV">Id de la soirée</label>
			    		<input type="number" placeholder="ex : 1" name="idS" id="idS" />
				    	<label for="nomV">Date de la soirée</label>
						<input type="text" placeholder="Nom du volontaire" name="dateS" id="dateS" />
						<label for="age">Artiste en première partie</label>
						<input type="number" name="idAP" id="idAP"/>
						<label for="age">Artiste en tête d'affiche</label>
						<input type="number" name="idAT" id="idAT"/>

						<input type="submit" value="ajouter" name="a1"/>
					</form>    

					<?php
					
			    }
			    if (isset($_POST['bouton4'])) 
			    {
			    	?>

			    	<form action="" method="post">
			    		<h2>Modifier une soirée:</h2>
			    		<label for="idS">Id de la soirée</label>
			    		<select name="idS" id="idS">
							<?php
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

							$requete="SELECT idS
									FROM soiree;";

							$resultat = mysqli_query($connexion, $requete);

							if ($resultat)
							{
								while($soiree = mysqli_fetch_array($resultat))
								{
									"<option value='".$soiree["idS"]."'>".$soiree["idS"]."</option>";
								}
							}
							mysqli_close($connexion);

							?>
						</select>

				    	<label for="nomV">Nom du volontaire </label>
						<input type="text" placeholder="Nom du volontaire" name="nomV" id="nomV" />
						<label for="age">Age</label>
						<input type="number" name="ageV" id="ageV"/>
						<input type="submit" value="ajouter" name="a1"/>
					</form>    

					<?php
					}
		    } 
			volontaire();
			        
			?>
		</article>

		<?php include("PortionDePage/pieddepage.php"); ?>
	</body>
</html>