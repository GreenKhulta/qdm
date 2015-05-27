$(document).ready(function() {

	$('#linkComoFunciona').click(function(){
		$('html, body').animate({
			scrollTop: $("#comoFunciona").offset().top
		}, 1500);

	});

	$('#bajar').click(function(){
		$('html, body').animate({
			scrollTop: $("#comoFunciona").offset().top
		}, 1500);

	});

	$("#linkContacto").click(function() {
		$('html, body').animate({
			scrollTop: $("#contacto").offset().top
		}, 2000);
	});


	$( "h1" ).animate({
		opacity: 1
	}, 2900 );

	setTimeout(function(){
		($( "h3" ).animate({
			opacity: 1
		}, 2900 ));
	},900);

	// Poner link al logo
	$("#logo").mouseover(function(){
		$("#logo-li").css( 'cursor', 'pointer' );
		$(this).click(function() {
			window.location="/productos";
		});
	});

	$("li").mouseover(function(){
		$(this).css("cursor", "pointer");
	})
});
