<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="/img/logo7.png" type="image/x-icon" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quien da menos | Artículo</title>
	
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link href="/css/articulo.css" rel="stylesheet">
	<link href="/css/header.css" rel="stylesheet">

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
							<!--
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
							<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
							<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
						-->
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
				<div class="row text-center">

					<a type="button" class="btn btn-danger btn-puja" style="margin: 10px; width:45%;">Pujar</a>
					<div style="margin-top:20px;">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Quien da menos -->
						<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-4603289058355725"
						data-ad-slot="8482323095"
						data-ad-format="auto"></ins>
						<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				</div>

			</div>
			<div class="col-sm-6  ">
				<div class="info-fitxa-1">
					<h1>{{$producto->nombre_producto}} 
						<span class="pvp" > PVP {{$producto->precio_mercado}} € </span>

					</h1>
					<ul class="list-group">

						<li class="list-group-item">
							<div class=" text-right tiempoRestante">

								<ul > 
									<span class="time-hours"></span>:<span class="time-minutes"></span>:<span class="time-seconds"></span>
								</ul>
							</div>
							Número de pujas : <b id="js-numeroPujas"> {{$numeroPujas->numeroPujas}}</b> <br> 
							Pujas mínimas : <b> {{$producto->num_pujas_minimas}} </b>
						</li>
					</ul>

				</div>

				<script>
					(function () {

						var date = {{ strtotime($producto->fecha_maxima)*1000 }};
						var startLive = new Date( date );
						var year = startLive.getUTCFullYear();
						var mes = startLive.getUTCMonth() + 1;
						var dia = startLive.getUTCDate();
						var horas = startLive.getHours() - 2;
						var minutes = startLive.getMinutes();
						var seconds = startLive.getSeconds();

						setInterval(function( year, month, day, horas, minutes) {
							var time = countdown( new Date(year, month, day, horas, minutes, seconds) );
							$(".time-hours").text(time.hours);
							$(".time-minutes").text(time.minutes);
							$(".time-seconds").text(time.seconds);
						}.bind(this, year, mes, dia, horas, minutes, seconds),1000);
					})();

				</script>

				<div class="row text-center">
					<span class="ganadorVirtual" >
						Ganador actual: 
						<b>
							{{ isset($aliasGanador) ? $aliasGanador : 'Aún no hay ganador'}}
						</b>
					</span>
				</div>


				<h4>Últimos Pujadores</h4>
				<ul class="list-group" id="ultimosPujadores">
					@foreach ($listaPujas as $puja)
					<li class="list-group-item" data-idPuja={{$puja->id_puja}}>
						@if(isset($idPujaGanadora) && $puja->id_puja == $idPujaGanadora)
						<b>{{$puja->alias}}</b> hace <span class='time-puja' data-pujaid="{{$puja->id_puja}}" ></span><span class='badge badge-pujaGanadora'>Puja ganadora!</span>
						@else
						<b>{{$puja->alias}}</b> hace <span data-pujaid="{{$puja->id_puja}}" class='time-puja' ></span>
						@endif
					</li>
					<script type="text/javascript">
						(function() {

							var nuevoElemento = $("#ultimosPujadores").find("li[data-idPuja='" + {{$puja->id_puja}} + "']");

							var startLive = new Date( {{ strtotime($puja->fecha)*1000 }} );
							var year = startLive.getUTCFullYear();
							var mes = startLive.getUTCMonth();
							var dia = startLive.getDate();

													//+2 horas ya que el servidor devuelve 2 h menos
													var hora = startLive.getHours();
													var minutos = startLive.getMinutes();
													var segundos = startLive.getSeconds();

													setInterval(function(year, month, day, hora, minutos, segundos, nuevoElemento) {
														var time = countdown( new Date(year, month, day, hora, minutos, segundos) );
														//si no ha pasado ni un minuto, mostramos los segundos
														if (time.minutes < 1 && time.hours < 1) {
															nuevoElemento.find(".time-puja").text(time.seconds + " segundos");
														} else if (time.minutes > 0 && time.hours < 1) {
															nuevoElemento.find(".time-puja").text(time.minutes + " minutos");
														} else if (time.hours > 0 && time.days < 1) {
															nuevoElemento.find(".time-puja").text(time.hours + " horas");
														} else {
															nuevoElemento.find(".time-puja").text(time.days + " dia(s)");
														}					
														
													}.bind(this, year, mes, dia, hora, minutos, segundos, nuevoElemento),1000);


													$("#ultimosPujadores").append(nuevoElemento);
												})();
												
											</script>
											@endforeach
										</ul>

									</div>

								</div>
								<div class="row"><div class="col-md-12"><hr></div></div>
								<br>
								<div class="tabs-fitxa">
									<div class="row">
										<div class="col-md-12">
											<div role="tabpanel">
												<!-- Nav tabs -->
												<ul class="nav nav-tabs" role="tablist">
													<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Opciones de compra</a></li>
													<li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Características</a></li>
													<li role="presentation"><a href="#fichapdf" aria-controls="settings" role="tab" data-toggle="tab">Entrega</a></li>
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
													<div role="tabpanel" class="tab-pane active" id="profile">
														<div class="col-sm-12 text-center">
															<h2>Compra el producto mediante este link y te descontamos todo lo que hayas pujado por el!
															</h2><br>


															<a target="_blank" href="http://www.amazon.es/b/ref=as_li_ss_tl?_encoding=UTF8&camp=3626&creative=24822&linkCode=ur2&node=599370031&site-redirect=&tag=quidamen-21"><img style="margin-left:20px;" width="100" height="60" src="../img/logoAmazon.jpg" alt=""></a><img src="https://ir-es.amazon-adsystem.com/e/ir?t=quidamen-21&l=ur2&o=30" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />
														</div>
														
														
													</div>
													<div role="tabpanel" class="tab-pane" id="home">
														<h3>Especificaciones</h3>

														<div class="table-responsive">
															<?= htmlspecialchars_decode(stripslashes($producto->caracteristicas)); ?>
														</div>

														<!--
														<ul>
															<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</li>
															<li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</li>
														</ul>
													-->
												</div>
												

												<div role="tabpanel" class="tab-pane" id="fichapdf">
													<h3>Detalles</h3>
													<p>La venta de productos en nuestro servicio de subastas es realizada por las compañias Correos, MRW y Seur. 
														Todos los artículos provienen de fuentes autorizadas y son entregados de forma totalmente segura mediante empresas tales como Amazon o Rakuten u otros proveedores de renombre. <br><br>
														Para todos los productos vendidos, el cliente obtiene derecho a la reclamación i/o a su devolución y recibe la garantía vigente en España. 
														En el caso de cualquier pregunta o duda, les invitamos a ponerse en contacto con Atención al Cliente a través del formulario de contacto disponible en nuestra página.<br><br>
														Regulaciones jurídicas: DIRECTIVA 1999/44/CE DEL PARLAMENTO EUROPEO Y DEL CONSEJO 1999/44/EC de 25 de mayo de 1999 sobre determinados aspectos de la venta y las garantías de los bienes de consumo (DIRECTIVA 1999/44/CE).</p>
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
									<div class="modal-body modal-puja">

										<h3>Puntos totales: <span class="label label-default puntos-usuario">{{ isset($user) ? $user->puntos : 0 }}</span></h3>
										<div class="input-group input-puja">

											<div class="input-group number-spinner">
												<span class="input-group-btn data-dwn">
													<button class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
												</span>

												<input type="text" class="form-control text-center" data-idproducto="" id="inputPuja" value="1" min="1">
												<span class="input-group-btn data-up">
													<button class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
												</span>
											</div>
										</div>


									</div>
									<div class="modal-footer">
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
									var nombreGanador = !data.nombrePujaGanadora ? "Aún no hay ganador" : data.nombrePujaGanadora;
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
									var dia = startLive.getUTCDate();
									//+2 horas ya que el servidor devuelve 2 h menos
									var hora = startLive.getHours() + 2;
									var minutos = startLive.getMinutes();
									var segundos = startLive.getSeconds();

									setInterval(function(year, month, day, hora, minutos, segundos, nuevoElemento) {
										var time = countdown( new Date(year, month, day, hora, minutos, segundos) );
						//si no ha pasado ni un minuto, mostramos los segundos

						if (time.minutes < 1) {
							nuevoElemento.find(".time-puja").text(time.seconds + " s");
						} else if (time.minutes > 0 && time.hours < 1) {
							nuevoElemento.find(".time-puja").text(time.minutes + " min");
						} else if (time.hours > 0 && time.days < 1) {
							nuevoElemento.find(".time-puja").text(time.hours + " h");
						} else {
							nuevoElemento.find(".time-puja").text(time.days + " dia(s)");
						}	

					}.bind(this, year, mes, dia, hora, minutos, segundos, nuevoElemento),1000);

									nuevoElemento.hide().prependTo("#ultimosPujadores").show("fast").addClass("nuevaPuja");

									setTimeout(function() {
										nuevoElemento.removeClass('nuevaPuja');						
									},2000);

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



		$(".btn-puja").click(function(event) {
			botonPujar = $(event.target);
				//solo se muestra el modal de puja si estas autenticado, de lo contrario se muestre el modal registrar
				if (infoUser.id != undefined) {
					$("#modalPuja").modal("show");	
				} else {
					$("#modalRegistrar").modal("show");
				}				
			});

		$("#js-enviar-puja").click(function(event) {

			var puja = $("#inputPuja").val();

			if(/^\d+$/.test(puja) && puja > 0) {

				botonPujar.html("<div class='spinner'><div class='rect1'></div><div class='rect2'></div><div class='rect3'></div><div class='rect4'></div><div class='rect5'></div></div>");;
				$("#modalPuja").modal("hide");
				var dataToSend = {
					"puntos": $("#inputPuja").val(),
					"idproducto": {{$producto->id_producto}},
					"_token": $('meta[name="csrf-token"]').attr('content')
				}
				puntosEnviados = dataToSend.puntos;


				$.post("/usuario/pujar", dataToSend)
				.done(function(data, textStatus, xhr) {
					$("#puntosActuales").text($("#puntosActuales").text()-puntosEnviados);
					$(".btn-danger").text("Pujar");
					if (data.result == "success") {
						infoUser.actualizaCampos(data.misPuntos);
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


var infoUser = {
	id: {{ isset($user) ? $user->id : "undefined" }},
	punts: {{ isset($user) ? $user->puntos : 0 }},
	updatePunts: function(punts) {
		var puntsProvisionals = infoUser.punts - punts;
		$(".puntos-usuario").text(puntsProvisionals); 
	},
	actualizaCampos: function(punts) {
		infoUser.punts = punts;
		$("#puntosActuales").html(punts);
		$(".puntos-usuario").html(punts);
		$("#inputPuja").attr("max", punts);
	}
}



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