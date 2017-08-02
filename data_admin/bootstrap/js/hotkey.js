$(document).ready(function(){
    $(document).keydown(function(e){
    	if(e.ctrlKey && e.altKey && e.keyCode == 77)
    	{
    		$("h3").css('font-size','30px');
    		$("#hex").css('visibility','hidden');
    		//Developed by Mikkel Septiano<br>https://github.com/mikkelofficial7<br>@mikkelofficial7 (Instagram)
    		document.getElementById("title").innerHTML = "Developed by Mikkel Septiano<br>https://github.com/mikkelofficial7<br>http://instagram.com/mikkelofficial7";
    	}
    });
    $(document).keyup(function(e){
    	$("#hex").css('visibility','visible');
    	if(window.matchMedia('(max-width: 900px)').matches)
    	{
    		$("h3").css('font-size','54px');
    	}
    	else if(window.matchMedia('(max-width: 400px)').matches)
    	{
    		$("h3").css('font-size','34px');
    	}
    	else if(window.matchMedia('(max-width: 300px)').matches)
    	{
    		$("h3").css('font-size','24px');
    	}
    	else if(window.matchMedia('(min-width: 901px)').matches)
    	{
    		$("h3").css('font-size','64px');
    	}
    	else
    	{
    		$("h3").css('font-size','24px');
    	}
    	document.getElementById("title").innerHTML = "Maaf halaman tidak ditemukan :(";
    });
});