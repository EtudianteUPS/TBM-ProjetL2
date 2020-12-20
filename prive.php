<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>TMBuvettes - Administrateur</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>

	<body>
		<?php include("PortionDePage/entete.php"); ?>
    
    	<!-- Le menu -->
    
    	<?php include("PortionDePage/menus.php"); ?>

		<article>
				<?php
				if (!empty($_POST['pass']) and $_POST['pass'] == "votremotdepasse") 
				{
					include("Fonction/fonctions.php");
					?>
					<strong>Aller directement au formulaire traitant de :</strong> <br />
		            <ul>
		                <a href="#vol">Des volontaires</a><br />
		                <a href="#buv">Des buvettes</a><br />
		                <a href="#soi">Des soirées</a><br />
		            </ul>

					<form action="resultprive.php" method="post" id="vol">
						<input type="submit" value="ajouter" name="bouton1"/>
					</form>

					<?php
					volontaire();
					?>
					<br/>


					<form action="resultprive.php" method="post" id="buv">
						<input type="submit" value="ajouter" name="bouton2"/>
					</form>

					<?php
					buvette();
					?>
					<br/>
					

					<form action="resultprive.php" method="post" id="soi">
						<input type="submit" value="ajouter" name="bouton3"/>
						<input type="submit" value="modifer" name="bouton4"/>
					</form>
					
					<?php
					soiree();
									    
						
				} 
				else 
				{?>
					<form action="" method="post" >
						<p>
						Veuillez saisir le mot de passe pour accéder aux informations sensibles</p>
						<input type="password" name="pass">
						<input type="submit" value="entrer" name="bouton3"/>
					</form>	
				<?php } ?>
			
		</article>

		<?php include("PortionDePage/pieddepage.php"); ?>
	</body>
</html>