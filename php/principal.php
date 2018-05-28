<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
if (session_id() === '') { session_start(); }

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
            <a class='navbar-brand' href='#'>INFOLIONS</a>
        </div>
        <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
                <li class='active'><a href='./principal.php'>Home</a></li>
                <li ><a href='#'  onclick='miperfil();'>Mi Perfil</a></li>
                <li><a href='./contactos.php'>Contactos</a></li>
                <li ><a href='#'  onclick='nuevoAnuncio();'>Agregar Anuncio</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#'><span class='glyphicon glyphicon-user'></span> Bienvenido $nombre $apellidos</a></li>
                <li><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>

   	<div class='row' style='margin: 0 auto;'>
  		<div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px;'>
  		  	<div id='geolocalizacion' style='background-color: #ccc; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  		  	<div id='anuncio-left' style='background-color: #333; min-height: 40px; margin-bottom: 10px; border-radius: 10px;'></div>
  		</div>
  		<div class='col-md-6' style='margin-top: 5px; margin-bottom: 5px;'>
  		   	<div id='anuncio-top' style='background-color: #0e5f0e; margin-bottom: 10px; border-radius: 10px; padding: 10px; color: #fff;'>";

include "../ANUNCIOS/anuncios.php";

echo "                  </div>
   			<div id='imagen'></div>
   			<div id='perfiles'></div>
   			<div id='tags'>";

include "../COMENTARIOS/mirarlikes.php";
for($i=0;$i<count($miArray);$i++){
$foto=$miArray[$i]['FotoPortada'];
echo "<div id='Tag-".$miArray[$i]['idTag']."' class='tag'><div class='cabecera'><img src='../doc/fotoportada/$foto' class='escalar' onclick='verImagen(".$foto.")'>&nbsp;&nbsp;&nbsp;".$miArray[$i]['Nombre']." ".$miArray[$i]['Apellidos']."      ".$miArray[$i]['Fecha']."</div>";
echo "<div class='titulo'>".$miArray[$i]['Cabecera']."</div>";
echo "<div class='texto'>".$miArray[$i]['Texto']."</div>"; 
echo "<div class='imagenes'></div>";
echo "<div class='botones' style='margin-top:10px;'>";
$totalLikes = 0;
$encontrado="NO";
for($z=0;$z<count($_SESSION['TodosLikes']);$z++)
{
    if ($_SESSION['TodosLikes'][$z]['IdComentario'] == $miArray[$i]['idTag'])
    {
        $totalLikes++;
        if ($_SESSION['TodosLikes'][$z]['IdUsuarioRecibe'] == $miArray[$i]['idUsuario'])
        {
            $encontrado="SI";
        }
    }        
}
if ($encontrado == "NO")
{
//        echo "<img src='../img/megusta.png' style='height:35px; opacity: 0.7;'>";
        echo "<img src='../img/megusta.png' style='height:30px; width:30px; border-radius: 0px; opacity: 0.5;' onclick='ponerlike()' alt='¿ Te Gusta ?' title='¿ Te Gusta ?'>&nbsp;&nbsp;";
        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
}
else
{
        echo "<img src='../img/megusta.png' style='height:30px; width:30px; border-radius: 0px;' alt='Me Gusta' title='Me Gusta'>&nbsp;&nbsp;";
        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
}
//echo "<input type='button' class='btn btn-primary' value='Comentario'/>";
echo "</div>";
echo "<div class='comentarios'></div></div>";
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
