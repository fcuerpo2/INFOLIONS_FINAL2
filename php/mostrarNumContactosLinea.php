<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
$email=$_POST['email'];
$miId=$_POST['idUs'];
$enLinea=1;
/*
$miconsulta="SELECT idUsuario, Nombre, Apellidos, FotoPortada, Email, Activo, FechaLogin, enLinea FROM usuarios WHERE Activo='1' AND (Email IN (SELECT id_usuario FROM contactos WHERE aceptar ='1' AND id_contacto ='$miId') OR idUsuario IN (SELECT id_contacto FROM contactos WHERE aceptar ='1' AND id_usuario ='$email')) ";
*/
$miconsulta="SELECT idUsuario FROM usuarios WHERE Activo='1' AND enLinea ='$enLinea' AND Email !='$email' AND (Email IN (SELECT id_usuario FROM contactos WHERE aceptar ='1' AND id_contacto ='$miId') OR idUsuario IN (SELECT id_contacto FROM contactos WHERE aceptar ='1' AND id_usuario ='$email') ) ";
$resultado = mysqli_query($conexion,$miconsulta); 
$row_cnt = mysqli_num_rows($resultado);
if ($row_cnt>0) {
    /* determinar el número de filas del resultado */
    echo $row_cnt." en Linea ";
    /* cerrar el resulset */
}
mysqli_free_result($resultado);
$conexion->close();
?>