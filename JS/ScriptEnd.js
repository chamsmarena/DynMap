$("#SearchPyDate").click(function(){
	$("#alertDates").hide();
	$("#SecondDate").hide();
	$("#SecondDate").val('');
	LoadActualites($("#FirstDate").val(),$("#FirstDate").val());

});
$("#SearchPyPeriod").click(function(){
	$("#alertDates").hide();
	$("#SecondDate").show();
	$("#SecondDate").val($("#FirstDate").val());
	LoadActualites($("#FirstDate").val(),$("#SecondDate").val());
});
$("#FirstDate").change(function(){
	$("#alertDates").hide();
	if($("#SecondDate").val()==null)
	{
		LoadActualites($("#FirstDate").val(),$("#FirstDate").val());
	}
	else
	{
		if($("#SecondDate").val()!=null)
		{
			if( (new Date($("#FirstDate").val()).getTime() > new Date($("#SecondDate").val()).getTime()))
			{
				$("#alertDates").show();
			}
			else
			{
				LoadActualites($("#FirstDate").val(),$("#SecondDate").val());
			}
		}
	}
});
$("#SecondDate").change(function(){
	$("#alertDates").hide();
	
		if( (new Date($("#FirstDate").val()).getTime() > new Date($("#SecondDate").val()).getTime()))
		{
			$("#alertDates").show();
		}
		else
		{
			LoadActualites($("#FirstDate").val(),$("#SecondDate").val());
		}
});


//GESTION DE LA CARTE ZOOM
$("#ZoomMoins").click(function(){
	zoom = parseInt( $("#carte").attr("width").replace('px',''));
	zoom-=5;
	$("#carte").attr({
        "width" : zoom+'px',
        "height" : zoom+'px'
    });
	
	
	//ZOMMER LES IMAGES
	$( ".CorpsRapportCenterMap img" ).each(function() {
		var pos = $(this).position();
		pleft = pos.left;
		ptop = pos.top;
		pleft-=(5/1.5);
		ptop-=(5/1.5);
		$(this).css({'left':pleft+'px', 'top':ptop+'px' });
	});
	
});
$("#ZoomPlus").click(function(){
	
	//ZOMMER LA CARTE
	zoom = parseInt( $("#carte").attr("width").replace('px',''));
	zoom+=5;
	$("#carte").attr({
        "width" : zoom+'px',
        "height" : zoom+'px'
    });
	
	
	
	//ZOMMER LES IMAGES
	$( ".CorpsRapportCenterMap img" ).each(function() {
		var pos = $(this).position();
		pleft = pos.left;
		ptop = pos.top;
		pleft+=(5/1.5);
		ptop+=(5/1.5);
		$(this).css({'left':pleft+'px', 'top':ptop+'px' });
		
	});
	
	
});

function LoadMapData(){
    $(".CorpsRapportCenterMap").load("Maps/"+carte+".html");
	$(".CorpsRapportCenterMap").append("<img id='ImgCenterBF' class='categActu' src='Images/Election.svg' position='absolute' top='0px' left='0px' width='30px' height='30px' />");

	x = $("#CenterBF circle").attr("cx");
	y = $("#CenterBF circle").attr("cy");
	
	x=(x/1.5)+30;
	y=(y/1.5)-5;
	

	$('#ImgCenterBF').css({ 'position':'absolute','left':x+'px', 'top':y+'px' });
	//$('#ImgCenterBj').css({ 'position':'absolute','left':'0px', 'top':'0px' });
	//$('#ImgCenterBF').css({ 'position':'absolute','left':'500px', 'top':'500px' });
	//CenterBF
	// $("#MenuCarte").css({"position":"relative","float":"left","width":"100%","height":"200px", "padding":"5px"});
	// $("#MenuCarte").append("<img src='Images/ZoomMoins.svg' width='30px' height='30px' margin='10px' alt='Zoom -'>");
	// $("#MenuCarte").append("<img src='Images/ZoomPlus.svg' width='30px' height='30px' margin='10px' alt='Zoom +'>");
}