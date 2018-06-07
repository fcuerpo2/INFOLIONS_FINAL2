<?php
  if (session_id() === "") { session_start(); } 
  include '../lib/lib1.php';
  $_SESSION['MisArchivos'] = "";
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
    $lastID = mysqli_insert_id($conexion);
    desconectarBD();
    // Vamos a Subir las Imagenes
    for($i=0;$i<count($_SESSION['MisArchivos']['archivos']['name']);$i++)
    {
        if ($_SESSION['MisArchivos']['archivos']['name'][$i] != "")
        {
            $_SESSION['Foto']=$_SESSION['usu']['idUsuario']."-".$_SESSION['MisArchivos']['archivos']['name'][$i];
            $foto=$_SESSION['usu']['idUsuario']."-".$lastID."-".$_SESSION['MisArchivos']['archivos']['name'][$i];
            move_uploaded_file($_SESSION['MisArchivos']['archivos']['tmp_name'][$i],"../doc/Imagenes/$foto");

                conectarBD();
                //creamos la consulta de inserción de las Imagenes
                $consulta="INSERT INTO Foto (idUsuario,IdAlbum,IdTag,Nombre,Ruta) VALUES ($idusuario,0,$lastID,'$foto','$foto')";
                $_SESSION['MiConsulta'] = $consulta;
                $conexion->query($consulta);
                desconectarBD();
        }
    }
 }
 $_SESSION['NumPag']=1;
 include './dibujartags.php';
?>