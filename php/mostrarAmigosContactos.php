<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
$email=$_POST['email'];
$miId=$_POST['idUs'];
$time = 15 ;
$date = time() ;
$limite = $date-$time*60 ;// Tiempo Limite de espera 
// si se supera el tiempo limite (15 minutos) lo borramos
$fechaFuera=0;
$linea=0;
$enLinea=1;
$consultaActualizar="UPDATE usuarios SET FechaLogin='$fechaFuera', enLinea='$linea' WHERE FechaLogin < $limite";
$resultadoActualizar=$conexion->query($consultaActualizar);

$miconsulta="SELECT idUsuario, Nombre, Apellidos, FotoPortada, Email, Activo, FechaLogin, enLinea FROM usuarios WHERE Activo='1' AND (Email IN (SELECT id_usuario FROM contactos WHERE aceptar ='1' AND id_contacto ='$miId') OR idUsuario IN (SELECT id_contacto FROM contactos WHERE aceptar ='1' AND id_usuario ='$email')) ";
$resultado = mysqli_query($conexion,$miconsulta);
/*
$resultado = mysqli_query($conexion, "SELECT idUsuario, Nombre, Apellidos, FotoPortada, Email, Activo, FechaLogin, enLinea FROM usuarios WHERE Activo ='1' AND Email !='".$email."'"); */
if ($resultado->num_rows>0) {
  while($row = $resultado->fetch_assoc()){
    $fotoPerfil=$row['FotoPortada']; 
?>
      <div class='contacto' id='fotoContacto'>
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
if($row['enLinea']==$enLinea)
    {       
?>   
      <div class='contacto' id='iconoOnline'>        
        <img src='<?php echo '../img/online.png' ?>' class='imgOnline'>
      </div>
<?php
    }
    else
    {
?>   
    <div class='contacto' id='iconoOffline'>       
    </div>   
<?php

    }
?>      
<?php
  }
}
else {
  echo "no tienes Contactos";
}
$conexion->close();
?>