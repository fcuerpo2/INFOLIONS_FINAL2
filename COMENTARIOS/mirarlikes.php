<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }
$_SESSION['TodosLikes'] = "";
//include '../lib/lib1.php';
  conectarBD();
  $consulta="SELECT * FROM Likes";
  $resultado=$conexion->query($consulta);
  
    $i=0;
    while ($array=$resultado->fetch_array()){
        //Obtengo las claves del arreglo que en tu caso son los atributos de la tabla (id, nombre, etc)
        $claves = array_keys($array);
        //Recorro el arreglo de las claves para ir asignando los datos al arreglo con los nombres de los atributos
        foreach($claves as $clave){
            $_SESSION['TodosLikes'][$i][$clave]=$array[$clave];
        }           
        $i++;
    }
  desconectarBD();
?>
