<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }
if ($_SESSION['usu']['idUsuario']!=0) {
  include "../lib/lib1.php";
  conectarBD();
  $uid=$_GET['semCon'];
  $cid=$_GET['sMiId']; 
  $aceptar=1;
  $consulta="UPDATE contactos SET aceptar='$aceptar' WHERE id_usuario='$uid' AND id_contacto='$cid'";
  $resultado=$conexion->query($consulta);    
  desconectarBD();
  //echo $uid ;
  //echo $cid ;  
}
  else{
    header('location:../index.php');
  }
?>