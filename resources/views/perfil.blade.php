<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="/img/logo7.png" type="image/x-icon" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quien da menos | Perfil</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/perfil.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	

</head>
<body>
	@if (Auth::check()) 
	@include("header.header-logged")
	@else
	@include("header.header-not-logged")
	@endif
	<div class="container">
		<div class="row">
			<div class="col-sm-12"style="margin-top: 30px;">
				<div class="sidebar-nav">
					<div class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<span class="visible-xs navbar-brand">Menú</span>
						</div>
						<div class="navbar-collapse collapse sidebar-navbar-collapse">
							<ul class="nav navbar-nav">
								<div class="subMenu btn-group btn-group-justified">								
									<a id="linkDatosUsuario" class="btn btn-default">Mis Datos</a>
									<a id="linkTusPujas" class="btn btn-default">Mis Pujas</a>
									<a id="linkEstadisticas" class="btn btn-default">Mis Puntos</a>
								</div>
							</ul>
						</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
			
			<div class="col-sm-12 misDatos">

				<div class="datosPersonales">
					<div class="panel panel-default">
						<div class="panel-heading"><h2 class="text-center">{{$user->alias}}</h2></div>
						<div class="panel-body">

							<div class="table-responsive">
								<table class="table">
									<tr>
										<td><b>Nombre</b></td>
										<td><input class="form-control" id="nombreUsuario" type="text" value="{{$user->nombre_usuario}}"></td>
									</tr>
									<tr>
										<td><b>Apellidos</b></td>
										<td><input class="form-control" id="apellidoUsuario" type="text" value="{{$user->apellido_usuario}}"></td>
									</tr>
									<tr> 
										<td><b>Email</b></td>
										<td><input class="form-control" id="email" type="text" value="{{$user->email}}"></td>
									</tr>
									<tr>
										<td><b>Pais</b></td>
										<td>
											<select id="pais" name="pais" class="form-control">
												@foreach ($paises as $pais)
												@if ($user->pais == $pais)
												{{--*/ $selected = 'selected' /*--}}
												@else 
												{{--*/ $selected = '' /*--}}
												@endif
												<option value="{{$pais}}" {{$selected}} >{{$pais}}</option>
												@endforeach
											</select>
										</td>
									</tr>
									<tr> 
										<td><b>Ciudad</b></td>
										<td><input class="form-control" id="ciudad" type="text" value="{{$user->ciudad}}"></td>
									</tr>
									<tr> 
										<td><b>Código Postal</b></td>
										<td><input class="form-control" id="codigoPostal" type="text" value="{{$user->cp}}"></td>
									</tr>
									<tr> 
										<td><b>Dirección</b></td>
										<td><input class="form-control" id="direccion" type="text" value="{{$user->direccion}}"></td>
									</tr>
								</table>

							</div> 
							<button type="button" class="btn btn-primary actualizarPerfil" id="actualizar">Actualizar perfil</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-12 misPujas">
				<h1 class="nombreUsuario"><span>Mis pujas</span></h1>

				<div id="f-accordion">
					@foreach ($productos as $producto)
					<h3 class="productoH3" data-idproducto={{$producto->id_producto}}><p style="display:inline;" class="nombreDelProducto">{{$producto->nombreProducto}}</p><p class="estadoDelProducto">{{$producto->estado}}</p></h3>
					<div>
						<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrar" />
						<section class="table-box">
							<table class="order-table">
								<thead>
									<tr>
										<th>Puntos</th>
										<th>Fecha</th>
									</tr>

								</thead>
								<tbody>
								</tbody>
							</table>
						</section>

					</div>
					@endforeach
				</div>

			</div>

			<div class="col-sm-12 misPuntos">
				<div class="panel panel-primary panelTusPuntos">
					<div class="panel-heading">
						<h3 class="panel-title">Mis puntos</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-3 col-sm-offset-5">
								<p>{{$user->puntos}} Puntos</p>
							</div>
						</div>

						<br>

						<div class="text-center col-sm-3">
							<h3>Comprar 100 puntos</h3>
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="Z6RD96VLEDUJW">
								<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
						</div>
						<div class="text-center col-sm-3">
							<h3>Comprar 500 puntos</h3>
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="8999J3UKXK5JC">
								<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>



						</div>
						<div class="text-center col-sm-3">
							<h3>Comprar 1000 puntos</h3>
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="ALWKBB9H23QVN">
								<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
						</div>
						<div class="text-center col-sm-3">
							<h3>Comprar 2000 puntos</h3>
							<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
								<input type="hidden" name="cmd" value="_s-xclick">
								<input type="hidden" name="hosted_button_id" value="UVYJNZR2TTFGY">
								<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
								<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>
						</div>
						<div style="margin-top:50px;"class="col-sm-3 col-sm-offset-5">
							<a target="_blank" href="https://www.paypal.com/es/webapps/mpp/about"><img src="../img/paypal.png" alt="" style="height: 50px; "></a>
						</div>
					</div>

				</div>
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Todas las compras de puntos se realizan a través de PayPal de forma segura y fiable</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include("footer.footer")

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="js/perfil.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

</body>
</html>