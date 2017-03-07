<?php
include("Scripts/connectDB.php");

$stmt = $db->prepare("SELECT DATE_ACTUALITE FROM actualite  where ID_LANGUE='1' order by DATE_ACTUALITE DESC");

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>DynMap</title>


    <script src="jquery-3.1.1.min.js"></script>
    <script src="jquery-ui.js"></script>
    
    <script src="JS/Functions.js"></script>
    <script src="JS/Script.js"></script>
    <script type="text/javascript" src="JS/ScriptJavascript"></script>
    
    <!-- BOOTSTRAP-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css.map">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css.map">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css.map">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css.map">
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-alert.js"></script>
    
    <!-- BOOTSTRAP DATE PICKER-->
    <link rel="stylesheet" href="datepicker/css/datepicker.css">
    <script src="datepicker/js/bootstrap-datepicker.js"></script>
    
</head>

<body id='body'>
	<div class="container-fluid">
		<div class="row">
        <div class="col-sm-4 col-md-2 col-lg-1">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">+ News</button>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-3">
            <div class="input-group">
                <div class="input-group-btn">
                    <button draggable="true" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Date / Période ? <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" id="SearchPyDate">Date</a></li>
                        <li><a href="#" id="SearchPyPeriod">Période / Period</a></li>
                    </ul>
                </div>
				<select  id="FirstDate" class='form-control' >
					<?php
						if ($stmt->execute()) {
							while ($row = $stmt->fetch()) {
								echo "<option value='".$row['DATE_ACTUALITE']."'>".$row['DATE_ACTUALITE']."</option>";
							}
						}
					?>
				</select>
            </div>
            
        </div>
        <div class="col-sm-4 col-md-3 col-lg-2">
			<select  id="SecondDate" class='form-control' >
				<?php
					if ($stmt->execute()) {
						while ($row = $stmt->fetch()) {
							echo "<option value='".$row['DATE_ACTUALITE']."'>".$row['DATE_ACTUALITE']."</option>";
						}
					}
				?>
			</select>
        </div>
        <div class="col-lg-2">
			<div hidden='hidden' id='alertDates' class="alert alert-danger" role="alert">Les plages de dates sont incorrects</div>
        </div>
		<div class="col-lg-4">
			<div hidden='hidden' id='alertDates' class="alert alert-danger" role="alert">Les plages de dates sont incorrects</div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="scripts/PostActualite.php" method="post">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Nouvelle actualité / Add News</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <select name='Pays' class='form-control' style="margin-bottom:5px" >
                              <option value=''>Pays / Country</option>
                            </select>
                        </div>
                        <div class="row">
                            <input  name="Date" type="text"  class="form-control" aria-label="Date" style="margin-bottom:5px" placeholder="01/01/2017" >
                        </div>
                        <div class="row">
                            <div class="input-group"  style="margin-bottom:5px">
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control" aria-label="Montant"  placeholder="0"  name="Valeur">
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                              <h4>Français</h4>
                              <input type="text" class="form-control" placeholder="Titre" style="margin-bottom:5px"  name="TitreFr" />
                              <textarea class="form-control" placeholder="Détail de l'actualité"  style="margin-bottom:5px"  name="DetailFr"></textarea>
                          </div>
                          <div class="col-md-6">
                              <h4>English</h4>
                              <input type="text" class="form-control" placeholder="Title" style="margin-bottom:5px"  name="TitreEn"/>
                              <textarea class="form-control" placeholder="News details"  style="margin-bottom:5px"  name="DetailEn"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer / Close</button>
                        <button type="submit" class="btn btn-primary">Enregistrer / Save</button>
                      </div>
                </form>

              </div>
            
            
            
            
            
        </div>
    </div>
    </div>
    
	<div class="row">
		<div id='TitreRapport' ></div>
		<div id='CorpsRapport' class="row">
			<div id='CorpsRapportCenter' class="col-sx-12 col-sm-12 col-md-4 col-lg-8">
				<div class='CorpsRapportCenterMenu'>
					<img id='ZoomMoins' src='Images/ZoomMoins.svg' width='30px' height='30px' margin='10px' alt='Zoom -'>
					<img id='ZoomPlus' src='Images/ZoomPlus.svg' width='30px' height='30px' margin='10px' alt='Zoom +'>
				</div>
				<div class='CorpsRapportCenterMap'></div>
			</div>
			<div id='CorpsRapportLeft'  class="col-sx-12 col-sm-12 col-md-8 col-lg-4"></div>
		</div>
		
	</div>
	</div>
    test
    <script src="JS/ScriptEnd.js"></script>


</body>
</html>