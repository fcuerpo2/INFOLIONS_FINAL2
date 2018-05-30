<?php
if (session_id() === "") { session_start(); }
$_SESSION['TodosLikes'] = "";
//include '../lib/lib1.php';
  conectarBD();
  $consulta="SELECT * FROM Likes";
  $resultado=$conexion->query($consulta);
  
  $_SESSION['TodosLikes'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
  desconectarBD();
?>
