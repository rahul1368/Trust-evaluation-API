$("#login").hide();
$("#signup").hide();

$(document).ready(function(){
	$("#login").hide();
$("#signup").hide();
    $("#b1").click(function(){
        $("#login").toggle();
		$("#signup").hide();
    });
    $("#b2").click(function(){
        $("#login").hide();
		$("#signup").toggle();
    });
	
});