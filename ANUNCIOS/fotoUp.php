<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';


  if(isset($_FILES['fotoportada'])){
  
  $foto=$_SESSION['usu']['idUsuario']."-".$_FILES['fotoportada']['name'];

move_uploaded_file($_FILES['fotoportada']['tmp_name'],"../doc/fotosPublicidad/$foto");

  $_SESSION['usu']['FotoPortada']=$foto;
//TODO: colocar código relacionar foto con foto subida
  /*
  conectarBD();
    $consulta="UPDATE usuarios SET FotoPortada='$foto' WHERE idUsuario=".$_SESSION['usu']['idUsuario'];

  $resultado=$conexion->query($consulta);
  desconectarBD();*/

  //echo $foto;
  echo "salida a piñon";
    }
?>