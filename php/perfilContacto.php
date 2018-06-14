<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }

if ($_SESSION['usu']['idUsuario']!=0) {
  include "../lib/lib1.php";
  conectarBD();
$aid=$_GET['eId'];   
  $resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE idUsuario ='".$aid."'"); 
if ($resultado->num_rows>0) {
      while($row = $resultado->fetch_assoc()) {
        $fotoPerfil=$row['FotoPortada'];    
?>   
<ul class="list-group">
  <li class="list-group-item list-group-item-light"><legend>Datos de Usuario</legend>
  </li>
  <li class="list-group-item list-group-item-light">
    <label for="foto">Foto de Perfil</label>
    <div id ="fotoPerfilContacto" >
      <img class="fotoPerfilContacto" src='<?php if($fotoPerfil!=NULL){echo '../doc/fotoportada/'.$fotoPerfil;}else{echo '../img/usuario.jpg';} ?>'>
    </div>    
  </li>
  <li class="list-group-item list-group-item-light">
    <label for="name">Nombre </label>
    <?php echo $row['Nombre']." ".$row['Apellidos']; ?>
  </li>
  <li class="list-group-item list-group-item-light">
    <label for="email">Email</label>
    <?php echo $row['Email']; ?>
  </li>
  <li class="list-group-item list-group-item-light">
    <label for="sexo">Sexo</label>
    <?php echo $row['Sexo']; ?>
  </li>
  <li class="list-group-item list-group-item-light">
    <label for="ecivil">Estado Civil</label>
    <?php echo $row['EstadoCivil']; ?>
  </li>
  <li class="list-group-item list-group-item-light">
    <label for="ecivil">Telefono</label>
    <?php echo $row['Telefono']; ?>
  </li>
</ul><?php
  }
}
else{
  echo "0 results";
}
}
  else{
    header('location:../index.php');
  }
?>