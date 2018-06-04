<?php
if (session_id() == "") session_start(); 
include '../lib/lib1.php';
conectarBD();
    //$email=$_POST['sEmail'];
	$email=$_SESSION['usu']['Email'];
	$fechaFuera=0;
	$linea=0;
	$consulta="UPDATE usuarios SET FechaLogin='$fechaFuera', enLinea='$linea' WHERE Email='$email'";
  	$resultado=$conexion->query($consulta);
  	desconectarBD();
    session_destroy();
  	echo "Hasta Luego";  
?>