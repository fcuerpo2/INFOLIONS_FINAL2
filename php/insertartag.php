<?php
  if (session_id() === "") { session_start(); } 
  include '../lib/lib1.php';

 if(isset($_POST['texto'])){
  //recibimos las variables por POST
    $_SESSION['MisArchivos']=$_FILES;
    $texto=$_POST['texto'];
    $cabecera=$_POST['cabecera'];
    $latitud=$_POST['latitud'];
    $longitud=$_POST['longitud'];
    $idusuario=$_SESSION['usu']['idUsuario'];
    conectarBD();
    //creamos la consulta de inserción del tag y la ejecutamos
    $consulta="INSERT INTO Tags(idUsuario,Cabecera,Texto,Latitud,Longitud) VALUES ($idusuario,'$cabecera','$texto','$latitud','$longitud')";
    $conexion->query($consulta);
       desconectarBD();

      //creamos la consulta de seleccion del tag y le damos formato 
       //JSON Y LA RETORNAMOS
    $consulta="SELECT * FROM Tags INNER JOIN usuarios ON Tags.idUsuario=usuarios.idUsuario order by Tags.Fecha DESC";

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