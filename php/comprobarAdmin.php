<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }
if ($_SESSION['usu']['TipoUsuario'] != 1)
{
    header('location:../ADMIN/index.php?errorAdmin=YES');
}
?>
