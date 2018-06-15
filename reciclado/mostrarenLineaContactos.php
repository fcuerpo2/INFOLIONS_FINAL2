<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
/* @var $_POST type */
$email=$_POST['email'];
$time = 15 ;
$date = time() ;
$limite = $date-$time*60 ;// Tiempo Limite de espera 
// si se supera el tiempo limite (15 minutos) lo borramos
$fechaFuera=0;
$linea=0;
$enLinea=1;
$consulta="UPDATE usuarios SET FechaLogin='$fechaFuera', enLinea='$linea' WHERE FechaLogin < $limite";
$resultado=$conexion->query($consulta);
$resultado = mysqli_query($conexion, "SELECT idUsuario, Nombre, Apellidos, FotoPortada, Activo, FechaLogin FROM usuarios WHERE Activo='1' AND enLinea=$enLinea AND Email !='$email'");
if ($resultado->num_rows>0) {
  while($row = $resultado->fetch_assoc()) {
    $fotoPerfil=$row['FotoPortada'];
?>  
    <div class='contacto' id='fotoContacto'>
      <a href='#' onclick="perfilUsuario(<?php echo $row['idUsuario']; ?>)">
      <img src='<?php if($fotoPerfil!=NULL){echo '../doc/fotoportada/'.$fotoPerfil;}else{echo '../img/usuario.jpg';} ?>' class='imgContactos'>
      </a>
    </div>
    <div class='contacto' id='nombreContacto'>
      <a href='#' onclick="perfilUsuario(<?php echo $row['idUsuario']; ?>)" class="n" >
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
 

?>