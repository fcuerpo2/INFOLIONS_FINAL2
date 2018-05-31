<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
if (session_id() === '') { session_start(); }
$_SESSION['MisTags']="";
if($_SESSION['usu']['idUsuario']!=""){

  $nombre=$_SESSION['usu']['Nombre'];
  $apellidos=$_SESSION['usu']['Apellidos'];

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
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js'></script>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  

    <script src='../js/script1.js'></script>
    <link rel='stylesheet' href='../css/estilo1.css'>
    <script src='../chat/chat.js'></script>
    <link href='../chat/chat.css' rel='stylesheet'/>



<style>
.image-upload > input{
    visibility: hidden;
    width:0px;
    height:0px;
}
</style>
</head>
<body onload='cargarmuro()'>
<center>
<div id='cabecera'>
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
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span> Bienvenido $nombre $apellidos</a></li>
                <li><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>

   	<div class='row' style='margin: 0 auto;'>
  		<div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px;'>
                        <div id='michat' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;' class='sombraNegra'>
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
  		  	<div id='anuncio-left' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  		</div>
  		<div class='col-md-6' style='margin-top: 5px; margin-bottom: 5px;'>
  		   	<div id='anuncio-top' style='background-color: #0e5f0e; margin-bottom: 20px; border-radius: 10px; padding: 10px; color: #fff;' class='sombraNegra'>";

include "../ANUNCIOS/anuncioInicioBlanco.php";

echo "                  </div>
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
echo "   			<div id='tags'>";

include "../COMENTARIOS/mirarlikes.php";
for($i=0;$i<count($miArray);$i++){
$foto=$miArray[$i]['FotoPortada'];
echo "<div id='Tag-".$miArray[$i]['idTag']."' class='tag sombraNegra'><div class='cabecera'>";
$nombre_fichero = '../doc/fotoportada/'.$foto;
if (file_exists($nombre_fichero)) {
    echo "<img src='../doc/fotoportada/$foto' id='fotoperfil' onclick='verImagen(".$foto.")' class='escalar' alt='Foto de Perfil' title='Foto de Perfil' style='width: 40px; height: 40px;' />";
} else {
    echo "<img src='../img/fotoportada-vacia.png' id='fotoperfil' class='escalar' alt='Sin Foto de Perfil' title='Sin Foto de Perfil' style='width: 40px; height: 40px;' />";
}    
echo "&nbsp;&nbsp;&nbsp;".$miArray[$i]['Nombre']." ".$miArray[$i]['Apellidos']."      ".$miArray[$i]['Fecha']."</div>";
echo "<div id='Titulo-".$miArray[$i]['idTag']."' class='titulo'>".$miArray[$i]['Cabecera']."</div>";
echo "<div id='Texto-".$miArray[$i]['idTag']."' class='texto'>".$miArray[$i]['Texto']."</div>"; 
echo "<div id='Imagenes-".$miArray[$i]['idTag']."' class='imagenes'></div>";
echo "<div id='Botones-".$miArray[$i]['idTag']."' class='botones' style='margin-top:10px;'>";
$totalLikes = 0;
$encontrado="NO";
for($z=0;$z<count($_SESSION['TodosLikes']);$z++)
{
    if ($_SESSION['TodosLikes'][$z]['IdComentario'] == $miArray[$i]['idTag'])
    {
        $totalLikes++;
        if ($_SESSION['TodosLikes'][$z]['IdUsuarioEnvia'] == $_SESSION['usu']['idUsuario'])
        {
            $encontrado="SI";
        }
    }        
}
if ($encontrado == "NO")
{
//        echo "<img src='../img/megusta.png' style='height:35px; opacity: 0.7;'>";
        echo "<img src='../img/megusta.png' class='escalar oscurecer' style='cursor: pointer; height:30px; width:30px; border-radius: 0px; opacity: 0.5;' onclick='ponerlike(".$miArray[$i]['idTag'].",".$apellidos=$_SESSION['usu']['idUsuario'].",".$miArray[$i]['idUsuario'].")' alt='¿ Te Gusta ?' title='¿ Te Gusta ?'>&nbsp;&nbsp;";
        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
}
else
{
        echo "<img src='../img/nomegusta.png' class='escalar' style='cursor:pointer; height:30px; width:30px; border-radius: 0px;' alt='Ya NO Me Gusta' title='Ya NO Me Gusta' onclick='quitarlike(".$miArray[$i]['idTag'].",".$apellidos=$_SESSION['usu']['idUsuario'].",".$miArray[$i]['idUsuario'].")'>&nbsp;&nbsp;";
        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
}
//echo "<input type='button' class='btn btn-primary' value='Comentario'/>";
echo "</div>";
echo "<div class='comentarios' style='margin-top:15px;'>";

$totalComentarios = 0;
$encontrado="NO";
for($z=0;$z<count($_SESSION['TodosComentarios']);$z++)
{
    if ($_SESSION['TodosComentarios'][$z]['idTag'] == $miArray[$i]['idTag'])
    {
        $totalComentarios++;
        $encontrado="SI";
//        if ($_SESSION['TodosComentarios'][$z]['IdUsuarioEnvia'] == $_SESSION['usu']['idUsuario'])
//        {
//            $encontrado="SI";
//        }
    }        
}
if ($encontrado == "NO")
{
    echo "<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#Comentarios-".$miArray[$i]['idTag']."'>( $totalComentarios ) Comentarios</button>
            <div id='Comentarios-".$miArray[$i]['idTag']."' class='collapse'>
                <br /><span>Sin Comentarios</span>
            </div>";
}
else
{
    echo "<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#Comentarios-".$miArray[$i]['idTag']."'>( $totalComentarios ) Comentarios</button>
            <div id='Comentarios-".$miArray[$i]['idTag']."' class='collapse in' style='padding: 1px 10px 1px; border-radius:10px; background-color: #5cb85c; margin-bottom:0px; margin-top:5px;'>
                <form name='Form-Com-".$miArray[$i]['idTag']."' action='POST' style='margin-top: 10px;'>
                    <div class='formComents'>
                       <input type='text' id='cabecera-coment-".$miArray[$i]['idTag']."' placeholder='Titulo Comentario' class='form-control' style='margin-bottom: 5px;'>
                       <textarea cols='80' rows='3' id='mensaje-coment-".$miArray[$i]['idTag']."' type='text' class='form-control' placeholder='Mensaje Comentario' title='Mensaje Comentario'></textarea>                           
                    </div>
                </form>
            </div>";
//          echo "Nº de Comentarios: ".$totalComentarios;
//        echo "<img src='../img/nomegusta.png' class='escalar' style='cursor:pointer; height:30px; width:30px; border-radius: 0px;' alt='Ya NO Me Gusta' title='Ya NO Me Gusta' onclick='quitarlike(".$miArray[$i]['idTag'].",".$apellidos=$_SESSION['usu']['idUsuario'].",".$miArray[$i]['idUsuario'].")'>&nbsp;&nbsp;";
//        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
}



echo "</div>";
echo "</div>";
}
echo "		</div>
		</div>
  		<div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px;'>
  		  		<div id='grupos' style='background-color: #ccc; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  			 	<div id='anuncio-right' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  		</div>
  	</div>		
	</center>";
}
else{
  header("location: ../index.php");
}
?>
</body>
</html>
