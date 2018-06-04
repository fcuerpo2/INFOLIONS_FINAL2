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
    $id=$_SESSION['FichaUsuario'][0]['idUsuario'];
    conectarBD();
    $consulta="UPDATE usuarios SET Nombre='$nombre', Apellidos='$apellidos',Sexo='$sexo', EstadoCivil='$estadocivil', Telefono='$telefono', Movil='$movil', Web='$web' WHERE idUsuario=$id";
    $resultado=$conexion->query($consulta);
    desconectarBD();
    $_SESSION['FichaUsuario'][0]['Web']=$web;
    $_SESSION['FichaUsuario'][0]['Movil']=$movil;
    $_SESSION['FichaUsuario'][0]['Telefono']=$telefono;
    $_SESSION['FichaUsuario'][0]['EstadoCivil']=$estadocivil;
    $_SESSION['FichaUsuario'][0]['Sexo']=$sexo;
    $_SESSION['FichaUsuario'][0]['Apellidos']=$apellidos;
    $_SESSION['FichaUsuario'][0]['Nombre']=$nombre;
    $_SESSION['FichaUsuario'][0]=$nombre." ".$apellidos;

    echo "Bienvenido/a ".$_SESSION['usu']['Nombre']." ".$_SESSION['usu']['Apellidos'];
    }
?>