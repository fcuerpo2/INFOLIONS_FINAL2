<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';


  if(isset($_FILES['fotoAnuncio'])){
  
    $foto=$_SESSION['usu']['idUsuario']."-".$_FILES['fotoAnuncio']['name'];

    move_uploaded_file($_FILES['fotoAnuncio']['tmp_name'],"../doc/fotosPublicidad/$foto");

    $_SESSION['anuncio']['fotoAnuncio']=$foto;
    //TODO: colocar código relacionar foto con foto subida
    /*
    conectarBD();
    $consulta="UPDATE usuarios SET FotoPortada='$foto' WHERE idUsuario=".$_SESSION['usu']['idUsuario'];

    $resultado=$conexion->query($consulta);
    desconectarBD();*/

    echo $foto;
 
    }
    echo 'no hay foto valida en fotoUp.php'
?>