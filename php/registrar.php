<?php
  if (session_id() == "") session_start(); 
  include '../lib/lib1.php';

 if(isset($_POST['nombre'])){
    $nombre=$_POST['nombre'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    conectarBD();
    $consulta="SELECT * FROM usuarios WHERE Email='$email'";
    $resultado=$conexion->query($consulta);
    if($resultado->num_rows>0){
        //HAY ALGÚN USUARIO 
        desconectarBD();
        echo "Ya existe un usuario con este email";
    }else{
        desconectarBD();
        $consulta="INSERT INTO usuarios(Nombre,Email,Password) VALUES ('$nombre','$email','$password')";
        conectarBD();
        $resultado=$conexion->query($consulta);
        desconectarBD();
        echo "Usuario Registrado";
        echo "Algo ha ido mal";
    }
  }
?>