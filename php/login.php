<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }

  $email=$_POST['email'];
  $password=$_POST['password'];

  include '../lib/lib1.php';

  conectarBD();
  $consulta="SELECT * FROM usuarios WHERE Email='$email' AND password='$password'";

  $resultado=$conexion->query($consulta);

  if($resultado->num_rows>0){
    //HAY ALGÚN USUARIO 
    $fila=mysqli_fetch_assoc($resultado);
    $_SESSION['usu']=$fila;
   header('location:./principal.php');


  }else{
    //NO HAY NINGÚN USUARIO
       header('location:../index.php');


  }



  desconectarBD();



?>
