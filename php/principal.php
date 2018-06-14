<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
if (session_id() === '') { session_start(); }
if (isset($_GET['numpag']))
{
    $_SESSION['NumPag'] = $_GET['numpag'];
}
else
{
    $_SESSION['NumPag'] = 1;
}
$_SESSION['MisTags']=array();
if($_SESSION['usu']['idUsuario']!=""){

  $nombre=$_SESSION['usu']['Nombre'];
  $apellidos=$_SESSION['usu']['Apellidos'];
  $email=$_SESSION['usu']['Email'];
  $idUsuario=$_SESSION['usu']['idUsuario']; 
 //creamos la consulta de seleccion del tag y le damos formato 
       //JSON Y LA RETORNAMOS
  
    
    $consulta="SELECT * FROM Tags INNER JOIN usuarios ON Tags.idUsuario=usuarios.idUsuario order by Tags.Fecha DESC";

    conectarBD();
    $miArray = array();

    if ($resultado= $conexion->query($consulta)) {

    while($row = $resultado->fetch_assoc()) {
            $miArray[] = $row;
            $_SESSION['MisTags'][] = $row;
    }
  }
    desconectarBD();
echo "
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
<script src='../js/buscarAmigos.js'></script> 

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
<script>";
?>
var $ = jQuery.noConflict();
jQuery(document).ready(function( $ ){
    scrollToTop.init( );
});

var scrollToTop =
{
    /**
     * When the user has scrolled more than 100 pixels then we display the scroll to top button using the fadeIn function
     * If the scroll position is less than 100 then hide the scroll up button
     *
     * On the click event of the scroll to top button scroll the window to the top
     */
    init: function(  ){

        //Check to see if the window is top if not then display button
        $(window).scroll(function(){
            if ($(this).scrollTop() > 200) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });

        // Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
    }
};
<?php
echo "</script>
</head>
<body onload='cargarmuro()'>

<div id='anuncio-top' class='container-fluid' style='background-color:#F44336;color:#fff;'> <!--height:300px;-->
</div>

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
            <a class='navbar-brand' href='principal.php'><img src='../img/reservoir.png' class='escalar' alt='InfoLions' title='InfoLions' style='height: 25px; width: 25px; display: initial;'>&nbsp;&nbsp;&nbsp;&nbsp;INFOLIONS</a>
        </div>        
        <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
                <li><a href='./contactos.php'>Contactos</a></li>
                <li><a href='#' onclick='nuevoAnuncio();'>Agregar Anuncio</a></li>                
                <li><a href='#' onclick='buscarAmigoContactos();'>Buscar Amigo</a></li>
                <li class='menu'><a href='../ADMIN/'>Administrador</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li>
                <a href='#' onclick='verSolicitudesContactos()'>
                  <span id='solicitudAmistad'></span>
                </a>
              </li>
                <li><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span><span id='nomUserMenu'> Bienvenido/a $nombre $apellidos</span></a></li>
                <li><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>

   	<div class='row' style='margin: 0 auto;'>
  		<div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px;'>";
echo "<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#btnMisUsuariosChat' style='width:100%; border-radius:10px; margin-bottom:5px;'>USUARIOS CONECTADOS</button>
            <div id='btnMisUsuariosChat' class='collapse' style='padding: 1px 10px 1px; border-radius:10px; background-color: #ccc; margin-bottom:10px; margin-top:5px;'>";
include "../php/usuariosmichat.php";
echo"       </div>";
echo "                  <div id='michat' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;' class='sombraNegra'>
                                    <div id='EspacioChat' style='max-height:350px; overflow: auto; padding: 0px 10px;'>
                                    <div class='chat'";
        	
        		$_SESSION['user']=$_SESSION['usu']['Nombre']." ".$_SESSION['usu']['Apellidos'];
        		include("../chat/config.php");
        		include("../chat/login.php");
          		if(isset($_SESSION['user'])){
              		include("../chat/chatbox.php");
          		}else{	
              		$display_case=true;
              		include("../chat/login.php");
          		}
        	
 echo"                              </div>
                                </div>  
                                    <form id='msg_form'>
                                        <input name='msg' type='text' placeholder='Mensaje...' style='border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;' />
                                    </form>
	                </div>                        
  		  	<div id='geolocalizacion' style='background-color: #ccc; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
                        <div id='AnunciosSlide' style='min-height: 40px; margin-bottom: 10px; border-radius: 10px;margin-bottom:20px;' class='sombraNegra'>";
include '../ANUNCIOS/slideAnuncios.php';
echo"                   </div>                        
  		  	<div id='anuncio-left' style='background-color: #333; min-height: 40px; margin-bottom: 10px; padding: 10px; border-radius: 10px; color: #fff;' class='sombraNegra'></div>
  		</div>
  		<div class='col-md-6' style='margin-top: 5px; margin-bottom: 5px;'>
  		   	<!--<div id='anuncio-top' style='background-color: #0e5f0e; margin-bottom: 20px; border-radius: 10px; padding: 10px; color: #fff;' class='sombraNegra'>";

//include "../ANUNCIOS/anuncioInicioBlanco.php";

echo "                  </div> -->
   			<div id='imagen'></div>";
if ($_SESSION['usu']['FotoFondo'] == "")
{
echo "   			<div id='perfiles' class='sombraNegra'></div>";
}
else
{
    $nombre_fondo = '../doc/fotofondo/'.$_SESSION['usu']['FotoFondo'];
    if (file_exists($nombre_fondo)) 
        {
echo "   			<div id='perfiles' class='sombraNegra' style='background-image: url(../doc/fotofondo/".$_SESSION['usu']['FotoFondo']."); background-repeat: no-repeat; background-size: cover;'></div>";        
        }
    else
        {
echo "   			<div id='perfiles' class='sombraNegra'></div>";        
        }
}
echo "  <div class='buscarAmigos' id='buscarAmigos'></div>
          <div class='mostrarPerfilContactos' id='mostrarPerfilContactos'></div>
        	<div id='tags'>";
include './dibujartags.php';
echo "		</div>           
		</div>
                
  		<div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px;'>";
?>
  		  		<div id='grupos' style='min-height: 40px; margin-bottom: 10px; border-radius: 10px;'>
            <form >
              <input type="hidden" name="miEmail" id="miEmail" value="<?php  echo $email;?>" >
              <input type="hidden" name="miId" id="miId" value="<?php  echo $idUsuario;?>" >
              <p id ="buscarA"></p>                
              <!--div class="buscarAmigos" id="buscarAmigos">
              </div-->
                <p id ="misA"> Mis Amigos </p>  
                <p id ="mensajeNumEnLinea"></p>  
                <div class="amigosContactos" id ="amigosContactos">                  
                </div>            
                <!--p id="linea"> Contactos en linea </p>
                <div class="enLineaContactos" id ="enLineaContactos">                  
                </div-->              
            </form>
            </div>
  			 	
<?php
  echo"     <div id='anuncio-right' style='background-color: #333; min-height: 40px; margin-bottom: 10px; padding: 10px 10px; border-radius: 10px; color: #fff;' class='sombraNegra'></div>
  		</div>
  	</div>";		        
  echo "<a href='#' class='scrollToTop'><span style='font-size: 25px; vertical-align: sub; background-color:#ddd; border-radius: 5px; padding:10px;' class='glyphicon glyphicon-chevron-up sombraNegra'></span></a>";
  echo"	</center>";

}
else{
  header("location: ../index.php");
}
?>
<script src='../js/mostrarPerfilContactos.js'></script>
</body>
</html>
