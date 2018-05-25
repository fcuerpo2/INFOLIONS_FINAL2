<?php
  if (session_id() === "") 
      { session_start(); }
      
  include '../lib/lib1.php';

 if(isset($_POST['texto'])){
        //nuevo comentario carlos acevedo
        // nuevo comentario de Javi
       //creamos la consulta de seleccion del tag y le damos formato 
       //JSON Y LA RETORNAMOS
     //4 comentario Carlos Acevedo
     //5 comentario Carlos Acevedo
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
