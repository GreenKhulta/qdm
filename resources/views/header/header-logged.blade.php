<link rel="stylesheet" href="/css/header.css">
<div id="nav">
	<a href="/productos"><img style="margin-left:10px;" src="/img/logo7.png" alt="" id="logo"></a>
	<div id='cssmenu'>
		<ul>
			<li>
				<a href="/perfil#misPuntos"><span id="puntosActuales">{{Auth::user()->puntos}}</span> Puntos</a>
			</li>
			<li id="liProductos">
				<a href="/productos">Productos</a>
			</li>
			<li id="liPerfil" class='has-sub'><a href='/perfil'>{{Auth::user()->alias}}</a>
				<ul>
					<li><a href='/perfil#misDatos'>Mis Datos</a></li>
					<li><a href='/perfil#misPujas'>Mis Pujas</a></li>
					<li><a href='/perfil#misPuntos'>Puntos</a></li>
				</ul>
			</li>
			<li>
				<a href="/auth/logout"><i class="fa fa-sign-out"></i>Salir</a>
			</li>
		</ul>
	</div>
</div>
<!-- DIVS NOTIFICACIONES -->
<div class="alert alert-success">
</div>
<div class="alert alert-danger">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
