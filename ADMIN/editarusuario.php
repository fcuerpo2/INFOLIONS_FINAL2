<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
$_SESSION['FichaUsuario'] = "";
if (session_id() === '') {session_start();}
  
  $recibirID=$_GET['IdUsuario'];

  conectarBD();
  
  $consulta="SELECT * FROM usuarios where idUsuario=".$recibirID;
  $resultado=$conexion->query($consulta);
  
  $_SESSION['FichaUsuario'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
  desconectarBD();


if($_SESSION['usu']['idUsuario']!=""){

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
	<script src='https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js'></script>
	<script src='https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js'></script>  

    <script src='../js/script1.js'></script>
    <link rel='stylesheet' href='../css/estilo1.css'>";
?>  
    <script>
      $(document).ready(function() {
        var table = $('#exampletabla').DataTable( {
          responsive: true,
//          order: [[ 0, "desc" ]],
          language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Perfiles",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total Perfiles)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Perfiles",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        			}
    	}
        } );
//        new $.fn.dataTable.FixedHeader( table );
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
th {
    background-color: blue;
    text-align:center;
}
h1{
text-align:center;
color: darkblue;
</style>
</head>
<body onload='cargarmuro()'>
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
                <li class='menu'><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span><?php echo "Bienvenido ".$_SESSION['user']; ?></a></li>
                <li class='menu'><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>
<div class="row" style="margin: 0 auto;">
<div class="col-md-12" style="width:100%; margin: 0 auto;">
<h1>MODIFICAR UN USUARIO </h1>
    <form id="Frm_FichaUsuario" method='POST'>
		<table class='table table-striped table-bordered' style='width: 100%; background-color: lightblue; max-width:600px; margin: 0 auto;' id='tabla'><tbody>
			<input type='hidden' name='idcliente' value='.$fila['idCliente'].' />
			<tr><td id='datos'>Nombre:</td><td><input type='text' class="form-control" id='Frm_Nombre' value='<?php echo $_SESSION['FichaUsuario'][0]['Nombre']; ?>' /></td></tr>
			<tr><td id='datos'>Apellidos:</td><td><input type='text' class="form-control" id='Frm_Apellidos' value='<?php echo $_SESSION['FichaUsuario'][0]['Apellidos']; ?>' /></td></tr>
			<tr><td id='datos'>Email:</td><td><input type='text' class="form-control" id='Frm_Email' value='<?php echo $_SESSION['FichaUsuario'][0]['Email']; ?>' /></td></tr>
			<tr><td id='datos'>Teléfono:</td><td><input type='text' class="form-control" id='Frm_Telefono' value='<?php echo $_SESSION['FichaUsuario'][0]['Telefono']; ?>' /></td></tr>
			<tr><td id='datos'>Domicilio:</td><td><input type='text' class="form-control" id='Frm_Domicilio' value='<?php echo $_SESSION['FichaUsuario'][0]['Direccion']; ?>' /></td></tr>
			<tr><td id='datos'>Ciudad:</td><td><input type='text' class="form-control" id='Frm_ciudad' value='<?php echo $_SESSION['FichaUsuario'][0]['Ciudad']; ?>' /></td></tr>
			<tr><td id='datos' >Provincia:</td><td><input type='text' class="form-control" id='Frm_Provincia' value='<?php echo $_SESSION['FichaUsuario'][0]['Provincia']; ?>' /></td></tr>
                        <tr><td id='datos' >Provincia:</td><td><input type='text' class="form-control" id='Frm_Pais' value='<?php echo $_SESSION['FichaUsuario'][0]['Pais']; ?>' /></td></tr>
			<tr><td></td><td id='botones'><input type='submit' value='Modificar' class='modificar' /><input type='submit' value='Bloquear' class='bloquear' /></td></tr>
                </table>
    </form>
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