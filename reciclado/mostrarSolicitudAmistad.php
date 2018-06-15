<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
$email=$_POST['email'];
/*
$resultado = mysqli_query($conexion, "SELECT idUsuario, Nombre, Apellidos, FotoPortada, Email, Activo, FechaLogin FROM contactos WHERE Activo ='1' AND Email !='".$email."'"); 
if ($resultado->num_rows>0) {
  while($row = $resultado->fetch_assoc()) {
    $fotoPerfil=$row['FotoPortada'];        
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
  }
}
else {
  echo "0 results";
}
$conexion->close();
*/
?>