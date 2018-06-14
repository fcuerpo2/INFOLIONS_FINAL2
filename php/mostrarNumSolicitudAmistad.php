<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
$miId=$_POST['miId'];
$resultado = mysqli_query($conexion, "SELECT id_contacto FROM contactos WHERE aceptar ='0' AND id_contacto ='".$miId."'");
$row_cnt = mysqli_num_rows($resultado);
if ($row_cnt>0) {
    echo "Solicitud de Amistad " . $row_cnt;
}
mysqli_free_result($resultado);
$conexion->close();
?>