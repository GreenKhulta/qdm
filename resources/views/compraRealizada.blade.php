<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="/img/logo7.png" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quien da menos | Compra Realizada</title>
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
		<h1>Gracias por tu compra, en breve recibirás los puntos en tu perfil</h1>
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