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
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css' />
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js'></script>        

    <script src='../js/script1.js'></script>
    <link rel='stylesheet' href='../css/estilo1.css'>";
?>  
<script>
    function bloquear(IdUsuario)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert("bloqueado "+IdUsuario);
        }
    }
    xhttp.open("GET", "../ADMIN/bloquear.php?NumID="+IdUsuario, true);
    xhttp.send();
    }
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
}
 button{
  	background-color: blue;
  	border: 1px solid blue;
  	cursor: pointer;
  }
  #modificar, {
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
  
</style>
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
                <li class='menu'><a href='./principal.php'>Home</a></li>
                <li class='menu'><a href='../actualizar.php'>Usuarios</a></li>
                <li class='menu'><a href='#'>Tags</a></li>
                <li class='menu'><a href='./contactos.php'>Contactos</a></li>
                <li class='menu'><a href='#' onclick='nuevoAnuncio();'>Agregar Anuncio</a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li class='menu'><a href='#' onclick='miperfil();'><span class='glyphicon glyphicon-user'></span><span id="nomUserMenu"> <?php echo " Bienvenido ".$_SESSION['user']; ?></span></a></li>
                <li class='menu'><a href='#' onclick='salir();'><span class='glyphicon glyphicon-log-in'></span> Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
  </nav> 
</div>
<div class='row' style='margin: 0 auto;'>
    <div class='col-md-9' style='margin-top: 5px; margin-bottom: 5px; text-align:center;'>
        <font style='font-size:24px;'>MODIFICAR UN USUARIO</font>
    </div>
    <div class='col-md-3' style='margin-top: 5px; margin-bottom: 5px; text-align:center;'>
        <a href="principal.php" style="text-decoration:none;"><button type="button" class="btn btn-primary">Volver</button></a>
    </div>
