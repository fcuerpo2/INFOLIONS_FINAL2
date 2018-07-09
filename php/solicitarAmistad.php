<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }
if ($_SESSION['usu']['idUsuario']!=0) {
  include "../lib/lib1.php";
  conectarBD();
  $uid=$_GET['sidUs'];
  $uidu=$_GET['sidUsu'];
  $cid=$_GET['sidCon']; 
  $consulta="INSERT INTO contactos(id_usuario,id_us,id_contacto,tipo_relacion,aceptar) VALUES('$uid','$uidu' ,'$cid', '1','0')";  
  $resultado=$conexion->query($consulta);
  desconectarBD();
  //echo $uid ;
  //echo $cid ;  
}
  else{
    header('location:../index.php');
  }
?>