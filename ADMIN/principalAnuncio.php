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
    $consulta="SELECT * FROM publicidad INNER JOIN usuarios ON publicidad.idUsuario=usuarios.idUsuario order by publicidad.idAnuncio DESC";
//    $consulta="SELECT publicidad.idAnuncio, publicidad.titulo, publiciad.descripcion, publicidad.imagen, publicidad.visto, publicidad.idUsuario, usuarios.idUsuario, usuarios.Nombre, usuarios.Apellidos FROM publicidad INNER JOIN usuarios ON publicidad.idUsuario=usuarios.idUsuario order by publicidad.idAnuncio DESC";

    conectarBD();
    $miArray = array();

    if ($resultado= $conexion->query($consulta)) {
        $_SESSION['Anuncio_Betty']="";
        $numAnuncioBetty=0;
    while($row = $resultado->fetch_assoc()) {
            $miArray[] = $row;
            $_SESSION['Anuncio_Betty'][$numAnuncioBetty]= $row;
            $numAnuncioBetty++;
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
            <h1>BORRAR ANUNCIOS</h1>
        </div>
    </div>
    <table id='exampletabla' class='table table-striped table-bordered' style=' border: 1px solid blue; width:100%; color: #fff; text-align: center'>
        <thead>
            <tr>
            	<th>Borrar</th>
                <th>ID Anuncio</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Visto</th>
                <th>ID Ususario</th>
            	<th>Nombre</th>
                <th>Apellidos</th>
                
            </tr>
        </thead>
        <tbody>
<?php
    for($AnuncioBetty=0;$AnuncioBetty<count($_SESSION['Anuncio_Betty']);$AnuncioBetty++)
    {
        echo "<tr>
            	<td style='text-align:center;'>
            		<button onclick='borrarAnuncio(".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['idAnuncio'].");' class='btn btn-danger'>
        				 <span id='borrar' class='glyphicon glyphicon-remove'></span>
        			</button>
            	</td>
                <td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['idAnuncio']."</td>
            	<td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['titulo']."</td>
                <td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['descripcion']."</td>
                <td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['imagen']."</td>
                <td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['visto']."</td>    
            	<td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['idUsuario']."</td>
                <td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['Nombre']."</td>
                <td style='color:#000;'>".$_SESSION['Anuncio_Betty'][$AnuncioBetty]['Apellidos']."</td>
             </tr>";
    }
?>
        </tbody>
        <tfooter>
            <tr>
            	<th>Borrar</th>
                <th>ID Anuncio</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Visto</th>
                <th>ID Ususario</th>
            	<th>Nombre</th>
                <th>Apellidos</th>
            </tr>
        </tfooter>
  </table>
    <script>
        function borrarAnuncio(idAnuncioBorrar)
        {
            var txt;
            var r = confirm("¿ Realmente deseas Borrar el Anuncio "+ idAnuncioBorrar + " ?");
            if (r == true)
            {
                window.location.href='borrarAnuncio.php?IdAnuncioBorrar='+idAnuncioBorrar;
            } 
            else
            {
                return;
            }
        }
    </script>
  </div>
</div>    
</div>
<?php
}
else{

  header("location: ../index.php");

}
?>
<!-- Ventana Modal Javi, Juan Carlos y Betty -->
<?php
    if ($_SESSION['MensajeAnuncioBorrado'] == "SI")
    {
?>
    <div id="DIV_AnuncioBorrado" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal;  background-color:rgba(16,31,68,0.9); color: #000000;" onclick="ocultar_TagBorrado()">
	<a href="#close" onclick="ocultar_TagBorrado()">
	<div style="position:absolute; top:30%;left:50%; width:300px; border-radius:5px; background-color:rgba(255,255,255,0.9); padding:15px; z-index:6; float:left;line-height:22px; margin:-2% 0px 0px -150px;">
		<center>
                    <span style="font-size:14px;"><font color="#F59336" style="font-size: 20px; font-weight:700;">Felicidades</font><br><font color="#000">El Tag <?php echo $_SESSION['NumTagBorrado'] ?> ha sido borrado</font></span><BR><BR>
			<span style="color:#FFFFFF;font-size:15px; background-color: #101f44; border-radius:5px; padding:10px; width:100%; text-decoration:none; display:block; max-width:150px;"><FONT COLOR="#FFFFFF">Aceptar</FONT></span>
		</center>
	</div>
	</a>
</div>
<script>
function ocultar_AnuncioBorrado()
			{
				document.getElementById('DIV_AnuncioBorrado').style.display = 'none';
			}
</script>                        
<?php
    $_SESSION['MensajeAnuncioBorrado']="NO";
    $_SESSION['NumAnuncioBorrado']="";
    }
?>
</body>
</html>
