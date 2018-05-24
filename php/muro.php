<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';

 if(isset($_POST['texto'])){
 
       //creamos la consulta de seleccion del tag y le damos formato 
       //JSON Y LA RETORNAMOS
    $consulta="SELECT * FROM Tags order by Fecha DESC";

    conectarBD();
    $miArray = array();

    if ($resultado= $conexion->query($consulta)) {

    while($row = $resultado->fetch_assoc()) {
            $miArray[] = $row;
    }
  }
    desconectarBD();
    echo json_encode($miArray);

  }
?>