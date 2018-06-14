<?php
if (session_id() === '') { session_start(); }
include '../lib/lib1.php';
if($_SESSION['usu']['idUsuario']!=""){

  $_SESSION['TodosUsuariosMiChat']="";  
  conectarBD();
  $consulta="SELECT * FROM chatters";
  $resultado=$conexion->query($consulta);
  
  $_SESSION['TodosUsuariosMiChat'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
  desconectarBD();
  
  $nombre=$_SESSION['usu']['Nombre'];
  $apellidos=$_SESSION['usu']['Apellidos'];
  $foto=$_SESSION['usu']['FotoPortada'];
  $fecha=date('d-m-y h:i:sa');
  for ($numusuarios=0;$numusuarios<count($_SESSION['TodosUsuariosMiChat']);$numusuarios++)
  {
            echo "<span style='color:#000; text-align:center;'><strong>".utf8_decode($_SESSION['TodosUsuariosMiChat'][$numusuarios]['name'])."</strong></span><br/>";
  }            
}
else{
  header("location: ../index.php");
}
?>