$(document).ready(function(){

	var ruta = window.location.hash;

	if (ruta == "#misDatos"){
		$(".misPuntos").hide();
		$(".misPujas").hide();
		$(".misDatos").show();
	}else if(ruta == "#misPujas"){
		$(".misPuntos").hide();
		$(".misPujas").show();
		$(".misDatos").hide();
	}else if(ruta == "#misPuntos"){
		$(".misPuntos").show();
		$(".misPujas").hide();
		$(".misDatos").hide();
	}else{
		$(".misPujas").hide();
		$(".misPuntos").hide();
		$(".misDatos").show();
	}

	$(".navbar-collapse li").click(function() {
		$(".navbar-collapse li").removeClass('active');
		$(this).addClass('active');    
	});

	$("#linkTusPujas").click(function(){
		$(".misDatos").hide();
		$(".misPuntos").hide();
		$(".misPujas").show();
	})
	$("#linkDatosUsuario").click(function(){
		$(".misDatos").show();
		$(".misPuntos").hide();
		$(".misPujas").hide();
	})
	$("#linkEstadisticas").click(function(){
		$(".misDatos").hide();
		$(".misPuntos").show();
		$(".misPujas").hide();
	})
	if ($("#estado td").eq(3).html() == "Finalizado"){
		$("#estado").addClass("danger");
	}
	/* Actualizar perfil JS */
	email = $('#email').text().trim();
	$("#actualizar").click(function(){
		$(this).html("<div class='spinner'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");;
		var data = {
			"nombre": $("#nombreUsuario").val().trim(),
			"apellido": $('#apellidoUsuario').val().trim(),
			"email": $('#email').val().trim(),
			"pais": $("#pais option:selected").val(),
			"ciudad": $('#ciudad').val().trim(), 
			"cp": $('#codigoPostal').val().trim(),
			"direccion": $('#direccion').val().trim(),
			"_token": $('meta[name="csrf-token"]').attr('content')
		}

		$.post("/actualizarPerfil", data)
		.done(function(data, textStatus, xhr) {
			if( data.estado == "success" ){
				$("#actualizar").html("Actualizar perfil");
				$('#nombreUsuario').html( data.nombre);
				$('#apellidoUsuario').html(data.apellido);
				$('#email').html(data.email);
				$('#ciudad').html(data.ciudad);
				$('#codigoPostal').html(data.cp);
				$('#direccion').html(data.direcion);

				$(".alert-success").html("Tu perfil se ha actualizado correctamente!").slideDown();
				setTimeout(function() {
					$(".alert-success").slideUp("slow");
				}, 3000);
				
			}else{
				$("#actualizar").html("Actualizar perfil");
				$(".alert-danger").html("El email que has introducido ya existe!").slideDown();
				$('#email').html(email);
				setTimeout(function() {
					$(".alert-danger").slideUp("slow");
				}, 3000);
			}				
		})
		.fail(function(data, textStatus, xhr) {
			$("#actualizar").html("Actualizar perfil");
			$(".alert-danger").html("No hemos podido actualizar tu perfil, intentalo más tarde!").slideDown();
			setTimeout(function() {
				$(".alert-danger").slideUp("slow");
			}, 3000);
		})

	});

/* Fin actualizar perfil*/ 



});

$(function() {
	$( "#f-accordion" ).accordion({
		collapsible: true,
		heightStyle: "content",
		active: false
	});
});

//Alert button
$('.button').click(function(){
	$('.alert').slideToggle();
});

$('i.close').click(function(){
	$('.alert').slideToggle();
});


 //JS table filter
 (function(document) {
 	'use strict';

 	var LightTableFilter = (function(Arr) {

 		var _input;

 		function _onInputEvent(e) {
 			_input = e.target;
 			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
 			Arr.forEach.call(tables, function(table) {
 				Arr.forEach.call(table.tBodies, function(tbody) {
 					Arr.forEach.call(tbody.rows, _filter);
 				});
 			});
 		}

 		function _filter(row) {
 			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
 			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
 		}

 		return {
 			init: function() {
 				var inputs = document.getElementsByClassName('light-table-filter');
 				Arr.forEach.call(inputs, function(input) {
 					input.oninput = _onInputEvent;
 				});
 			}
 		};
 	})(Array.prototype);

 	document.addEventListener('readystatechange', function() {
 		if (document.readyState === 'complete') {
 			LightTableFilter.init();
 		}
 	});

 })(document);
//Filter Table

// AJAX PARA MOSTRAR SUBTABLAS EN MIS PUJAS

$(".productoH3").one("click",function(){
	e = $(this);
	var datos = {
		"idProducto": $(this).data("idproducto"),
		"_token": $('meta[name="csrf-token"]').attr('content')
	}
	e.next().find("tbody").append("<img style='height:40px;' src='img/loading.gif'>");
	$.post("/mostrarTabla", datos)
	.done(function(data, textStatus, xhr) {
		e.next().find("tbody").find("img").remove();
		for (var x=0; x<data.producto.length; x++){
			e.next().find("tbody").append("<tr><td>"+ data.producto[x].puja +"</td><td>"+ data.producto[x].fecha +"</td></tr>");
		}
	})
	.fail(function(data, textStatus, xhr) {
		alert("mal");	
	})
});