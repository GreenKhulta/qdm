<link rel="stylesheet" href="/css/header.css">
<a href="/productos"><img style="margin-left:10px;" src="/img/logo7.png" alt="" id="logo"></a>
	<div id='cssmenu'>
		<ul>
			<li id="liProductos">
				<a href="/productos">Productos</a>
			</li>
			<li>
				<a data-toggle="modal" data-target="#modalRegistrar">Regístrate</a>
			</li>
			<li>
				<a data-toggle="modal" data-target="#modalLogIn">Iniciar sesión</a>
			</li>
		</ul>
	</div>
<!-- DIVS NOTIFICACIONES -->
<div class="alert alert-success">
</div>
<div class="alert alert-danger">
</div>
<!-- <script src="../js/grayscale.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>
<script>

	$(document).ready(function(){


		$('#aceptoCondiciones').click(function () {
        //check if checkbox is checked
        if ($(this).is(':checked')) {
        	$('#botonRegistrar').removeAttr('disabled');

        } else {
        	$('#botonRegistrar').attr('disabled', true); 
        }
    });
	})
</script>