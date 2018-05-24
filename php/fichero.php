<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';


  if(isset($_FILES['fotoportada'])){
  
  $foto=$_SESSION['usu']['idUsuario']."-".$_FILES['fotoportada']['name'];

move_uploaded_file($_FILES['fotoportada']['tmp_name'],"../doc/fotoportada/$foto");

  $_SESSION['usu']['FotoPortada']=$foto;

  conectarBD();
$consulta="UPDATE usuarios SET FotoPortada='$foto' WHERE idUsuario=".$_SESSION['usu']['idUsuario'];
  $resultado=$conexion->query($consulta);
  desconectarBD();

  echo $foto;
    }
?>