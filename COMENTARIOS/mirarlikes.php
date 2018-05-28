<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }
$_SESSION['TodosLikes'] = "";
//include '../lib/lib1.php';
  conectarBD();
  $consulta="SELECT * FROM Likes";
  $resultado=$conexion->query($consulta);
  while ($fila = mysql_fetch_row($resultado)) {         
        $_SESSION['TodosLikes'][] = $fila;
  }
  desconectarBD();
?>
