<!DOCTYPE html>
<html>
<head>
	<title>Quien da menos | Finalizado</title>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link href="/css/articulo.css" rel="stylesheet">
	<link href="/css/header.css" rel="stylesheet">
	<link rel="icon" href="/img/logo7.png" type="image/x-icon" />

	<!-- Custom Fonts -->
	<link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
	<script type="text/javascript" src="/js/countdown.js"></script>
	<style>
		.pvp {
			font-size: large;
		}

		.tiempoRestante {
			
			font-size: 18px;
			color: red;
			font-weight: 400;
			display: inline-block;
			float: right;
		}

		.badge-pujaGanadora {
			background-color: green;
		}

		.ganadorVirtual {
			font-size: 18px;
			color: #337AB7;
		}
		.modal-footer {
			border-top: 0px;
		}
		.number-spinner {
			width: 210px;
		}
		.modal-puja .input-puja {
			margin: 20px auto !important;
		}
		#modalPuja .btn-primary {
			display: block;
			width: 100px;
			margin: 0 auto;
		}
		.carousel-inner {
			height: 385px;
			width: auto;
		}
		.carousel-indicators .active {
			background-color: #000000;
		}
		.carousel-indicators li {
			border: 1px solid #000000;
		}
		.carousel-indicators {
			bottom: 0px;
		}
	</style>
