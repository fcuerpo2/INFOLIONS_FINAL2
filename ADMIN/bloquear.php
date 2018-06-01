<?php
  $recibirID=$_GET['NumID'];

  conectarBD();
  $consulta="UPDATE usuarios SET Activo=0 WHERE idUsuario=$recibirID";
  
  $resultado=$conexion->query($consulta);
  
  $_SESSION['FichaUsuario'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
  desconectarBD();

?>