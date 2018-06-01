<?php
  if (session_id() === "") { session_start(); } 
  include '../lib/lib1.php';

 if(isset($_POST['texto'])){
  //recibimos las variables por POST
    $_SESSION['MisArchivos']=$_FILES;
    $_SESSION['Total_imagenes']=count($_SESSION['MisArchivos']['archivos']['name']);
    $texto=$_POST['texto'];
    $cabecera=$_POST['cabecera'];
    $latitud=$_POST['latitud'];
    $longitud=$_POST['longitud'];
    $idusuario=$_SESSION['usu']['idUsuario'];
    conectarBD();
    //creamos la consulta de inserción del tag y la ejecutamos
    $consulta="INSERT INTO Tags(idUsuario,Cabecera,Texto,Latitud,Longitud) VALUES ($idusuario,'$cabecera','$texto','$latitud','$longitud')";
    $conexion->query($consulta);
    $consulta2 = "SELECT LAST_INSERT_ID()";
    $MiUltimoID=$conexion->query($consulta2);
    desconectarBD();
    // Vamos a Subir las Imagenes
    for($i=0;$i<count($_SESSION['MisArchivos']['archivos']['name']);$i++)
    {
        if ($_SESSION['MisArchivos']['name'] != "")
        {
            $foto=$_SESSION['usu']['idUsuario']."-".$_SESSION['MisArchivos']['name'];
            move_uploaded_file($_SESSION['MisArchivos']['tmp_name'],"../doc/Imagenes/$foto");

                conectarBD();
                //creamos la consulta de inserción de las Imagenes
                $consulta="INSERT INTO Fotos(idUsuario,IdTag,Nombre,Ruta) VALUES ($idusuario,$MiUltimoID,'$foto','$foto')";
                $conexion->query($consulta);
                desconectarBD();
        }
    }
 }
 include './dibujartags.php';
?>