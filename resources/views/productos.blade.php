<!DOCTYPE html>
<html>
<head>
	<title>Quien da menos | Productos</title>
	<link rel="icon" href="img/logo7.png" type="image/x-icon" />
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="css/bootstrap.min.css">	
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/productos.css">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
	@if (Auth::check()) 
		@include("header.header-logged")
	@else
		@include("header.header-not-logged")
	@endif
	<ul class="nav nav-tabs">
		<li id="linkEnPuja" role="presentation" class="active"><a>En puja</a></li>
		<li id="linkFinalizados" role="presentation"><a>Finalizados</a></li>
	</ul>
	<div class="container products">
		<div id="productos" class="row">
			<!-- CAPA DONDE ESTAN LOS PRODUCTOS -->	
			@foreach ($productos as $producto)
				@if ($producto->estado=="Pujando")
			<div data-id="{{$producto->id_producto}}" data-pujaMaxima="{{$producto->puja_maxima}}" class="col-sm-6 col-md-4 elementoProducto">
				<div class="thumbnail">
					<div class="product">
						
						<img src=' {{$producto->imagen_principal}} '>
						<div class="img-info"> 
							<p class="img-info-mainTitle">{{$producto->nombre_producto}}</p>
							<div class="img-general-info">
								<div class="row">
									<div class="col-xs-offset-3 col-xs-6">
										<div class="img-info-title">
											<span style="font-size:14px;" data-toggle="tooltipRight" title="Número de pujas realizadas por mi">Mis pujas: </span> <span class="numDestacado js-misPujas">{{$producto->misPujas}}</span>
										</div>
										<div class="img-info-title"> 
											<span style="font-size:14px;" data-toggle="tooltipRight" title="Pujas realizadas por todos los usuarios">Número de pujas: </span> <span class="numDestacado js-numPujas">{{$producto->numeroPujas}}</span>
										</div>
										<div class="img-info-title"> 
											<span style="font-size:14px;" data-toggle="tooltipLeft" title="Cantidad de pujas necesaria para que haya un ganador(si no se alcanza se añadirán 12 horas a la subasta)">Pujas mínimas: </span> <span class="numDestacado">{{$producto->num_pujas_minimas}}</span>
										</div>
									</div>
								</div>
							</div>

							<div class="js-ganadorActual">
								<p style="font-size:14px;">{{ isset($producto->ganadorActual) ? "Ganador actual: " . $producto->ganadorActual : "Aún no hay ganador!"}}</p>
							</div>

							<a href="/producto/{{$producto->id_producto }}" >
								<button type="button" class="btn btn-success">Detalles</button>
							</a>
						</div>
					</div>
					<div class="caption">
						<p>
							<a href="#" class="btn btn-danger btn-puja" role="button">Pujar</a>
						</p>
						<ul class="time">
							<li><span class="time-hours"></span></li>
							<li><span class="time-minutes"></span></li>
							<li><span class="time-seconds"></span></li>
						</ul>
						<ul class="time time-text">
							<li>horas</li>
							<li>minutos</li>
							<li>segundos</li>
						</ul>

					</div>
				</div>
			</div>


			<script type="text/javascript">
				(function () {
					var id = {{$producto->id_producto}};

					var date = {{ strtotime($producto->fecha_maxima)*1000 }};
					var startLive = new Date( date );
					var year = startLive.getUTCFullYear();
					var mes = startLive.getUTCMonth() + 1;
					var dia = startLive.getUTCDate();
					var horas = startLive.getHours() - 2;
					var minutos = startLive.getMinutes();
					var segundos = startLive.getSeconds();

					setInterval(function(i, year, month, day, hours, minutes, seconds) {
						var time = countdown( new Date(year, month, day, hours, minutes, seconds) );
						$("[data-id='" + i + "']").find(".time-days").text(time.days);
						$("[data-id='" + i + "']").find(".time-hours").text(time.hours);
						$("[data-id='" + i + "']").find(".time-minutes").text(time.minutes);
						$("[data-id='" + i + "']").find(".time-seconds").text(time.seconds);
					}.bind(this,id, year, mes, dia, horas, minutos, segundos),1000);
				})();
			</script>

			@endif
			@endforeach
		</div>
		<div id="finalizados" class="row">
			<!-- CAPA DONDE ESTAN LOS PRODUCTOS -->	
			@foreach ($productos as $producto)
				@if ($producto->estado=="Finalizado")

			<div data-id="{{$producto->id_producto}}" data-pujaMaxima="{{$producto->puja_maxima}}" class="col-sm-6 col-md-4 elementoproducto_finalizado">
				<div class="thumbnail">
					<div class="product">
						
						<img src=' {{$producto->imagen_principal}} '>
						<div class="img-info"> 
							<p class="img-info-mainTitle">{{$producto->nombre_producto}}</p>
							<div class="img-general-info">
								<div class="row">
									<div class="col-xs-offset-3 col-xs-6">
										<div class="img-info-title">
											<span data-toggle="tooltipRight" title="Número de pujas realizadas por mi">Mis pujas: </span> <span class="numDestacado js-misPujas">{{$producto->misPujas}}</span>
										</div>
										<div class="img-info-title"> 
											<span data-toggle="tooltipRight" title="Pujas realizadas por todos los usuarios">Número de pujas: </span> <span class="numDestacado js-numPujas">{{$producto->numeroPujas}}</span>
										</div>
										<div class="img-info-title"> 
											<span data-toggle="tooltipLeft" title="Cantidad de pujas necesaria para que haya un ganador(si no se alcanza se añadirá más tiempo a la puja)">Pujas mínimas: </span> <span class="numDestacado">{{$producto->num_pujas_minimas}}</span>
										</div>
									</div>
								</div>
							</div>

							<a href="/producto/finalizado/{{$producto->id_producto }}" >
								<button type="button" class="btn btn-success">Detalles</button>
							</a>
						</div>
					</div>
					<div class="caption text-center">
						<p>
							<a href="/producto/finalizado/{{$producto->id_producto }}" >
								<button type="button" class="btn btn-success">Ver resultados</button>
							</a>
						</p>
							<span>Producto adquirido por <b>{{$producto->ganadorActual}}</b></span>
				

					</div>
				</div>
			</div>


				@endif
			@endforeach
		</div>


	</div>


	


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

	@include('footer.footer')



<script src="js/productos.js" type="text/javascript"></script>
<script>
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
					$("#inputPuja").attr("max",punts);
				}
			}
</script>
<script type="text/javascript" src="js/countdown.js"></script>

<script src="https://serene-refuge-3117.herokuapp.com/js/socket.io.js"></script>
</body>
</html>