<?php
if (session_id() === "") { session_start(); }
$_SESSION['TodosLikes'] = "";

    $consulta="SELECT * FROM Tags INNER JOIN usuarios ON Tags.idUsuario=usuarios.idUsuario order by Tags.Fecha DESC";

    conectarBD();
    $miArray = array();

    if ($resultado= $conexion->query($consulta)) {

    while($row = $resultado->fetch_assoc()) {
            $miArray[] = $row;
            $_SESSION['MisTags'][] = $row;
    }
  }
    desconectarBD();
    
//include '../lib/lib1.php';
  conectarBD();
  $consulta="SELECT * FROM Likes";
  $resultado=$conexion->query($consulta);
  
  $_SESSION['TodosLikes'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
  desconectarBD();
  
  conectarBD();
  $consulta="SELECT * FROM Comentarios INNER JOIN usuarios ON Comentarios.idUsuarioEnvio=usuarios.idUsuario order by Comentarios.Fecha DESC";
  $resultado=$conexion->query($consulta);
  
  $_SESSION['TodosComentarios'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
  desconectarBD();
  
?>
