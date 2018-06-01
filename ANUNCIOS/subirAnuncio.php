<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';
  
  if( isset($_SESSION['usu']['idUsuario'])){
  
    $titulo=$_SESSION['anuncio'][''];
    $foto=$_SESSION['anuncio']['fotoAnuncio'];
    $descripcion=$_SESSION['anuncio'][''];
    //TODO: colocar código relacionar foto con foto subida
    /*
    conectarBD();
    $consulta="UPDATE usuarios SET FotoPortada='$foto' WHERE idUsuario=".$_SESSION['usu']['idUsuario'];

    $resultado=$conexion->query($consulta);
    desconectarBD();*/

    echo $foto;
 
    }else{
        echo 'no has accedido de forma correcta fotoUp.php';
    }

?>

