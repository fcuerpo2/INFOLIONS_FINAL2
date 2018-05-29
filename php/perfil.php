<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }

if ($_SESSION['usu']['idUsuario']!=0) {


     include "../lib/lib1.php";

     $nombre=$_SESSION['usu']['Nombre'];
     $apellidos=$_SESSION['usu']['Apellidos'];
     $sexo=$_SESSION['usu']['Sexo'];
     $estadocivil=$_SESSION['usu']['EstadoCivil'];
     $telefono=$_SESSION['usu']['Telefono'];
     $movil=$_SESSION['usu']['Movil'];
     $email=$_SESSION['usu']['Email'];
     $web=$_SESSION['usu']['Web'];
     $fotoportada=$_SESSION['usu']['FotoPortada'];

     $texto="<div class='row'><div class='col-md-3'>";
     $texto.="<form method='POST' id='subir' action='../php/fichero.php'><div id='foto'>";
     
$nombre_fichero = '../doc/fotoportada/'.$fotoportada;
if (file_exists($nombre_fichero)) {
    $texto.="<img src='../doc/fotoportada/$fotoportada' id='fotoperfil' class='escalar'/>";
} else {
    $texto.="<img src='../img/reservoir.png' id='fotoperfil' class='escalar'/>";
}    

     $texto.="</div><br>
      <div class='image-upload' style='margin:0 auto; text-align:center;'>
      <label for='fotoportada' style='margin-bottom:0px; cursor:pointer;'>
      <img src='../img/ico-adjuntar.png' style='height:50px; width: 50px; pointer-events:none;'/>
      </label>
      <input type='file' id='fotoportada' name='fotoportada' onchange='subirfoto()' accept='image/*'/></div>
      </form>";
      $texto.="</div><div class='col-md-9'>";
      $texto.="<form method='POST' id='datos' class='form-signin' action='../php/registro.php'>";
      $texto.="<table style='background-color: transparent; width: 100%; max-width: 325px;'><tr><td>Nombre:</td><td><input type='text' name='nombre' class='form-control' value='$nombre'/></td></tr>";
    $texto.="<tr><td>Apellidos:</td><td><input type='text' name='apellidos' class='form-control' value='$apellidos'/></td></tr>";
    $texto.="<tr><td>Sexo:</td><td><input type='text' class='form-control' name='sexo' value='$sexo'/></td></tr>";
    $texto.="<tr><td>Estado Civil:</td><td><input type='text' name='estadocivil' class='form-control' value='$estadocivil'/></td></tr>";
    $texto.="<tr><td>Telefono:</td><td><input type='text' name='telefono' class='form-control' value='$telefono'/></td></tr>";
    $texto.="<tr><td>Móvil:</td><td><input type='text' class='form-control' name='movil' value='$movil'/></td></tr>";
    $texto.="<tr><td>Email:</td><td><input type='text' class='form-control' name='email' value='$email' disabled /></td></tr>";
    $texto.="<tr><td>Web:</td><td><input type='text' class='form-control' name='web' value='$web'/></td></tr>";
    $texto.="<tr><td>Foto:</td><td><input type='text' id='fotop' name='fotoportada' class='form-control' value='$fotoportada' disabled/></td></tr>";
    $texto.="<tr><td><input type='reset' class='form-control btn btn-default' value='Borrar' style='margin-top:10px;'/></td><td><input type='button' onclick='actualizar()' class='form-control btn btn-primary' value='Enviar' style='margin-top: 10px;'/></td></tr></table></form></div></div>";
    echo $texto;
  }else{
    header("location:../index.php");
  }
?>