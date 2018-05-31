<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
if (session_id() == '') 
    session_start(); 

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

#borde{
    border: 1px solid lightblue;


}

.container-fluid{
    
    background-color: lightblue; 
}
#myNavbar{
    background-color: lightblue;
}
#cabecera {
    color: #000 !important;
    
}
.menu a{
    color: #000 !important;
}

</style>
</head>
<body onload='cargarmuro()'>
<center>
<div id='cabecera'>
  <nav class='navbar navbar-inverse' id='borde'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' id='cabecera' href='principal.php'><img src='../img/reservoir.png' alt='InfoLions' title='InfoLions' style='height: 25px; width: 25px; display: initial;'>&nbsp;&nbsp;&nbsp;&nbsp;INFOLIONS</a>
        </div>
        <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
                <li class='menu'><a href='./principal.php'>Home</a></li>
                <li class='menu'><a href='#'>Usuarios</a></li>
                <li class='menu'><a href='#'>Tags</a></li>
                <li class='menu'><a href='./contactos.php'>Contactos</a></li>
                <li class='menu'><a href='#' onclick='nuevoAnuncio();'>Agregar Anuncio</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li class='menu'><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span> Bienvenido $nombre $apellidos</a></li>
                <li class='menu'><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>
   <div id='imagen'></div>
   <div id='perfiles'></div>
   <div id='tags' style='max-height: 300px; overflow: auto;'>";


for($i=0;$i<count($miArray);$i++){
$foto=$miArray[$i]['FotoPortada'];
echo "<div class='tag'><div class='cabecera'><img src='../doc/fotoportada/$foto' onclick=verImagen(".$foto."))/>  ".$miArray[$i]['Nombre']." ".$miArray[$i]['Apellidos']."      ".$miArray[$i]['Fecha']."</div>";
echo "<div class='titulo'>".$miArray[$i]['Cabecera']."</div>";
echo "<div class='texto'>".$miArray[$i]['Texto']."</div>"; 
echo "<div class='imagenes'></div>";
echo "<div class='botones'><input type='button' class='btn btn-primary' value='Me gusta'/><input type='button' class='btn btn-primary' value='Comentario'/></div>";
echo "<div class='comentarios'></div></div>";

}

echo "</div></center></body>";


}
else{

  header("location: ../index.php");

}

?>
<center>

        <?php
            include './lib/lib1.php';
        
            conectarBD();
            echo "<div id='seleccion'>";
            $t=verTablaClientesActivos();
            echo $t;
            echo "</div>";
            desconectarBD();

        ?>

            <script>
            $(document).ready( function () {
            $('#mitabla').DataTable();
        } );
    </script>
        <div id="formulario">
        </div>
</center>        
<div id='principal'>
    <form>
        <div class='row' style='background-color: lightblue;'>
            <div class='col-md-12' style='margin: 0 auto; text-align: center; margin-top: 5px; margin-bottom: 5px; color: blue;'>
                <table id='exampletabla' class='table table-striped table-bordered' style='width:100%; background-color: blue; color:#fff; text-align: center'>
                     <thead>
                        <tr>
                            <th>Editar</th>
                            <th>Modificar</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Domicilio</th>
                            <th>DNI</th>
                            <th>Login</th>
                        </tr>
                    </thead>
                </table> 
            </div>
        </div>
     </form>                  
</div>
</center>
</html>