<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }

  $email=$_POST['email'];
  $password=$_POST['password'];

  include '../lib/lib1.php';

  conectarBD();
  
  //METODO-1: de esta forma estamos expuestos a una inyección SQL
  //Hay que usar la sentencia/consulta preparada  para evitar :
  // 1: poniendo un correro con formato valido y como password 'or '1'='1
  //  2: detrás del 'or '1'='1 podemos poner ; DROP TABLE usuarios; SELECT * FROM datos WHERE nombre LIKE '%';
 // $consulta="SELECT * FROM usuarios WHERE Email='$email' AND password='$password'";
 
  //Método-2: No funcionan las inyecciones SQL
  $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE Email=? AND password=? LIMIT 1");
  $stmt->bind_param('ss', $email, $password);
  $stmt->execute();
  $resultado = $stmt->get_result();
  
 //Método-1 
 //
 //$resultado=$conexion->query($consulta);
  
  //Método-3
  //Usando el metodo-1 pero MODIFICANDO LAS VARIABLES DE LOS INPUTS
 // DONDE APARECE un valor de input usar $nombre= mysqli_escape_string($conexion,$nombre);
 $_SESSION['resultado']= $resultado;
  if($resultado->num_rows>0){
     
    //HAY ALGÚN USUARIO 
    $fecha=time();
    $fila=mysqli_fetch_assoc($resultado);
    $_SESSION['usu']=$fila;
    $consulta="UPDATE usuarios SET FechaLogin='$fecha', enLinea='1' WHERE Email='$email'";
    $resultado=$conexion->query($consulta);
    desconectarBD();
    $_SESSION['user']=$_SESSION['usu']['nombre']." ".$_SESSION['usu']['apellidos'];
   header('location:./principal.php');

  }else{
    //NO HAY NINGÚN USUARIO
       header('location:../index.php');
  }
  
  //cerramos sentencia
  $stmt->close();
  desconectarBD();
?>
