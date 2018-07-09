<?php
  if (session_id() === "") { session_start(); } 
  include '../lib/lib1.php';

 if($_SESSION['usu']['idUsuario']!=""){
    $miId=$_SESSION['usu']['idUsuario']; 

    //$consulta="SELECT * FROM Tags WHERE idUsuario IN (SELECT id_us FROM contactos WHERE aceptar ='1' AND id_contacto ='$miId') OR idUsuario IN (SELECT id_contacto FROM contactos WHERE aceptar ='1' AND id_us ='$miId')) ";

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