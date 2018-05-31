<?php
  if (session_id() === "") { session_start(); } 
  include '../lib/lib1.php';
  
    $texto=$_GET['Mensaje'];
    $cabecera=$_GET['Cabecera'];
    $NumTag=$_GET['NumForm'];
    $idusuario=$_SESSION['usu']['idUsuario'];
    conectarBD();
    //creamos la consulta de inserción del tag y la ejecutamos
    $consulta="INSERT INTO Comentarios(idTag,idUsuarioEnvio,Cabecera,Texto) VALUES ($NumTag,$idusuario,'$cabecera','$texto')";
    $conexion->query($consulta);
    desconectarBD();
  
 
//    $consulta="SELECT * FROM Tags INNER JOIN usuarios ON Tags.idUsuario=usuarios.idUsuario order by Tags.Fecha DESC";

//    conectarBD();
//    $miArray = array();

// if ($resultado= $conexion->query($consulta)) {

//    while($row = $resultado->fetch_assoc()) {
//            $miArray[] = $row;
//    }
//  }
//    desconectarBD();
//    echo json_encode($miArray);
//    echo json_encode($MiNumForm);
//  }
//  else
//  {
      echo $_GET['NumForm']. " / ".$_GET['Cabecera']. " / ".$_GET['Mensaje'];
//  }
?>