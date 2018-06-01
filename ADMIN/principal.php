<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
if (session_id() === '') {session_start();}

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
        <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css'/>
        <script type='text/javascript' src='https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js'></script> 
        <script src='https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js'></script>
        <script src='https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js'></script>
        <script src='https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js'></script>
        <script type='text/javascript' src='https:////cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'></script>
  

    <script src='../js/script1.js'></script>
    <link rel='stylesheet' href='../css/estilo1.css'>
    <script>
      $(document).ready( function () {
        $('#exampletabla').DataTable();
    } );
    </script>

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
<body onload='cargarmuro()'>";
?>
<div id='cabecera'>
  <nav class='navbar navbar-inverse' id='borde'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' id="cabecera" href='principal.php'><img src='../img/reservoir.png' alt='InfoLions' title='InfoLions' style='height: 25px; width: 25px; display: initial;'>&nbsp;&nbsp;&nbsp;&nbsp;INFOLIONS</a>
        </div>
        <div class='collapse navbar-collapse' id='myNavbar'>
            <ul class='nav navbar-nav'>
                <li class='menu'><a href='./principal.php'>Home</a></li>
                <li class='menu'><a href='../actualizar.php'>Usuarios</a></li>
                <li class='menu'><a href='#'>Tags</a></li>
                <li class='menu'><a href='./contactos.php'>Contactos</a></li>
                <li class='menu'><a href='#' onclick='nuevoAnuncio();'>Agregar Anuncio</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li class='menu'><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span><?php echo "Bienvenido $nombre $apellidos"; ?></a></li>
                <li class='menu'><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>
<div class="row" style="margin: 0 auto;">
<div class="col-md-12">
<div id='principal'>
    <h1>ACTUALIZACIÓN DE USUARIO</h1>
    <table id='exampletabla' class='table table-striped table-bordered' style=' border: 1px solid blue; width:100%; background-color: blue; color: #fff; text-align: center'>
        <thead>
        
        </button>	
            <tr>
            	<th>Modificar</th>
            	<th>Borrar</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Domicilio</th>
                <th>DNI</th>
                <th>Login</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            	<th>
            		<button onclick='modificar();'>
        				<img src='../img/editar.png' alt='modificar' id='modificar'>
        			</button>
            	</th>
            	<th>
        			<button onclick='bloquear();'>
        				<img src='../img/borrar2.png' alt='borrar' id='borrar'>
        			</button>
        		</th>	
                <th>Javier</th>
                <th>Garcia</th>
                <th>dfgdfg@dfhgdf.com</th>
                <th>666</th>
                <th>c/ Aqui</th>
                <th>xgdfgf-b</th>
                <th>Login</th>
            </tr>
        </tbody>

  </table>
  </div>
</div>    
</div>
<?php
}
else{

  header("location: ../index.php");

}
?>
</body>
</html>