<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>TMBuvettes - Accueil</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>

	<body>
		<!-- L'en-tête -->
    	<?php include("PortionDePage/entete.php"); ?>
    
    	<!-- Le menu -->    
    	<?php include("PortionDePage/menus.php"); ?>



		<article>
		
			<!-- Tableau dynamique -->
    		<?php 
    			include("Fonction/accueil.php");

    			AfficherSoiree(1, '2018-07-10', 'a2', 'a1');

    			AfficherSoiree(2, '2016-07-11', 'a3', 'a4');

    			AfficherSoiree(3, '2016-07-12', 'a5', 'a6');
    		?>


		</article>

		<!-- Le pied de page -->
		<?php include("PortionDePage/pieddepage.php"); ?>	
	</body>
</html>