<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
$miId=$_POST['idUs'];
$miconsulta="SELECT idUsuario, Nombre, Apellidos, FotoPortada, Email, Activo, FechaLogin FROM usuarios WHERE Email IN (SELECT id_usuario FROM contactos WHERE aceptar ='0' AND id_contacto ='$miId') ";
$resultado = mysqli_query($conexion,$miconsulta); 
if ($resultado->num_rows>0) {
  while($row = $resultado->fetch_assoc()) {
    $fotoPerfil=$row['FotoPortada'];
    $idContacto=$row['idUsuario'];
    $emailContacto=$row['Email'];        
?>    <div class='contacto' id='fotoContacto'>
        <a href='#' onclick="perfilUsuario(<?php echo $row['idUsuario']; ?>)">
        <img src='<?php if($fotoPerfil!=NULL){echo '../doc/fotoportada/'.$fotoPerfil;}else{echo '../img/usuario.jpg';} ?>' class='imgContactos'>
        </a>
      </div>
      <div class='contacto' id='nombreContacto'>
        <a href='#' onclick="perfilUsuario(<?php echo $row['idUsuario']; ?>)" class="n">
        <strong><?php  echo $row['Nombre'] ." ". $row['Apellidos'];?></strong>
        </a>
      </div>
<?php
$solicitud = mysqli_query($conexion, "SELECT aceptar FROM contactos WHERE id_usuario ='$emailContacto'"); 
        $fila = mysqli_fetch_array($solicitud);
        if($fila['aceptar']==0)
        {
?>
      <div class='contacto' id='botonAceptar'>
        <input type="button" class="btn btn-success btn-sm" onclick="aceptarSolicitud('<?php echo $emailContacto;?>','<?php echo $miId;?>')" value="Aceptar" >
      </div>
      <div class="contacto" id="botonCancelar">  
        <input type="button" class="btn btn-danger btn-sm" onclick="cancelarSolicitud('<?php echo $emailContacto;?>','<?php echo $miId;?>')" value="Cancelar" >
      </div>
<?php 
      }
      else{
?>
      
<?php                         
      }
    }
  }
    else {
      //header('location:./principal.php');      
      echo "No tienes mas solicitudes de amistad.";
    }
$conexion->close();
?>
