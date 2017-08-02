$(document).ready(function(){
	$("#secure-form").css('margin-top','100px');
	$("#secure-form").css('display','none');
	$("#secure").css('cursor','default');
	$("#secure-form").css('float','right');
	$("#secure").css('width','5px');
	$("#secure").css('height','10px');

    $(document).keydown(function(es){
    	if(es.ctrlKey && es.altKey && es.keyCode == 77)
    	{
    		$("#secure-form").trigger('submit');
    	}
    });
});