$(document).ready(function(){
    //creation des blocs
    // $("body").append("<div class='TitreRapport'></div>");
    // $("body").append("<div class='CorpsRapport'></div>");
    // $(".CorpsRapport").append("<div class='CorpsRapportLeft'></div>");
    // $(".CorpsRapport").append("<div class='CorpsRapportCenter'></div>");
    // $(".CorpsRapportCenter").append("<div class='CorpsRapportCenterMenu'></div>");
    // $(".CorpsRapportCenter").append("<div class='CorpsRapportCenterMap'></div>");
    // $(".CorpsRapport").append("");
    
    
    //Mise en page des styles css
    $(".TitreRapport").css({"position":"relative","width":"auto","height":"auto","margin":"auto"});
    // $("#CorpsRapport").css({"position":"relative","width":"90%","height":"auto","margin":"auto"});
    // $("#CorpsRapportLeft").css({"position":"relative","float":"left","width":"20%","height":"auto"});
    // $("#CorpsRapportCenter").css({"position":"relative","float":"left","width":"60%","height":"auto","overflow":"hidden"});
    $(".CorpsRapportCenterMap").css({"position":"relative","float":"left","width":"600px","height":"600px","overflow":"hidden"});
    // $("#CorpsRapportRight").css({"position":"relative","float":"left","width":"20%","height":"auto"});
    

    // var actualite = {Pays:"Sénégal",Titre:"New président",Contenu:"djsds jkjdsdsdskjkdsjd"};
    
    
    // AjouterActualite("1",actualite);
    // AjouterActualite("2",actualite);
    AjouterCarte('sahel'); 
    
    
});


