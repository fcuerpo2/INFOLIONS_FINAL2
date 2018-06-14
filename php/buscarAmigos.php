<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
$email=$_POST['email'];
$miId=$_POST['idUs'];
/*$resultado = mysqli_query($conexion, "SELECT U.idUsuario, U.Nombre, U.Apellidos, U.FotoPortada, U.Email, U.Activo, U.FechaLogin FROM usuarios AS U, contactos AS C WHERE C.aceptar='1' AND U.Activo ='1' AND U.Email !='".$email."'");*/
$miconsulta="SELECT idUsuario, Nombre, Apellidos, FotoPortada, Email, Activo, FechaLogin FROM usuarios WHERE Email !='$email' AND Email NOT IN (SELECT id_usuario FROM contactos WHERE aceptar ='1' AND id_contacto ='$miId') AND idUsuario NOT IN (SELECT id_contacto FROM contactos WHERE aceptar ='1' AND id_usuario ='$email') ";
$resultado = mysqli_query($conexion,$miconsulta); 
if ($resultado->num_rows>0) {
  while($row = $resultado->fetch_assoc()) {
    $fotoPerfil=$row['FotoPortada'];
    $idContacto=$row['idUsuario'];    		
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
      <div class='contacto' id='nada'></div>
      <div class="contacto" id="botonAC">  
<?php
$solicitud = mysqli_query($conexion, "SELECT aceptar FROM contactos WHERE id_usuario ='$email' AND id_contacto ='$idContacto'"); 
      if ($solicitud->num_rows > 0) {
?>        
        <a href="#" onclick="cancelarPeticion('<?php echo $email;?>','<?php echo $row['idUsuario']; ?>')" class="c"  >
          <strong>Cancelar</strong>
        </a>        
<?php 
      }
      else{
?>
        <a href="#" onclick="anyadirPeticion('<?php echo $email;?>','<?php echo $miId;?>','<?php echo $row['idUsuario']; ?>')" class="a" >
          <strong>Añadir</strong> 
        </a>
<?php
      }
?>        
      </div>
<?php                         
  }
}
else {
  echo "0 results";
}
$conexion->close();
?>
