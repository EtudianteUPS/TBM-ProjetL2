<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>TMBuvettes - Recherche membres</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>

	<body>
		<?php include("PortionDePage/entete.php"); ?>
       
    	<?php include("PortionDePage/menus.php"); ?>

		<article>
			<form action="resultrecherchemembres.php" method="post" >
					<label for="nomV">Nom du volontaire </label>
					<input type="text" placeholder="Nom du volontaire" name="nomV" id="nomV" />
					<div id="trait_dessus"></div> 


					<p>Age compris entre </p>
					<input type="number" name="agemin" id="agemin"/>
					<p> et </p>
					<input type="number" name="agemax" id="agemax"/>
					<div id="trait_dessus"></div> 


					<label for="nbP">Nombre minimal de participations </label>
					<input type="number" name="nbP" id="nbP"/>
					<div id="trait_dessus"></div> 


					<p>Responsable d'une buvette?</p>
					<label for="oui">Oui </label>
					<input type="radio" name="radio" id="oui" value="oui"/>
					
					<label for="non">Non </label>
					<input type="radio" name="radio" id="non" value="non"/>
					<div id="trait_dessus"></div> 

					<input type="submit" value="Recherche" name="bouton3"/>
					<input type="reset" value="Vider" />

			</form>
		</article>

		<?php include("PortionDePage/pieddepage.php"); ?>
	</body>
</html>