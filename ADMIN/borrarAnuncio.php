<?php
  include '../lib/lib1.php';
  if (session_id() === '') {session_start();}
  $recibirID=$_GET['IdAnuncioBorrar'];

  conectarBD();
  $consulta="DELETE from publicidad WHERE idAnuncio=".$recibirID;
  
  $resultado=$conexion->query($consulta);
  
  $_SESSION['MensajeAnunciogBorrado']="SI";
  $_SESSION['NumanuncioBorrado']=$recibirID;

  $consulta="DELETE from titulo WHERE idAnuncio =".$recibirID;
  
  $resultado=$conexion->query($consulta);
  
  $consulta="DELETE from descripcion WHERE idAnuncio=".$recibirID;
  
  $resultado=$conexion->query($consulta);
  
  $consulta="DELETE from imagen WHERE IdAnuncio=".$recibirID;
  
  $resultado=$conexion->query($consulta);
  desconectarBD();
  header('Location: ../ADMIN/principalAnuncio.php');
?>