<div class="row">
<div class="col-md-12" style="width:100%; margin: 0 auto;">    
<?php
if ($_SESSION['FichaUsuario'][0]['idUsuario']!=0) {

     $nombre=$_SESSION['FichaUsuario'][0]['Nombre'];
     $apellidos=$_SESSION['FichaUsuario'][0]['Apellidos'];
     $sexo=$_SESSION['FichaUsuario'][0]['Sexo'];
     $estadocivil=$_SESSION['FichaUsuario'][0]['EstadoCivil'];
     $telefono=$_SESSION['FichaUsuario'][0]['Telefono'];
     $movil=$_SESSION['FichaUsuario'][0]['Movil'];
     $email=$_SESSION['FichaUsuario'][0]['Email'];
     $web=$_SESSION['FichaUsuario'][0]['Web'];
     $fotoportada=$_SESSION['FichaUsuario'][0]['FotoPortada'];

     $texto="<div class='row sombraNegra' style='background-color: orange; padding: 20px 10px; margin: 10px 10px 20px 10px; border-radius: 10px;'><div class='col-md-4'>";
     $texto.="<form method='POST' id='subir' action='../php/fichero.php'><div id='foto' style='text-align:center;'>";
     
$nombre_fichero = '../doc/fotoportada/'.$fotoportada;
if (file_exists($nombre_fichero)) {
    $texto.="<img src='../doc/fotoportada/$fotoportada' id='fotoperfil' class='escalar cambio'/>";
} else {
    $texto.="<img src='../img/reservoir.png' id='fotoperfil' class='escalar'/>";
}    
     $texto.="</div><br>
      <div class='image-upload' style='margin:0 auto; text-align:center;'>
      <label for='fotoportada' style='margin-bottom:0px; cursor:pointer;'>
      <img src='../img/ico-adjuntar.png' style='height:50px; width: 50px; pointer-events:none;'/>
      </label>
      <input type='file' id='fotoportada' name='fotoportada' onchange='subirfoto()' accept='image/*'/></div>
      </form>";
      $texto.="</div><div class='col-md-8'>";
      $texto.="<form method='POST' id='datos' class='form-signin' action='../php/registro.php'>";
      $texto.="<table style='background-color: transparent; width: 100%; max-width: 325px;'><tr><td>Nombre:</td><td><input type='text' name='nombre' class='form-control' value='$nombre'/></td></tr>";
    $texto.="<tr><td>Apellidos:</td><td><input type='text' name='apellidos' class='form-control' value='$apellidos'/></td></tr>";
    $texto.="<tr><td>Sexo:</td><td><input type='text' class='form-control' name='sexo' value='$sexo'/></td></tr>";
    $texto.="<tr><td>Estado Civil:</td><td><input type='text' name='estadocivil' class='form-control' value='$estadocivil'/></td></tr>";
    $texto.="<tr><td>Telefono:</td><td><input type='text' name='telefono' class='form-control' value='$telefono'/></td></tr>";
    $texto.="<tr><td>Móvil:</td><td><input type='text' class='form-control' name='movil' value='$movil'/></td></tr>";
    $texto.="<tr><td>Email:</td><td><input type='text' class='form-control' name='email' value='$email' disabled /></td></tr>";
    $texto.="<tr><td>Web:</td><td><input type='text' class='form-control' name='web' value='$web'/></td></tr>";
    $texto.="<tr><td>Foto:</td><td><input type='text' id='fotop' name='fotoportada' class='form-control' value='$fotoportada' disabled/></td></tr>";
    if ($_SESSION['FichaUsuario'][0]['Activo'] == 1)
    {
        $texto.="<tr><td>Bloqueado:</td><td style='text-align:center;'><select name='bloqueado' id='bloqueado' class='form-control'>
                <option value='0'>Bloqueado</option>
                <option value='1' selected>Desbloqueado</option>
                </select>
                </td></tr>";
    }
    else
    {
        $texto.="<tr><td>Bloqueado:</td><td style='text-align:center;'><select name='bloqueado' id='bloqueado' class='form-control'>
                <option value='0' selected>Bloqueado</option>
                <option value='1'>Desbloqueado</option>
                </select>
                </td></tr>";        
    }
    if ($_SESSION['FichaUsuario'][0]['TipoUsuario'] == 1)
    {
        $texto.="<tr><td>Bloqueado:</td><td style='text-align:center;'><select name='TipoUsuario' id='TipoUsuario' class='form-control'>
                <option value='0'>Usuario</option>
                <option value='1' selected>Permiso Administrador</option>
                </select>
                </td></tr>";
    }
    else
    {
        $texto.="<tr><td>Bloqueado:</td><td style='text-align:center;'><select name='TipoUsuario' id='TipoUsuario' class='form-control'>
                <option value='0' selected>Usuario</option>
                <option value='1'>Permiso Administrador</option>
                </select>
                </td></tr>";        
    }    
    $texto.="<tr><td><input type='reset' class='form-control btn btn-default' value='Borrar' style='margin-top:10px;'/></td><td><input type='button' onclick='actualizar_perfil_Admin()' class='form-control btn btn-primary' value='Enviar' style='margin-top: 10px;'/></td></tr></table></form></div></div>";
    $texto.="<p class='imglist' style='max-width: 1000px; text-align:center; margin:0 auto;'>";
    echo $texto;
$totalFotos = 0;
$encontrado="NO";
for($MisFotos=0;$MisFotos<count($_SESSION['TodasFotos']);$MisFotos++)
{
    if ($_SESSION['TodasFotos'][$MisFotos]['idUsuario'] == $_SESSION['usu']['idUsuario'])
    {
        echo "<a href='../doc/Imagenes/".$_SESSION['TodasFotos'][$MisFotos]['Ruta']."' data-fancybox='images'>
                <img src='../doc/Imagenes/".$_SESSION['TodasFotos'][$MisFotos]['Ruta']."' style='width:100%; height: auto; border-radius: 5px; margin-bottom: 10px; max-width: 200px;' />
              </a>";
    }
}
echo "</p>";

  }else{
    header('location:../index.php');
  }
?>
<!--    <form id="Frm_FichaUsuario" method='POST'>
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
			<tr><td></td><td id='botones'><input type='submit' value='Modificar' class='modificar' /><input type='button' value='Bloquear' class='bloquear' onclick="bloquear(13)" /></td></tr>
                </table>
    </form>
-->
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