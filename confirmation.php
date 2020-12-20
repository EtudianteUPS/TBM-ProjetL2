<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>TMBuvettes - Affectations</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>

	<body>
		<?php include("PortionDePage/entete.php"); ?>
    
    	<!-- Le menu -->
    
    	<?php include("PortionDePage/menus.php"); ?>

    	
		<article>
			<form method="POST" action="confirmation.php">
				<h2>Affecter un responsable</h2>
				<p>Affecter le volontaire comme étant responsable  d'une buvette</p>
				<label>IdB de la buvette</label>
				<select name="idb1" id="idb1">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
				
				<label>Id Volontaire</label>
				<select name="idv1" id="idv1">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>

				<input type="submit" value="Affecter" name="bouton1"/>
				<input type="reset" value="Vider" />
			</form>

			<?php 
    			include("Fonction/affectations.php");

    			

    			if (!empty($_POST)) 
    			{
				    if (isset($_POST['bouton1'])) 
				    {
				        AffecterVolResp($_POST['idb1'], $_POST['idv1']);
				    } 
			    }

    		?>


			<br/>

			<form method="POST" action="confirmation.php">
				<h2>Affecter un membre à une buvette</h2>
				<p>Affecter le volontaire en tant que volontaire à la buvette pour une soirée donnée</p>
				<label>Ids de la soirée</label>
				<select name="ids2" id="ids2">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>

				<label>IdB de la buvette</label>
				<select name="idb2" id="idb2">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
				
				<label>Id Volontaire</label>
				<select name="idv2" id="idv2">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>

				<input type="submit" value="Affecter" name="bouton2"/>
				<input type="reset" value="Vider" />
			</form>

			<?php 
    			    			
    			if (!empty($_POST)) 
    			{
				    if (isset($_POST['bouton2'])) 
				    {
				        AffecterMemVol($_POST['idb2'], $_POST['idv2'], $_POST['ids2']);
				    } 
			    }

    		?>

			<br/>

			<form method="POST" action="confirmation.php">
				<h2>Affecter une buvette à une soirée</h2>
				<p>Indiquer qu'une buvette est ouverte</p>
				<label>Ids de la soirée</label>
				<select name="ids3" id="ids3">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>
				
				<label>IdB de la buvette</label>
				<select name="idb3" id="idb3">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>


				<input type="submit" value="Affecter" name="bouton3"/>
				<input type="reset" value="Vider" />
			</form>


			<?php 
    			
    			if (!empty($_POST)) 
    			{
				   if (isset($_POST['bouton3'])) 
				    {
				       	AffecterBuvOuv($_POST['idb3'], $_POST['ids3']);
				    } 
				}

    		?>

		</article>

		<?php include("PortionDePage/pieddepage.php"); ?>
	</body>
</html>