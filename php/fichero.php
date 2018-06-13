<?php
  if (session_id() === "") {session_start();} 
  include '../lib/lib1.php';


  if(isset($_FILES['fotoportada'])){
  
  $foto=$_SESSION['usu']['idUsuario']."-".$_FILES['fotoportada']['name'];

  $_SESSION['usu']['FotoPortada']=$foto;

//  move_uploaded_file($_FILES['fotoportada']['tmp_name'],"../doc/fotoportada/$foto");

  $patch='../doc/fotoportada';


//Parámetros optimización, resolución máxima permitida
$max_ancho = 500;
$max_alto = 300;


if($_FILES['fotoportada']['type']=='image/png' || $_FILES['fotoportada']['type']=='image/jpeg' || $_FILES['fotoportada']['type']=='image/gif'){
	

$medidasimagen= getimagesize($_FILES['fotoportada']['tmp_name']);

//Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
	if($medidasimagen[0] < $max_ancho && $_FILES['fotoportada']['size'] < 100000){

	$nombrearchivo=$foto;
	move_uploaded_file($_FILES['fotoportada']['tmp_name'], $patch.'/'.$nombrearchivo);
	
}


//Si no, se generan nuevas imagenes optimizadas
else {

$nombrearchivo=$foto;

//Redimensionar
$rtOriginal=$_FILES['fotoportada']['tmp_name'];

if($_FILES['fotoportada']['type']=='image/jpeg'){
$original = imagecreatefromjpeg($rtOriginal);
}
else if($_FILES['fotoportada']['type']=='image/png'){
$original = imagecreatefrompng($rtOriginal);
}
else if($_FILES['fotoportada']['type']=='image/gif'){
$original = imagecreatefromgif($rtOriginal);
}

 
list($ancho,$alto)=getimagesize($rtOriginal);

$x_ratio = $max_ancho / $ancho;
$y_ratio = $max_alto / $alto;


if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
    $ancho_final = $ancho;
    $alto_final = $alto;
}
elseif (($x_ratio * $alto) < $max_alto){
    $alto_final = ceil($x_ratio * $alto);
    $ancho_final = $max_ancho;
}
else{
    $ancho_final = ceil($y_ratio * $ancho);
    $alto_final = $max_alto;
}

$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
 
//imagedestroy($original);
 
$cal=7;

if($_FILES['fotoportada']['type']=='image/jpeg'){
imagejpeg($lienzo,$patch."/".$nombrearchivo);
}
else if($_FILES['fotoportada']['type']=='image/png'){
imagepng($lienzo,$patch."/".$nombrearchivo);
}
else if($_FILES['fotoportada']['type']=='image/gif'){
imagegif($lienzo,$patch."/".$nombrearchivo);
}

}

	}

  
  
  
  
  
  
  
  
  
  
  conectarBD();
  $consulta="UPDATE usuarios SET FotoPortada='$foto' WHERE idUsuario=".$_SESSION['usu']['idUsuario'];
  $resultado=$conexion->query($consulta);
  desconectarBD();

  echo $foto;
    }
?>