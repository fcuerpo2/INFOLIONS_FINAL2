<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';

 if($_SESSION['usu']['idUsuario']!=""){

    $consulta="SELECT * FROM Tags";
    conectarBD();
    $miArray = array();
    if ($resultado= $conexion->query($consulta)) {

    while($row = $resultado->fetch_array(MYSQL_ASSOC)) {
            $miArray[] = $row;
    }
    desconectarBD();
    echo json_encode($miArray);
}








 }else{

    echo "Fuera de aquí intruso";

 }

?>