<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
include '../lib/lib1.php';
include '../php/comprobarAdmin.php';
if (session_id() === '') {session_start();}
$_SESSION['MensajeAnuncioBorrado']="";
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
  body{
    background-image: url('./fondo.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
  #principal{
    background-color: rgba(0,0,255,0.2);
    margin-left: 20px;
    margin-right: 20px;
    height: 500px;
  }
  .container{
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  
  .container-fluid a{
    text-decoration: none;
  } 
  #usuarios, #tags, #contactos, #geos, #anuncios{
    margin-top: 50px;
    border: 1px solid blue;
    border-radius: 50%;
    width: 150px;
    height: 150px;
    background-color: rgba(0,0,255,0.1); 
  }
  #usuarios, #tags, #contactos, #geos, #anuncios{
    padding-top: 25px;
    padding-left: 0px;
    font-size: 90px;
    color: #fff;
    
  }
  .usuarios, .tags, .contactos, .geos, .anuncios{
    font-size: 20px;
    color: #fff;
    text-align: center;
    margin-top: 10px;
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
                <li class='menu'><a href='./principalUsuario.php'>Usuarios</a></li>
                <li class='menu'><a href='./principalTags'>Tags</a></li>
                <li class='menu'><a href='PrincipalContactos.php'>Contactos</a></li>
                <li class='menu'><a href='#'>Geolocalización</a></li>
                <li class='menu'><a href='./principalAnuncio.php'>Anuncios</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li class='menu'><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span><?php echo "Bienvenido $nombre $apellidos"; ?></a></li>
                <li class='menu'><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>
<div class="principal">
<div class="container-fluid">
    <div class="row" style="padding: 20px; border-radius: 10px; background-color: rgba(0, 0, 255, 0.21); margin-right: 0px; margin-left:0px;">
        <div class="col-md-12">
            <div class="col-md-1"></div>
            <div class="col-md-2" style="text-align: center;">
                <a href="principalUsuario.php">
                <span id="usuarios" class="glyphicon glyphicon-user"></span>
                <div class="usuarios">  
                    <p>Usuarios</p>
                </div>  
                </a>
          </div>
          <div class="col-md-2" style="text-align: center;">            
            <a href="principalTags.php">
                <span id="tags" class="glyphicon glyphicon-tag" style="padding-top:25px;"></span>
                <div class="tags">
                    <p>Tags</p>
                </div>   
            </a>
          </div>
          <div class="col-md-2" style="text-align: center;">            
            <a href="principalContactos.php">
            <span id="contactos" class="glyphicon glyphicon-earphone"></span>
            <div class="contactos">
              <p>Contactos</p>
            </div> 
            </a>
          </div>
          <div class="col-md-2" style="text-align: center;">            
            <a href="#">
            <span id="geos" class="glyphicon glyphicon-map-marker"></span>
            <div class="geos">
              <p>Geolocalización</p>
            </div>   
          </a>
          </div>
          <div class="col-md-2" style="text-align: center;">            
            <a href="./principalAnuncio.php"> 
            <span  id="anuncios" class="glyphicon glyphicon-pushpin"></span>
            <div class="anuncios">
              <p>Anuncios</p>
            </div>  
            </a> 
          </div>
          <div class="col-md-1"></div>            
        </div>
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
