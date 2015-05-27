$( document ).ready(function() {

	$("#liProductos").addClass("active");

	$("#finalizados").hide();

	$("#linkFinalizados").click(function(){
		$("#linkEnPuja").removeClass("active");
		$("#linkFinalizados").addClass("active");
		$("#productos").hide();
		$("#finalizados").show();
	})
	$("#linkEnPuja").click(function(){
		$("#linkEnPuja").addClass("active");
		$("#linkFinalizados").removeClass("active");
		$("#productos").show();
		$("#finalizados").hide();
	})


	var socket = io.connect("https://serene-refuge-3117.herokuapp.com");


	socket.on('update', function(data){
		var elementoActualizado = $("#productos").find("div[data-id='" + data["id_producto"] + "']");
		if(elementoActualizado.length > 0) {
			elementoActualizado.find(".js-numPujas").text(data.numeroPujas);
					//si no hay ganador, mostramos el texto adequado
					var ganadorActual = (data.ganadorActual != "" ? "Ganador actual: " + data.ganadorActual : "Aún no hay ganador"); 
					elementoActualizado.find('.js-ganadorActual').text(ganadorActual);
				}

			});

	$(".btn-puja").click(function(event) {
		botonPujar = $(event.target);
				//solo se muestra el modal de puja si estas autenticado, de lo contrario se muestre el modal registrar
				if (infoUser.id != undefined) {
					$("#modalPuja").modal("show");	
				} else {
					$("#modalRegistrar").modal("show");
				}				
			});

			//control de errores en el input puja
			$("#inputPuja").keydown(function(event) {
				setTimeout(function() {
					var puja = $(this).val();
					//si no es válido, muestra error
					if(!/^\d+$/.test(puja)) {
						$(".label-error").show();
					} else if(parseInt(puja) === 0) {
						$(".label-error").text("No puedes pujar 0!").show();
					}else {
						$(".label-error").hide();
						if(parseInt(puja) > parseInt(infoUser.punts)) {
							$(this).val(infoUser.punts);
							infoUser.updatePunts(infoUser.punts);
						} else {
							infoUser.updatePunts(puja);
						}
					}
				}.bind(this),0);
				$('[data-toggle="tooltip"]').tooltip(); 
			});

			//click en pujar
			$(".btn-puja").click(function(event) {
				var puja = $("#inputPuja").val();
				$(".puntos-usuario").text(infoUser.punts);
				var idProducto = $(this).closest('.elementoProducto').data("id");
				//si el valor de la puja maxima es mas grande, el valor maximo sera el numero de puntos del usuario
				
				$("#inputPuja").attr("max",infoUser.punts);
				
				$("#inputPuja").data('idproducto', idProducto);
				$("#inputPuja").val(1);

			});





			$("#js-enviar-puja").click(function(event) {

				var puja = $("#inputPuja").val();

				if(/^\d+$/.test(puja) && puja > 0) {

					botonPujar.html("<div class='spinner'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");;
					$("#modalPuja").modal("hide");
					var dataToSend = {
						"puntos": $("#inputPuja").val(),
						"idproducto": $("#inputPuja").data('idproducto'),
						"_token": $('meta[name="csrf-token"]').attr('content')
					}
					puntosEnviados = dataToSend.puntos;


					$.post("/usuario/pujar", dataToSend)
					.done(function(data, textStatus, xhr) {
						$(".btn-danger").text("Pujar");
						if (data.result == "success") {
								infoUser.actualizaCampos(data.misPuntos);
								//incrementa en 1 el nombre de mis pujas
								var idProducto = $("#inputPuja").data('idproducto');
								var misPujas = $("#productos").find("div[data-id='" + idProducto + "']").find(".js-misPujas");
								misPujas.text(parseInt(misPujas.text()) + 1);

								$(".alert-success").html("<b>" + data.message).slideDown("slow");
								setTimeout(function() {
									$(".alert-success").slideUp("slow");
								}, 3000);
							} else {
								$(".alert-danger").html("<b>" + data.message).slideDown("slow");
								setTimeout(function() {
									$(".alert-danger").slideUp("slow");
								}, 3000)
							} 

						})
					.fail(function(data, textStatus, xhr) {
						$(".btn-danger").text("Pujar");
						$(".alert-danger").html("<b>" + data.result + "! </b> " + data.message).fadeIn("fast");
						setTimeout(function() {
							$(".alert-danger").fadeOut("fast");
						}, 3000)
					});


				}

			});


/*controles puja*/
$(function() {
	var action;
	$(".number-spinner button").mousedown(function () {
		btn = $(this);
		input = btn.closest('.number-spinner').find('input');
		btn.closest('.number-spinner').find('button').prop("disabled", false);

		if (btn.attr('data-dir') == 'up') {
			action = setInterval(function(){
				if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
					input.val(parseInt(input.val())+1);

					infoUser.updatePunts(parseInt(input.val()));

				}else{
					btn.prop("disabled", true);
					clearInterval(action);
				}
			}, 50);
		} else {
			action = setInterval(function(){
				if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
					input.val(parseInt(input.val())-1);

					infoUser.updatePunts(parseInt(input.val()));

				}else{
					btn.prop("disabled", true);
					clearInterval(action);
				}
			}, 50);
		}
	}).mouseup(function(){
		clearInterval(action);
	});
});



		// Tooltips

		$('[data-toggle="tooltipLeft"]').tooltip({'placement': 'top'});
		$('[data-toggle="tooltipRight"]').tooltip({'placement': 'top'});

	});
var img = [{img: "https://picjumbo.com/wp-content/uploads/HNCK3323-1300x866.jpg"}, {img:"https://picjumbo.com/wp-content/uploads/HNCK2587-1300x866.jpg"}, {img:"https://picjumbo.com/wp-content/uploads/HNCK4490-1300x867.jpg"}, {img:"https://picjumbo.com/wp-content/uploads/IMG_7432-1300x866.jpg"}, {img:"https://picjumbo.com/wp-content/uploads/IMG_6855-1300x866.jpg"}];
