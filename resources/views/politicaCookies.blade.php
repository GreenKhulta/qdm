<html lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <link rel="icon" href="/img/logo7.png" type="image/x-icon" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Preguntas frecuentes quiendamenos.es">
	<meta name="Aprenents" content="">

	<title>Quien da menos | Política Cookies</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link href="css/header.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        @if (Auth::check()) 
        @include("header.header-logged")
        @else
        @include("header.header-not-logged")
        @endif
        <!-- Navigation -->
        <div class="container">
        <br>
          <div class="panel-group" id="accordion">
             <div class="panel panel-default">
                <div class="panel-heading">
                   <h3>
                      Política de Cookies
                  </h3>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
               <div class="panel-body"><p style="text-align: justify;">
                  Con el objectivo de poder ofrecer los servicios que se le adapte a sus  preferencias y gustos, QuienDaMenos S.L. utilizará cookies. Las cookies són ficheros de texto que los servidores envían a su disco duro para facilitar a su ordenador un acceso más rápido a la página web. La finalidad de las cookies de QuienDaMenos S.L. es personalizar los servicios que le ofrecemos, facilitándole datos que pueda ser de su utilidad. Las cookies no extraen información de su ordenador, ni concretan dónde se encuentra usted.<br><br>

                  En caso de que usted no quiera que se instale en su disco duro una cookie, podrá configurar su navegador para no recibirlas. No obstante, le tenemos que comunicar, en todo caso, la calidad del funcionamiento de la página web puede disminuir. <br><br>

                  Con la misma finalidad de adecuar a sus preferencias los  productos y servicios que se le ofrecen, así como para poder sacar análisis del funcionamiento de la página web, los movimientos realizados en su navegador quedarán registrados en un fichero. Este fichero de movimientos permite a QuienDaMenos S.L. detectar y localizar las posibles  problemas o incidencias que puedan surgir y solucionarlos en el menor plazo posible, seguir ofreciendo los servicios que solicita, conocer mejor sus preferencias y ofrecerle otros servicios y productos que puedan adecuarse a los de sus gustos. <br><br>

                  QuienDaMenos S.L. se reserva la opción de actulizar esta Política de Cookies para adaptarla a las novedades legislativas, jurisprudenciales o de interpretación de la Agencia Española de Protección de Datos. En este caso, QuienDaMenos les informará de dichos modificaciones indicando claramente y con la debida antelación los cambios efectuados, y solicitando, en caso necesario, su aceptación de estas modificaciones.
              </p>
          </div>
      </div>
  </div>
</div>
</div>


@include("footer.footer")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>