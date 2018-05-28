<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
if (session_id() === '') { session_start(); }

if($_SESSION['usu']['idUsuario']!=""){

  $nombre=$_SESSION['usu']['Nombre'];
  $apellidos=$_SESSION['usu']['Apellidos'];
  $foto=$_SESSION['usu']['FotoPortada'];
  $fecha=date('d-m-y h:i:sa');

	echo "
			<div id='tag' class='tag' >
				<section>
				<header style='display: flex; text-align: center; margin: 0 auto; width: 100%; max-width: 310px; margin-bottom: 15px;'>
                        		<img src='../doc/fotoportada/$foto' id='fotoperfil' class='escalar' /><span style='margin-left:15px; text-align:center; margin-top: 20px;'>$nombre $apellidos $fecha</span>
				</header>
				<form id='ftag' method='POST' style='margin-bottom:0px;'>
				<article>
				<input type='text' class='form-control' id='cab' name='cabecera' placeholder='Título' title='Título' style='margin-bottom:5px;'></input>
				</article>
				<article>
				<textarea cols='80' rows='3' id='text' type='text' class='form-control' name='texto' placeholder='Mensaje' title='Mensaje'></textarea>
				<input type='hidden' name='latitud'/>
				<input type='hidden' name='longitud'/>
				</article>
				<footer>
				<input type='button' class='btn btn-lg btn-primary btn-block' onclick='enviartag();' value='publicar' style='margin-top:10px;'></input>
				</footer>
				</section>
				</form>
			</div>";
}
else{
  header("location: ../index.php");
}
?>
</html>