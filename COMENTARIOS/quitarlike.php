<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }
include '../lib/lib1.php';

$MiNumTag = $_GET['NumTag'];
$MiUserEnvia = $_GET['UserEnvia'];
$MiUserRecibe = $_GET['UserRecibe'];

$_SESSION['TodosLikes'] = "";
//include '../lib/lib1.php';
  conectarBD();
  
//  $consulta="INSERT INTO Likes(idComentario,IdUsuarioEnvia,IdUsuarioRecibe) VALUES ($MiNumTag,$MiUserEnvia,$MiUserRecibe)";
  $consulta="DELETE FROM Likes WHERE idComentario=".$MiNumTag." AND IdUsuarioEnvia=".$MiUserEnvia." AND IdUsuarioRecibe=".$MiUserRecibe;  

  $resultado=$conexion->query($consulta);

//  desconectarBD();  
  
//  echo "Poner Likes ".$_GET['NumTag'];

  $consulta="SELECT * FROM Likes";  
  
  $resultado=$conexion->query($consulta);
  $_SESSION['TodosLikes'] = mysqli_fetch_all($resultado,MYSQLI_ASSOC);
  
$totalLikes = 0;
$encontrado="NO";
for($z=0;$z<count($_SESSION['TodosLikes']);$z++)
{
    if ($_SESSION['TodosLikes'][$z]['IdComentario'] == $MiNumTag)
    {
        $totalLikes++;
    }        
}
  desconectarBD();
        echo "<img src='../img/megusta.png' class='escalar' style='cursor:pointer; height:30px; width:30px; border-radius: 0px; opacity: 0.5;' alt='¿ Me Gusta ?' title='¿ Te Gusta ?' onclick='ponerlike(".$MiNumTag.",".$MiUserEnvia.",".$MiUserRecibe.")'>&nbsp;&nbsp;";
        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
?>
