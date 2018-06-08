<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
include '../php/comprobarAdmin.php';
if (session_id() === '') {session_start();}

  conectarBD();
  $consulta="SELECT * FROM usuarios";
  $resultado=$conexion->query($consulta);
  
  $_SESSION['TodosUsuarios'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
  desconectarBD();
  
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

<?php
echo"<style>
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
  button{
  	background-color: blue;
  	border: 1px solid blue;
  	cursor: pointer;
  }
  #modificar{
  	width: 30px;
  }
  #detalles{
  	margin-top: 25px;
  	width: 80%;
  	margin: auto;
  	  }
  #tabla{
  	margin-left: 50%;
  	transform: translateX(-50%);
  }	  
  #datos{
  	text-align: center;
  	color: darkblue;
  	
  }
  #botones{
  display: flex;
  justify-content: space-around;	
  }
  .modificar, .bloquear{
  	width: 100px;
  	border: 1px solid darkblue;
  	background-color: darkblue;
  	color:#fff;
  	 }
</style>";
?>
<script>
    function modificar(IdUsuario)
    {
        window.location.href='editarusuario.php?IdUsuario='+IdUsuario;
    }
</script>
</head>
<body>
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
                <li class='menu'><a href='../php/principal.php'>Home</a></li>
                <li class='menu'><a href='../actualizar.php'>Usuarios</a></li>
                <li class='menu'><a href='#'>Tags</a></li>
                <li class='menu'><a href='./contactos.php'>Contactos</a></li>
                <li class='menu'><a href='#' onclick='nuevoAnuncio();'>Anuncios</a></li>
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
    <div class="row">
        <div class="col-md-12">
            <h1>BLOQUEAR TAGS</h1>
        </div>
    </div>
    <table id='exampletabla' class='table table-striped table-bordered' style=' border: 1px solid blue; width:100%; color: #fff; text-align: center'>
        <thead>
            <tr>
            	<th>Modificar</th>
            	<th>Nombre</th>
                <th>Tags</th>
                <th>Bloq</th>
            </tr>
        </thead>
        <tbody>
<?php
    for($misUsuarios=0;$misUsuarios<count($_SESSION['TodosUsuarios']);$misUsuarios++)
    {
        echo "<tr>
            	<td style='text-align:center;'>
            		<button onclick='borrar(".$_SESSION['TodosUsuarios'][$misUsuarios]['idUsuario'].");'>
                             <span id='borrar' class='glyphicon glyphicon-remove'></span>
                        </button>
            	</td>
                <td style='color:#000;'>".$_SESSION['TodosUsuarios'][$misUsuarios]['Nombre']."</td>
            	<td style='color:#000;'>".$_SESSION['TodosUsuarios'][$misUsuarios]['Apellidos']."</td>
                <td style='color:#000;'>".$_SESSION['TodosUsuarios'][$misUsuarios]['Tags']."</td>
                
if ($_SESSION['TodosUsuarios'][$misUsuarios]['Activo'] == 1)
{
    echo "<td style='color:#000; text-align:center;'><input type='checkbox' value='0' style='width:20px; height:20px;' readonly></td>";
}
else
{
    echo "<td style='color:#000; text-align:center;'><input type='checkbox' value='0' style='width:20px; height:20px;' checked></td>";
}
//echo"           <td style='color:#000;'>".$_SESSION['TodosUsuarios'][$misUsuarios]['Activo']."</td>
echo "          </tr>";
    }
?>
        </tbody>
        <tfooter>
            <tr>
            	<th>Borrar</th>
            	<th>Nombre</th>
                <th>Apellidos</th>
                <th>Tags</th>
                <th>Bloq</th>
            </tr>
        </tfooter>
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
