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
					<input type="radio" name="radio" id="oui" value="oui" required/>
					
					<label for="non">Non </label>
					<input type="radio" name="radio" id="non" value="non"/>
					<div id="trait_dessus"></div> 

					<input type="submit" value="Recherche" name="bouton3"/>
					<input type="reset" value="Vider" />

			</form>
			
			<?php 
    			include("Fonction/rechercheMembre.php");

    			if (!empty($_POST)) {

    				$nom=$_POST["nomV"];
    				$agemin=$_POST["agemin"];
    				$agemax=$_POST["agemax"];
    				$nbP=$_POST["nbP"];
    				$radio=$_POST["radio"];


    				$requete = "SELECT *, COUNT( b.responsable) as Count_nbFoisResp, COUNT(p.idv) as Count_nbParticipation
								FROM buvette b, soiree s, est_present p, volontaire v
								WHERE  v.idV=p.idV 
										AND b.idB = p.idB 
										AND s.idS = p.idS ";


					/*Personnalisation de la requête*/
					if (array_key_exists("nomV", $_POST) && !empty($nom))
					{
						echo "nom = " .$nom;
							$requete = $requete . "AND v.nomV=".$nom." ";
					}

					if (array_key_exists("agemin", $_POST) && !empty($agemin))
					{
							$requete = $requete . "AND v.age>=". $agemin. " ";
					}

					if (array_key_exists("agemax", $_POST) && !empty($agemax))
					{
							$requete = $requete . "AND v.age<=". $agemax. " ";
					}

					if (array_key_exists("radio", $_POST) && !empty($radio))
					{
						if($radio=="oui")
						{
							$requete = $requete . "AND v.idV IN (SELECT DISTINCT b.responsable
					                							FROM buvette b) ";
						}
						else if ($radio=="non")
						{
							$requete = $requete . "AND v.idV NOT IN (SELECT DISTINCT b.responsable
					                							FROM buvette b) ";
						}
					}

					$requete= $requete . "GROUP BY v.idV;";

				  
				    AfficherMembre($requete, $radio);
				    
				}
				else
				{
					echo "Veuillez cliquer sur un radio button";
				}
    		?>
		</article>

		<?php include("PortionDePage/pieddepage.php"); ?>
	</body>
</html>