</head>
<body>

	@if (Auth::check()) 
	@include("header.header-logged")
	@else
	@include("header.header-not-logged")
	@endif
	<div class="container">
		<br>
		<div class="row"><div class="col-xs-12"><hr></div></div>
		
		
		<div class="producte-fitxa">
			<div class="row">
				<div class="col-sm-6">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >


						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							@for ($i = 1; $i < count($imagenes); $i++)
							<li data-target="#carousel-example-generic" data-slide-to="{{$i}}" ></li>
							@endfor
						</ol>

						<div class="carousel-inner" role="listbox" >
							<div class="item active">
								<img src="/{{$imagenes[0]->ruta}}" alt="" style="width:100%" >
							</div>
							@for ($i = 1; $i < count($imagenes); $i++)
							<div class="item ">
								<img src="/{{$imagenes[$i]->ruta}}" alt="" style="width:100%" >
							</div>
							@endfor
						</div>
						<!-- Controls -->
					<!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a> -->
				</div>
				<br>
			</div>
			<div class="col-sm-6  ">
				<div class="info-fitxa-1">
					<h1>{{$producto->nombre_producto}} <br>
						<span class="pvp" > PVP {{$producto->precio_mercado}} € </span>

					</h1>
					<ul class="list-group">

						<li class="list-group-item">
							<div class=" text-right tiempoRestante">
								<ul > 
									<span>Finalizado</span>
								</ul>
							</div>
							Número de pujas totales : <b id="js-numeroPujas"> {{$numeroPujas->numeroPujas}}</b> <br> 
						</li>
					</ul>

				</div>

				<div class="row text-center">
					<h3>
						El usuario 
						<b>
							{{$aliasGanador}}
						</b>
						se ha llevado este producto por <br><b>{{$puntosPujadosGanadorSubasta}}</b> puntos
					</h3>
					<br>
					<a href="/productos" >
						<button type="button" class="btn btn-success">Volver a productos</button>
					</a>
				</div>
			</div>

		</div>
		<div class="row"><div class="col-md-12"><hr>
			<h4>Gràfico de todas las pujas</h4>
			<div id="grafico" style="margin: 0 auto"></div></div></div>
			<br>
			<div class="tabs-fitxa">
				<div class="row">
					<div class="col-md-12">
						<div role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Entrega</a></li>
								<li role="presentation"><a href="#fichapdf" aria-controls="settings" role="tab" data-toggle="tab">Características</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<h3>Detalles</h3>
									<p>La venta de productos en nuestro servicio de subastas es realizada por las compañias Correos, MRW y Seur. 
										Todos los artículos provienen de fuentes autorizadas y son entregados de forma totalmente segura mediante empresas tales como Amazon o Rakuten u otros proveedores de renombre. <br><br>
										Para todos los productos vendidos, el cliente obtiene derecho a la reclamación i/o a su devolución y recibe la garantía vigente en España. 
										En el caso de cualquier pregunta o duda, les invitamos a ponerse en contacto con Atención al Cliente a través del formulario de contacto disponible en nuestra página.<br><br>
										Regulaciones jurídicas: DIRECTIVA 1999/44/CE DEL PARLAMENTO EUROPEO Y DEL CONSEJO 1999/44/EC de 25 de mayo de 1999 sobre determinados aspectos de la venta y las garantías de los bienes de consumo (DIRECTIVA 1999/44/CE).</p>
									</div>


									<div role="tabpanel" class="tab-pane" id="fichapdf">
										<h3>Especificaciones</h3>
										<div class="table-responsive">
											<?= htmlspecialchars_decode(stripslashes($producto->caracteristicas)); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Modal Pujar -->
		<div class="modal fade" id="modalPuja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					<div class="modal-body modal-puja text-center ">

						<h3>Puntos totales: <span class="label label-default puntos-usuario">{{ isset($user) ? $user->puntos : 0 }}</span></h3>

						<div class="input-group input-puja" style="margin: 0 auto;">

							<!-- <input name="qPuja" type="text" class="form-control" placeholder="¿Cuanto quieres pujar?" autofocus aria-describedby="basic-addon1"> -->

							<div class="input-group number-spinner">
								<span class="input-group-btn data-dwn">
									<button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
								</span>

								<input type="text" class="form-control text-center" data-idproducto="" id="inputPuja" value="1" min="1" max="40">

								<span class="input-group-btn data-up">
									<button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
								</span>
							</div>
						</div>


					</div>
					<div class="modal-footer ">
						<label class="control-label label-error" style="display:none;text-align:center;color:red;  width: 100%;" for="qPuja">Tienes que introducir un dígito válido!</label>
						<button id="js-enviar-puja" type="button" class="btn btn-primary">Puja</button>

					</div>
				</div>
			</div>
		</div>

		<!-- Fin Modal Pujar -->


		@include("footer.footer")
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<script src="https://serene-refuge-3117.herokuapp.com/js/socket.io.js"></script>
		<script src="/js/highcharts.js"></script>
		<script src="/js/exporting.js"></script>




		<style type="text/css" media="screen">
			@-webkit-keyframes nuevaPuja {
				0% {background-color: #BBDEFB;}
				100% {background-color: white;}
			}

			.nuevaPuja {
				-webkit-animation: nuevaPuja 2s ease-in-out 1 normal;
			}	
		</style>


		<script type="text/javascript">




			var socket = io.connect("https://serene-refuge-3117.herokuapp.com", {query: 'idProducto=' + {{$producto->id_producto}} });


			socket.on('updateArticulo' + {{$producto->id_producto}}, function(data) {
				console.log(data);
									//si no hay ganador, escondemos los iconos
									if (!data.nombrePujaGanadora) {
										$(".badge-pujaGanadora").fadeOut("fast", function() {
											$(this).remove();
										});
									}
									//mostramos el ganador si lo hay
									var nombreGanador = data.nombrePujaGanadora == "" ? "Aún no hay ganador" : data.nombrePujaGanadora;
									$(".ganadorVirtual").find('b').text( nombreGanador );
									//incrementamos el numero de pujas en 1
									$("#js-numeroPujas").text( parseInt($("#js-numeroPujas").text()) + 1 );
									
									var htmlPujaGanadora = "";
									//si esta puja es la ganadora, mostramos el badge
									if (data.pujaGanadora) {
										//eliminem el badge existent
										$(".badge-pujaGanadora").fadeOut("fast", function() {
											$(this).remove();
										});

										htmlPujaGanadora = "<span class='badge badge-pujaGanadora'>Puja ganadora!</span>";
									} else {
										//si no es ganadora

										

										//buscamos si la puja ganadora se encuentra en la lista

										var elPujaGanadora = $("#ultimosPujadores").find("li[data-idpuja='" + data.idPujaGanadora + "']");

										if (elPujaGanadora.length > 0) {
											$(".badge-pujaGanadora").fadeOut("fast", function() {
												$(this).remove();
											});
											elPujaGanadora.append("<span class='badge badge-pujaGanadora'>Puja ganadora!</span>");
										}
									}

									var nuevoElemento = $("<li class='list-group-item' data-idpuja='" + data.idPuja + "'><b>" + data.usuario + "</b> hace <span class='time-puja'> </span>" + htmlPujaGanadora + "</li>");

									var date = data.fecha;
									var startLive = new Date( date );
									var year = startLive.getUTCFullYear();
									var mes = startLive.getUTCMonth();
									var dia = startLive.getDate();
									//+2 horas ya que el servidor devuelve 2 h menos
									var hora = startLive.getHours() + 2;
									var minutos = startLive.getMinutes();
									var segundos = startLive.getSeconds();

									setInterval(function(year, month, day, hora, minutos, segundos, nuevoElemento) {
										var time = countdown( new Date(year, month, day, hora, minutos, segundos) );
						//si no ha pasado ni un minuto, mostramos los segundos

						if (time.minutes < 1) {
							nuevoElemento.find(".time-puja").text(time.seconds + " segundos");
						} else if (time.minutes > 0 && time.hours < 1) {
							nuevoElemento.find(".time-puja").text(time.minutes + " minutos");
						} else if (time.hours > 0 && time.days < 1) {
							nuevoElemento.find(".time-puja").text(time.hours + " horas");
						} else {
							nuevoElemento.find(".time-puja").text(time.days + " dia");
						}
						
					}.bind(this, year, mes, dia, hora, minutos, segundos, nuevoElemento),1000);

									nuevoElemento.hide().prependTo("#ultimosPujadores").show("fast").addClass("nuevaPuja");

									setTimeout(function() {
										nuevoElemento.removeClass('nuevaPuja');						
									},2000);

								});
// Array que guardara cada punto que se ha pujado
var arrayPuntos = [];
var puntos = @foreach ($consultaGrafico as $grafico)
arrayPuntos.push({{$grafico->puntos_pujados}})
@endforeach
;

// Array que guardará cuantas veces se ha pujado por cada punto
var arrayPujas =[];
var pujas = @foreach ($consultaGrafico as $grafico)
arrayPujas.push({{$grafico->numPujas}})
@endforeach
;

suma = 0;

for (var x=0; x<arrayPuntos.length; x++){
	suma += (arrayPuntos[x]*arrayPujas[x]);
}
suma = (suma/100 )+" €"

$(function () {
	$('#grafico').highcharts({
		chart: {
			type: 'bar'
		},
		title: {
			text: "{{$producto->nombre_producto}}"
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: arrayPuntos,
			title: {
				text: "Puntos"
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Número de pujas',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ''
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 100,
			floating: true,
			borderWidth: 1,
			backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
			shadow: true
		},
		credits: {
			enabled: false
		},
		series: [{
			name: 'Número de pujas',
			data: arrayPujas
		}]
	});
});

</script>

<!-- script puja -->
<script type="text/javascript">


	$( document ).ready(function() {

		var socket = io.connect("https://serene-refuge-3117.herokuapp.com");


		socket.on('update', function(data){
			console.log(data);
			var elementoActualizado = $("#productos").find("div[data-id='" + data["id_producto"] + "']");
			if(elementoActualizado.length > 0) {
				elementoActualizado.find(".js-numPujas").text(data.numeroPujas);
					//si no hay ganador, mostramos el texto adequado
					var ganadorActual = (data.ganadorActual != undefined ? "Ganador actual: " + data.ganadorActual : "Aún no hay ganador"); 
					elementoActualizado.find('.js-ganadorActual').text(ganadorActual);
				}

			});



		$("#enviar-puja-modal").click(function(event) {
			botonPuja = $(this);
				//solo se muestra el modal de puja si estas autenticado, de lo contrario se muestre el modal registrar
				if (infoUser.id != undefined) {
					$("#modalPuja").modal("show");	
				} else {
					$("#modalRegistrar").modal("show");
				}				
			});

		$("#js-enviar-puja").click(function(event) {
			botonPuja.html("<div class='spinner'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");;
			$("#modalPuja").modal("hide");
			var dataToSend = {
				"puntos": $("#inputPuja").val(),
				"idproducto": {{$producto->id_producto}},
				"_token": $('meta[name="csrf-token"]').attr('content')
			}


			$.post("/usuario/pujar", dataToSend)
			.done(function(data, textStatus, xhr) {
				botonPuja.html("Pujar");
				if (data.result == "success") {
							//incrementa en 1 el nombre de mis pujas
							var idProducto = {{$producto->id_producto}};

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
				botonPuja.html("Pujar");
				$(".alert-danger").html("<b>" + data.result + "! </b> " + data.message).fadeIn("fast");
				setTimeout(function() {
					$(".alert-danger").fadeOut("fast");
				}, 3000)
			})

		});

var infoUser = {
	id: {{ isset($user) ? $user->id : "undefined" }},
	punts: {{ isset($user) ? $user->puntos : 0 }},
	updatePunts: function(punts) {
		var puntsProvisionals = infoUser.punts - punts;
		$(".puntos-usuario").text(puntsProvisionals); 
	}
}



			//control de errores en el input puja
			$("#inputPuja").keydown(function(event) {
				setTimeout(function() {
					var puja = $(this).val();
					//si no es válido, muestra error
					if(!/^\d+$/.test(puja) && puja.length != 0) {
						$(".label-error").show();
					} else {
						
						$(".label-error").hide();
						if(parseInt(puja) > parseInt(infoUser.punts)) {
							$(this).val(infoUser.punts);
							infoUser.updatePunts(infoUser.punts);
						} else if(puja == 0){
							$(this).val(1);
							infoUser.updatePunts(1);
						} else {
							infoUser.updatePunts(infoUser.punts);
						}
					}
				}.bind(this),0);

				$('[data-toggle="tooltip"]').tooltip(); 
			});

			//click en pujar
			$(".btn-puja").click(function(event) {
				$(".puntos-usuario").text(infoUser.punts);
				var valorPujaMaxima = $(this).closest('.elementoProducto').data("pujamaxima");
				var idProducto = $(this).closest('.elementoProducto').data("id");
				//si el valor de la puja maxima es mas grande, el valor maximo sera el numero de puntos del usuario
				if (parseInt(valorPujaMaxima)*100 > parseInt(infoUser.punts)) {
					$("#inputPuja").attr("max",infoUser.punts);
				} else {
					$("#inputPuja").attr("max",valorPujaMaxima);	
				}
				
				$("#inputPuja").data('idproducto', idProducto);
				$("#inputPuja").val(1);

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

</script>

<!-- fin script puja -->
</body>
</html>