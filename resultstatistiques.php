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
			<form action="resultstatistiques.php" method="post" >
				<h3>Statistiques en fonction des soirées</h3>

				<article>
					<label for="date">Choisir la date de la soirée</label>
					<select name="date" id="date">
								<option value="2018-07-10">2018-07-10</option>
								<option value="2016-07-11">2016-07-11</option>
								<option value="2016-07-12">2016-07-12</option>

					</select>
				</article>

				<article>
					<label for="stat">Choisir le type de statistiques</label>
					<select name="stat" id="stat">
							<option value="stat1">Les 5 volontaires les plus actifs</option>
							<option value="stat2">Les 5 buvettes les plus actives</option>
							<option value="stat3">Les buvettes ouvertes et les volontaires présents </option>
					</select>
				</article>
				
				<div id="trait_dessus"></div> 

				<input type="submit" value="Voir" name="bouton3"/>			
			</form>


			<?php 
    			include("Fonction/statistiques.php");

    			if (!empty($_POST)) 
    			{
				    if ($_POST['stat']=='stat1') 
				    {
				        TopVolontaires($_POST['date']);
				    } 
			    	elseif ($_POST['stat']=='stat2') 
				    {
				        TopBuvettes($_POST['date']);
				    } 
		    		elseif ($_POST['stat']=='stat3') 
				    {
				       	StatSoiree($_POST['date']);
				    } 
				}

    		?>

		</article>

		<?php include("PortionDePage/pieddepage.php"); ?>
	</body>
</html>