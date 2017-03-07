<?php
    include("connectDB.php");
	if(isset($_GET['dateDebut']) && isset($_GET['dateFin']))
	{
		if($_GET['dateDebut']!='' && $_GET['dateFin']!='')
		{
			$dateDebut = $_GET['dateDebut'];
			$dateFin = $_GET['dateFin'];
			
			$stmt = $db->prepare("select L.ID_LANGUE, P.LIBELLE_PAYS,CA.TITRE_CATEG_ACTU,CA.IMAGE_ACTU, A.TITRE_ACTUALITE, A.DETAIL_ACTUALITE,A.DATE_ACTUALITE,A.VALEUR from actualite A inner join pays P on P.ID_PAYS = A.ID_PAYS inner join categorie_actualite CA on CA.ID_CATEG_ACTU = A.ID_CATEG_ACTU inner join langue L on L.ID_LANGUE = A.ID_LANGUE where A.DATE_ACTUALITE BETWEEN ? and ? ");
			$id = 1;
			if ($stmt->execute(array($dateDebut,$dateFin))) {
			  while ($row = $stmt->fetch()) {
				echo "
					<div id='Actualite".$id."' style='position: relative; float: left; width: 100%; height: 200px; padding: 5px;'>
						<div id='ActualitePays".$id."' style='position: relative; width: auto; height: auto; margin: auto;'>
							<h3>".$row['LIBELLE_PAYS']."</h3>
						</div>
						<div id='ActualiteTitre".$id."' style='position: relative; width: auto; height: auto; margin: auto;'>
							<h5 style='color:#026cb6;'>".$row['TITRE_ACTUALITE']."</h5>
						</div>
						<div id='ActualiteDetails".$id."' style='position: relative; width: auto; height: auto; margin: auto;'>
							<p>".$row['DETAIL_ACTUALITE']."</p>
						</div>
					</div>
					";
					$id++;
				}
			}
		}
		else
		{
			echo "Les dates sont vides";
		}
	}
	else
	{
		echo "Probleme de variable";
	}
	

?>