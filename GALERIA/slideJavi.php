<html lang='es'>
<head>
	<title>InfoLions</title>
	<link rel='shortcut icon' type='image/x-icon' href='../img/favicon.ico'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<meta http-equiv='Pragma' content='no-cache'>
	<meta http-equiv='Expires' content='-1'>
	<!-- parte modificada por edgar -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js'></script>

    <script src='../js/script1.js'></script>
    <script src='../js/mostrarAmigosContactos.js'></script>
    <script src='../js/mostrarenLineaContactos.js'></script>
    <link rel='stylesheet' href='../css/estilo1.css'>
    <link rel='stylesheet' href='../css/misContactos.css'>
    <script src='../chat/chat.js'></script>
    <link href='../chat/chat.css' rel='stylesheet'/>



<style>
.image-upload > input{
    visibility: hidden;
    width:0px;
    height:0px;
}
</style>
<script></script>
</head>
<body>
<center>
<div id='cabecera' class='navbar-fixed-top' style='position:sticky;'>
  <nav class='navbar navbar-inverse'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='principal.php'><img src='../img/reservoir.png' alt='InfoLions' title='InfoLions' style='height: 25px; width: 25px; display: initial;'>&nbsp;&nbsp;&nbsp;&nbsp;INFOLIONS</a>
        </div>
        <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
                <li><a href='./principal.php'>Home</a></li>
                <li><a href='./contactos.php'>Contactos</a></li>
                <li><a href='#' onclick='nuevoAnuncio();'>Agregar Anuncio</a></li>
                <li><a href='#' onclick='buscarAmigo();'>Buscar Amigo</a></li>
                <li class='menu'><a href='../ADMIN/'>Administardor</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span><span id='nomUserMenu'> Bienvenido/a Javier García Atance</span></a></li>
                <li><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>

<div class='row' style='margin: 0 auto;'>
 <div class='col-md-12' style='margin-top: 5px; margin-bottom: 5px;'>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
<!--  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>    
  </ol>
-->
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/7-infinity.gif" alt="BAR INFINITY: " style='width: 200px; height: auto; max-width: 50%; border-radius: 5px; max-height:400px; display:initial;'>
        <img src="../doc/fotosPublicidad/9-programador.jpg" alt="BAR INFINITY: " style='width: 200px; height: auto; max-width: 50%; border-radius: 5px; max-height:400px; display:initial;'>
        <img src="../doc/fotosPublicidad/7-infinity.gif" alt="BAR INFINITY: " style='width: 200px; height: auto; max-width: 50%; border-radius: 5px; max-height:400px; display:initial;'>
        <img src="../doc/fotosPublicidad/12-el_pino.jpg" alt="BAR INFINITY: " style='width: 200px; height: auto; max-width: 50%; border-radius: 5px; max-height:400px; display:initial;'>        
<!--        <div class="carousel-caption" style="padding-bottom:0px !important;">
            <h3>BAR INFINITY: </h3>
            <p>Busca tu pareja entre una infinidad de botellines.</p>
        </div>        
-->
    </div>
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/7-infinity.jpg" alt="Infinity Label" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:5px;">
            <h3>Infinity Label</h3>
            <p>La mejor tienda de holografia del mundo. VEN A VERNOS EN 3D</p>
        </div>                
    </div>
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/9-programador.jpg" alt="Chiste de programador con insomio" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important;">
            <h3>Chiste de programador con insomio</h3>
            <p>Espero que os guste... Betty</p>
        </div>                
    </div>
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/6-bailarina.gif" alt="BAILA ZUMBA" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important;">
            <h3>BAILA ZUMBA</h3>
            <p>Baila ZUMBA en el centro de baile Maragall. Cumple tus sueños</p>
        </div>                
    </div>      
    <div class="item" style="border-radius:5px;">
        <img src="../doc/fotosPublicidad/12-el_pino.jpg" alt="CONSIGUE UN RECORD" style='width: 100%; height: auto; max-width: 400px; border-radius: 5px; max-height:400px;'>
        <div class="carousel-caption" style="padding-bottom:0px !important;">
            <h3>CONSIGUE UN RECORD</h3>
            <p>SI TIENES MÁS DE 71 AÑOS PUEDES HACER EL RECORD DE HACER EL PINO EN LOS 50 ESTADOS DE EE.UU</p>
        </div>                
    </div>            
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
</div>                        
</center>
</body>
</html>
