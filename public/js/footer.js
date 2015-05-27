// Contactar
$("#contactar").click(function(){
	$("#contactar").html("<div class='spinner'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");

	var datos = {
		"alias": $("input[name=alias]").val(),
		"email": $("input[name=email]").val(),
		"mensaje": $("[name=mensaje]").val(),
		"_token": $('meta[name="csrf-token"]').attr('content')
	}

	$.post("/contactar", datos)
	.done(function(data, textStatus, xhr) {
		$("#contactar").text("Enviar");
		$(".alert-success").html("<b>"+data.mensaje+"</b>").slideDown("slow");
		setTimeout(function() {
			$(".alert-success").slideUp("slow");
		}, 3500);
	})
	.fail(function(data, textStatus, xhr) {
		$("#contactar").text("Enviar");
		$(".alert-danger").html("<b>Tu mensaje no ha podido ser enviado, intentalo mas tarde!</b>").slideDown("slow");
		setTimeout(function() {
			$(".alert-danger").slideUp("slow");
		}, 3500)		
	})
})
/*LOGIN*/
$("#btn-iniciar-sesion").click(function(event) {
	$("#btn-iniciar-sesion").html("<div class='spinner'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");
	var validado = true;

	var usuario = $("#modalLogIn").find('input[name=alias]');
	var password = $("#modalLogIn").find('input[name=password]');

	var labelError = $("#modalLogIn").find('.msg-error');

	if (usuario.val().length == 0) {
		validado = false;
		usuario.next().fadeIn();
	} else {
		usuario.next().fadeOut();
	}

	if (password.val().length == 0) {
		validado = false;
		password.next().fadeIn();
	} else {
		password.next().fadeOut();
	}

	if (validado) {



		var data = {
			alias: usuario.val(), 
			password: password.val(),
			"_token": $('meta[name="csrf-token"]').attr('content')
		}

		$.post('/auth/login', data, function(data, textStatus, xhr) {
			if (data.result == "success") {
				$("#btn-iniciar-sesion").text("Entrando...")
				window.location = "/productos";
			} else {
				$("#modalLogIn").find('.js-login-error-msg').text(data.message).fadeIn();
			}


		})
		.fail(function(data, textStatus, xhr) {
			$("#btn-iniciar-sesion").html("Iniciar sesión");

		})

	}
	$("#btn-iniciar-sesion").html("Iniciar sesión")

});

/*Registrar*/
$('#botonRegistrar').click(function(event) {
	var validado = true;
	var alias = $(".form-signin").find('input[name=aliasReg]');
	var correo = $(".form-signin").find('input[name=emailReg]');
	var password = $(".form-signin").find('input[name=passwordReg]');
	var confirmedPassword = $(".form-signin").find('input[name=confirmedPassword]');
   //validar alias
   if ( !/\w+/.test(alias.val()) ) {
   	alias.next().show();
   	validado = false;
   } else {
   	alias.next().hide();
   }

   //validar correo
   if (!correoValido(correo.val())) {
   	correo.next().show();
   	validado = false;
   } else {
   	correo.next().hide();
   }

   //validar contraseña 
   if (!/\w+/.test(password.val())) {
   	password.next().show();
   	validado = false;
   } else {
   	password.next().hide();
   }

   if ( !/\w+/.test(confirmedPassword.val()) ) {
   	validado = false;
   	confirmedPassword.next().text("La contraseña debe coincidir!").show();
   } else if ( confirmedPassword.val() != password.val() ) {
   	validado = false;
   	confirmedPassword.next().text("La contraseña debe coincidir!").show();
   } else {
   	confirmedPassword.next().text("La contraseña debe coincidir!").hide();
   }

   if (validado) {
   	$("#botonRegistrar").html("<div class='spinner'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");
   	var datos = {
   		alias: alias.val(),
   		email: correo.val(),
   		password: password.val(),
   		"_token": $('meta[name="csrf-token"]').attr('content')
   	}

   	$.post('/auth/register', datos).done(function(data, textStatus, xhr) {
   		$("#botonRegistrar").text("Entrando...");
   		if (data.result == "success") {
   			window.location = "/productos";
   		} else {
   			$(".form-signin").find("input[name=" + data.type + "Reg]").next().text(data.message).show();
   		}

   	})
   	.fail(function(data, textStatus, xhr) {
   		$("#botonRegistrar").text("Regístrate!");
   		console.log(data);
   	});

   	function correoValido (email) {
   		var regex = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
   		return regex.test(email);
   	}
   }
});
$('#aceptoCondiciones').click(function () {
        //check if checkbox is checked
        if ($(this).is(':checked')) {
        	$('#botonRegistrar').removeAttr('disabled');

        } else {
        	$('#botonRegistrar').attr('disabled', true); 
        }
    });

/* NAVBAR */

(function($) {

	$.fn.menumaker = function(options) {
		
		var cssmenu = $(this), settings = $.extend({
			title: "Menu",
			format: "dropdown",
			sticky: false
		}, options);

		return this.each(function() {
			cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
			$(this).find("#menu-button").on('click', function(){
				$(this).toggleClass('menu-opened');
				var mainmenu = $(this).next('ul');
				if (mainmenu.hasClass('open')) { 
					mainmenu.hide().removeClass('open');
				}
				else {
					mainmenu.show().addClass('open');
					if (settings.format === "dropdown") {
						mainmenu.find('ul').show();
					}
				}
			});

			cssmenu.find('li ul').parent().addClass('has-sub');

			multiTg = function() {
				cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
				cssmenu.find('.submenu-button').on('click', function() {
					$(this).toggleClass('submenu-opened');
					if ($(this).siblings('ul').hasClass('open')) {
						$(this).siblings('ul').removeClass('open').hide();
					}
					else {
						$(this).siblings('ul').addClass('open').show();
					}
				});
			};

			if (settings.format === 'multitoggle') multiTg();
			else cssmenu.addClass('dropdown');

			if (settings.sticky === true) cssmenu.css('position', 'fixed');

			resizeFix = function() {
				if ($( window ).width() > 768) {
					cssmenu.find('ul').show();
				}

				if ($(window).width() <= 768) {
					cssmenu.find('ul').hide().removeClass('open');
				}
			};
			resizeFix();
			return $(window).on('resize', resizeFix);

		});
};
})(jQuery);

(function($){
	$(document).ready(function(){

		$(document).ready(function() {
			$("#cssmenu").menumaker({
				title: "Menú",
				format: "multitoggle"
			});

			$("#cssmenu").prepend("<div id='menu-line'></div>");

			var foundActive = false, activeElement, linePosition = 0, menuLine = $("#cssmenu #menu-line"), lineWidth, defaultPosition, defaultWidth;

			$("#cssmenu > ul > li").each(function() {
				if ($(this).hasClass('active')) {
					activeElement = $(this);
					foundActive = true;
				}
			});

			if (foundActive === false) {
				activeElement = $("#cssmenu > ul > li").first();
			}

			defaultWidth = lineWidth = activeElement.width();

			defaultPosition = linePosition = activeElement.position().left;

			menuLine.css("width", lineWidth);
			menuLine.css("left", linePosition);

			$("#cssmenu > ul > li").hover(function() {
				activeElement = $(this);
				lineWidth = activeElement.width();
				linePosition = activeElement.position().left;
				menuLine.css("width", lineWidth);
				menuLine.css("left", linePosition);
			}, 
			function() {
				menuLine.css("left", defaultPosition);
				menuLine.css("width", defaultWidth);
			});

		});


		});
})(jQuery);
