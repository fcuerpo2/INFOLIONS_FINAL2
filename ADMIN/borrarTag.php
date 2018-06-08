<?php
  include '../lib/lib1.php';
  if (session_id() === '') {session_start();}
  $recibirID=$_GET['IdTagBorrar'];

  conectarBD();
  $consulta="DELETE from Tags WHERE idTag=".$recibirID;
  
  $resultado=$conexion->query($consulta);
  
  $_SESSION['MensajeTagBorrado']="SI";
  $_SESSION['NumTagBorrado']=$recibirID;

  $consulta="DELETE from Likes WHERE IdComentario=".$recibirID;
  
  $resultado=$conexion->query($consulta);
  
  $consulta="DELETE from Comentarios WHERE idTag=".$recibirID;
  
  $resultado=$conexion->query($consulta);
  
  $consulta="DELETE from Foto WHERE IdTag=".$recibirID;
  
  $resultado=$conexion->query($consulta);
  desconectarBD();
  header('Location: ../ADMIN/principalTags.php');
?>