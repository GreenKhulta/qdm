
<html lang="es">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Preguntas frecuentes quiendamenos.es">
  <meta name="Aprenents" content="">
  <link rel="icon" href="/img/logo7.png" type="image/x-icon" />

  <title>Quien da menos | FAQ</title>

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link href="css/faq.css" rel="stylesheet">
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
          <br />
          <div class="alert alert-warning alert-dismissible" style="  color: #FFFFFF;background-color: #337ab7; border-color: #2e6da4;
          "role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          Esta sección contiene toda la información que necesitas saber sobre nuestro sitio. Si tienes alguna otra pregunta no  dudes en ponerte en contacto con nosotros.
        </div>

        <br />

        <div class="panel-group" id="accordion">
          <div class="faqHeader">Preguntas generales</div>
          <div class="panel panel-default">
           <div class="panel-heading">
            <h4 class="panel-title">
             <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">¿Cómo funciona?</a>
           </h4>
         </div>
         <div id="collapseOne" class="panel-collapse collapse in">
          <div class="panel-body">
           El principal objetivo es dar la oportunidad a nuestros clientes, de obtener productos muy demandados, a precios muy por debajo de su valor de mercado.<br><br>

           El funcionamiento de la subasta es muy simple: cada usuario realiza una puja intentando que esta sea la única y mas baja, si dos usuarios pujan la misma cantidad de puntos estos ya no pueden ser ganadores, gana la puja única más baja. <br><br>

           Los productos disponen de un temporizador que se reinicia si no se alcanza el número de pujas mínimas por el producto, y que puede variar en función del precio del producto, este termina cuando el temporizador llegua a cero y se anuncia al ganador del producto. <br>

         </div>
       </div>
     </div>
     <div class="panel panel-default">
       <div class="panel-heading">
        <h4 class="panel-title">
         <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFifteen">¿Qué es una puja única más baja?</a>
       </h4>
     </div>
     <div id="collapseFifteen" class="panel-collapse collapse">
      <div class="panel-body">

       La puja única mas baja es aquella puja de menor valor, lo mas cerca posible de 0€ y que ningún otro usuario haya realizado. <br>
       Se debe conocer la relación entre dinero real y los puntos con los que se realiza la puja: 1€ = 100 puntos <br><br>
       Ejemplo: <br>
       - Participante A ofrece una puja de 4 puntos = 0.04€<br>
       - Participante B ofrece una puja de 5 puntos = 0.05€<br>
       - Participante C ofrece una puja de 1 punto = 0.01€<br>
       - Varios participantes ofrecen pujas de 1 punto = 0.01€ <br><br>
       El participante A ha ganado la puja porque su puja ha sido la única de 4 puntos  y es la más baja. 
     </div>
   </div>
 </div>
 <div class="panel panel-default">
   <div class="panel-heading">
    <h4 class="panel-title">
     <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">¿Cómo participo en una subasta?</a>
   </h4>
 </div>
 <div id="collapseTen" class="panel-collapse collapse">
  <div class="panel-body">
   Para participar en una subasta primero debes registrarte en quiendamenos.es y recibirás 50 puntos de forma gratuita para poder conocer el sistema de subastas. <br><br>

   Podrás elegir el producto por el qual te interese pujar y cuando estés dispuesto pujar por el.
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">¿Cómo pujo por un producto?</a>
 </h4>
</div>
<div id="collapseEleven" class="panel-collapse collapse">
  <div class="panel-body">
   Tan solo debes decidir la cantidad de puntos que quieres pujar y pulsar el botón PUJAR, automàticament podrás consultar información más detallada sobre la puja en tu perfil.
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve">¿Qué ocurre cuando gano una subasta?</a>
 </h4>
</div>
<div id="collapseTwelve" class="panel-collapse collapse">
  <div class="panel-body">
   En el momento en que ganes un producto se te enviará un email con todos los detalles del produto adquirido y podrás seguir el estado del envio mediante un número de referencia que te facilitaremos.
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen">¿Puedo pujar por más de un producto?</a>
 </h4>
</div>
<div id="collapseThirteen" class="panel-collapse collapse">
  <div class="panel-body">
   Si, no hay ningún tipo de limitación.
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFourteen">¿Son las subastas un juego de azar?</a>
 </h4>
</div>
<div id="collapseFourteen" class="panel-collapse collapse">
  <div class="panel-body">
   No, es un medio que permite al usuario gracias a la información que le damos, utilizar su propia estratègia ganadora para adquirir productos a precios muy bajos, siendo su habilidad el factor más importante.    
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSixteen">¿Qué hay de la entrega y la garantía?</a>
 </h4>
</div>
<div id="collapseSixteen" class="panel-collapse collapse">
  <div class="panel-body">
   La entrega y la garantía estan aseguradas, nuestros productos están nuevos y en su envoltorio sin abrir. <br>
   Te entregaremos el producto a domicilio y se te proporcionará información detallada sobre el proceso cuando adquieras un producto.
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeventeen">¿Cuánto vale pujar?</a>
 </h4>
</div>
<div id="collapseSeventeen" class="panel-collapse collapse">
  <div class="panel-body">
   Tú decidirás la cantidad de puntos que quieras pujar en cada momento. <br>
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEighteen">¿Cómo recargar la cuenta de puntos?</a>
 </h4>
</div>
<div id="collapseEighteen" class="panel-collapse collapse">
  <div class="panel-body">
   Mediante el sistema de pago seguro PayPal podrá adquirir puntos a precio de 1€ = 100 puntos.<br>
   Se anunciarán ofertas de compra cada ciertos dias.
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwenty">¿Los puntos caducan?</a>
 </h4>
</div>
<div id="collapseTwenty" class="panel-collapse collapse">
  <div class="panel-body">
   No, los puntos nunca caducan. <br>
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#uno">¿Qué és el número de pujas?</a>
 </h4>
</div>
<div id="uno" class="panel-collapse collapse">
  <div class="panel-body">
   És el número total de pujas que lleva el producto, si 10 usuarios han pujado por ese producto el número será 10. <br>
 </div>
</div>
</div>
<div class="panel panel-default">
 <div class="panel-heading">
  <h4 class="panel-title">
   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#tres">¿Qué són las pujas mínimas?</a>
 </h4>
</div>
<div id="tres" class="panel-collapse collapse">
  <div class="panel-body">
   És la cantidad de pujas que se debe alcanzar para que se adjudique a un usuario, si no se alcanza ese número el tiempo de la subasta aumentará en 12 horas.<br>
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