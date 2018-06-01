<?php
  if (session_id() === "") {session_start();}
  include '../lib/lib1.php';
 if(isset($_POST['nombre'])){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $sexo=$_POST['sexo'];
    $estadocivil=$_POST['estadocivil'];
    $telefono=$_POST['telefono'];
    $movil=$_POST['movil'];
    $web=$_POST['web'];
    $id=$_SESSION['usu']['idUsuario'];
    conectarBD();
    $consulta="UPDATE usuarios SET Nombre='$nombre', Apellidos='$apellidos',Sexo='$sexo', EstadoCivil='$estadocivil', Telefono='$telefono', Movil='$movil', Web='$web' WHERE idUsuario=$id";
    $resultado=$conexion->query($consulta);
    desconectarBD();
    $_SESSION['usu']['Web']=$web;
    $_SESSION['usu']['Movil']=$movil;
    $_SESSION['usu']['Telefono']=$telefono;
    $_SESSION['usu']['EstadoCivil']=$estadocivil;
    $_SESSION['usu']['Sexo']=$sexo;
    $_SESSION['usu']['Apellidos']=$apellidos;
    $_SESSION['usu']['Nombre']=$nombre;
    $_SESSION['user']=$nombre." ".$apellidos;

    echo "Bienvenido/a ".$_SESSION['user'];
    }
?>