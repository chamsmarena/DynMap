<?php
    include("connectDB.php");

    $ID_ACTUALITE = date('YmdHis').rand (0, 9999);
    $ID_LANGUE =1;
    $ID_CATEG_ACTU = 1;
    $ID_PAYS = 1;
    $PAYS = $_POST["Pays"];
    $TITRE_ACTUALITE = $_POST['TitreFr'];
    $DETAIL_ACTUALITE = $_POST['DetailFr'];
    $DATE_ACTUALITE =  date('Y/m/d', strtotime($_POST['Date']));
	echo $DATE_ACTUALITE;
    $VALEUR = $_POST['Valeur'];    

    $stmt = $db->prepare("INSERT INTO actualite(ID_LANGUE, ID_CATEG_ACTU, ID_PAYS, ID_ACTUALITE, TITRE_ACTUALITE, DETAIL_ACTUALITE, DATE_ACTUALITE, VALEUR) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $ID_LANGUE);
    $stmt->bindParam(2, $ID_CATEG_ACTU);
    $stmt->bindParam(3, $ID_PAYS);
    $stmt->bindParam(4, $ID_ACTUALITE);
    $stmt->bindParam(5, $TITRE_ACTUALITE);
    $stmt->bindParam(6, $DETAIL_ACTUALITE);
    $stmt->bindParam(7, $DATE_ACTUALITE);
    $stmt->bindParam(8, $VALEUR);


    $result = false;

    try {
         $result = $stmt->execute();
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }

    // insertion d'une ligne
    $ID_LANGUE = date('YmdHis').rand (0, 9999);
    $TITRE_ACTUALITE = $_POST['TitreEn'];
    $DETAIL_ACTUALITE = $_POST['DetailEn'];
    $VALEUR = $_POST['Valeur'];

    try {
         $result = $stmt->execute();
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }

?>