<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="img/logo7.png" type="image/x-icon" />

	<title>Quien da menos</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/landing-page.css">

	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-55641684-3', 'auto');
		ga('send', 'pageview');

	</script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
    	<!-- DIVS NOTIFICACIONES -->
    	<div class="alert alert-success">
    	</div>
    	<div class="alert alert-danger">
    	</div>
    	<!-- Navigation -->
    	<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    		<div class="container topnav">
    			<!-- Brand and toggle get grouped for better mobile display -->
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    					<span class="sr-only">Navegación</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>

    				<!-- <a class="navbar-brand topnav" href="#">Quién da menos</a> -->
    			</div>
    			<!-- Collect the nav links, forms, and other content for toggling -->
    			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    				<div class="borderXwidth">
    					<ul class="nav navbar-nav navbar-right">
    						<li>
    							<a id="linkComoFunciona">Como funciona</a>
    						</li>
    						<li>
    							<a data-toggle="modal" data-target="#modalRegistrar">Regístrate</a>
    						</li>
    						<li>
    							<a data-toggle="modal" data-target="#modalLogIn">Iniciar sesión</a>
    						</li>
    					</ul>
    				</div>
    			</div>
    			<!-- /.navbar-collapse -->
    		</div>
    		<!-- /.container -->
    	</nav>


    	<!-- Header -->
    	<a name="about"></a>
    	<div class="intro-header">
    		<div class="container">

    			<div class="row">
    				<div class="col-lg-12">
    					<div class="intro-message">
    						<h1>Descubre la nueva forma de hacer subastas</h1>
    						<hr class="intro-divider">
    						<h3>Adquiere productos a precios increibles donde la puja más baja gana</h3>
                            <h1 style="cursor:pointer; margin-top:70px;"><a id="bajar"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></h1></a>
    					</div>
    				</div>
    			</div>

    		</div>
    		<!-- /.container -->

    	</div>
    	<!-- /.intro-header -->

    	<!-- Page Content -->

    	<a  id="comoFunciona" name="services"></a>
    	<div id="seccion1" class="content-section-b">

    		<div class="container">
    			<div class="row">
    				<div class="col-lg-5 col-sm-6">
    					<hr class="section-heading-spacer">
    					<div class="clearfix"></div>
    					<h2 class="section-heading">Encuentra un producto que te guste</h2>
    					<p class="lead">Busca el producto que te guste y empieza a pujar por el</p>
    				</div>
    				<div class="col-lg-5 col-lg-offset-2 col-sm-6">
    					<img class="img-responsive" src="img/phones.png" alt="">
    				</div>
    			</div>

    		</div>
    		<!-- /.container -->

    	</div>
    	<!-- /.content-section-a -->

    	<div id="seccion2" class="content-section-a">

    		<div class="container">

    			<div class="row">
    				<div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
    					<hr class="section-heading-spacer">
    					<div class="clearfix"></div>
    					<h2 class="section-heading">Haz la puja única y más baja</h2>
    					<p class="lead">Puja por tu producto una cantidad mas cercana a 0€ que ningún otro usuario haya hecho</p>
    				</div>
    				<div class="col-lg-5 col-sm-pull-6  col-sm-6">
    					<div class="row">
    						<div class="col-xs-3  puja puja1">
    							<h4>0.01€</h4>
    							<img class="bidIcon" src="img/bid.png" alt="">
    							<img class="bidIcon" src="img/bid.png" alt="">
    							<img class="bidIcon" src="img/bid.png" alt="">
    						</div>

    						<div class="col-xs-3 col-xs-offset-1 puja puja3">
    							<img class="bidWinner" src="img/bidWinner.png">
    							<h4>0.27€</h4>                              
    							<img class="bidIcon" src="img/bid.png" alt="">
    						</div>
    						<div class="col-xs-3 col-xs-offset-1 puja puja4">
    							<h4>0.36€</h4>
    							<img class="bidIcon" src="img/bid.png" alt="">
    						</div>    
    					</div>
    					<div class="row">
    						<div class="col-xs-3 puja">Apuesta más baja pero no única</div>
    						<div class="col-xs-3 col-xs-offset-1 puja">Ganador de la puja</div>
    						<div class="col-xs-3 puja col-xs-offset-1">Apuesta única pero no la más baja</div>
    					</div>
    				</div>
    			</div>


    		</div>
    		<!-- /.container -->

    	</div>
    	<!-- /.content-section-b -->

    	<div class="content-section-b">

    		<div class="container">

    			<div class="row">
    				<div class="col-lg-5 col-sm-6">
    					<hr class="section-heading-spacer">
    					<div class="clearfix"></div>
    					<h2 class="section-heading">Llévate el producto</h2>
    					<p class="lead">Recibe el producto en tu casa con todas las garantías</p>
    				</div>
    				<div class="col-lg-5 col-lg-offset-2 col-sm-6">
    					<img class="img-responsive" src="img/gopro4.jpg" alt="">
    				</div>
    			</div>

    		</div>
    		<!-- /.container -->

    	</div>
    	<div id="seccion1" class="content-section-a">

    		<div class="container">
    			<div class="row">
    				<div class="col-lg-12 col-sm-12 text-center">
    					<div class="clearfix"></div>
    					<h2 class="section-heading">¿Has pujado y no has tenido suerte?</h2>
    					<p class="lead">Te ofrecemos la opción de comprar el producto y te descontaremos todo lo que hayas pujado del precio final</p>
    				</div>
    			</div>

    		</div>
    		<!-- /.container -->

    	</div>
    	<div class="content-section-b">

    		<div class="container">

    			<div class="row">
    				<div class="col-lg-5 col-sm-12 col-sm-offset-3 text-center">
    					<h2 class="section-heading">¿Estas listo?</h2>
    					<p class="lead">Regístrate y te damos 50 puntos para que puedas probar nuestro sistema</p>
                        <a href="/productos"><button style="font-size:22px;" type="button" class="btn btn-primary .btn-large ">Entra</button></a> o 
    					<button style="font-size:22px;" type="button" data-toggle="modal" data-target="#modalRegistrar" class="btn btn-success .btn-large ">Regístrate</button> 
                        	
    			
                    </div>

    			</div>

    		</div>
    		<!-- /.container -->

    	</div>


    	<!-- /.banner -->
    	<!-- jQuery -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    	<script src="js/main.js"></script>


    	<!-- Fin Modal Log IN -->
    	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    	<script>
    		

    		if (!$.cookie("qdmcookie"))
    		{
    			$("body").prepend("<div class='qdmcookie row'><p><a href='' class='close'>x</a>Esta web utiliza 'cookies' propias y de terceros para ofrecerle una mejor experiencia y servicio y poder registrar el proceso de la subasta. Al navegar o utilizar nuestros servicios el usuario acepta el uso que hacemos de las 'cookies'. <a href='/cookies'>M&aacute;s informaci&oacute;n</a></p></div>");
    			
    			$("body").on("click", ".close", function(e) {
    				$.cookie('qdmcookie', 'aceptado');
    				$(".qdmcookie").fadeOut();
    			});
    			

    		}
    		


    	</script>
    	@include("footer.footer")
    </body>

    </html>
