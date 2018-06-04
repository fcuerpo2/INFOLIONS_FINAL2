<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }

  $email=$_POST['email'];
  $password=$_POST['password'];

  include '../lib/lib1.php';

  conectarBD();
  $consulta="SELECT * FROM usuarios WHERE Email='$email' AND password='$password' AND TipoUsuario=1";

  $resultado=$conexion->query($consulta);

  if($resultado->num_rows>0){
    //HAY ALGÚN USUARIO 
    $fila=mysqli_fetch_assoc($resultado);
    $_SESSION['usu']=$fila;
    desconectarBD();
    $_SESSION['user']=$_SESSION['usu']['nombre']." ".$_SESSION['usu'][apellidos];
   header('location:../ADMIN/principal.php');

  }else{
    //NO HAY NINGÚN USUARIO
       header('location:../ADMIN/index.php?errorAdmin=YES');
  }
  desconectarBD();
?>
