<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';
  
  if( isset($_SESSION['usu']['idUsuario'])){
  
    $idUsuario = $_SESSION['usu']['idUsuario'];
    $titulo= $_POST['cab'];
    $_SESSION['anuncio']['titulo']=$titulo;
    $foto=$_SESSION['anuncio']['fotoAnuncio'];
    $descripcion=$_POST['textDescripcion'];
    $_SESSION['anuncio']['descripcion']=$descripcion;
    
    $fecha = new DateTime();
    $fechaCreacion=$fecha->getTimestamp();
   
    conectarBD();
    $sqlInsert="INSERT INTO publicidad (idUsuario, fecha_creacion, titulo, imagen, descripcion, visto)"
            . "VALUES($idUsuario, $fechaCreacion,'$titulo','$foto','$descripcion',0)";

    $resultado=$conexion->query($sqlInsert);
    desconectarBD();

    echo $titulo.$foto.$descripcion;
 
    }else{
        echo 'no has accedido de forma correcta subirAnuncio.php';
    }

?>

