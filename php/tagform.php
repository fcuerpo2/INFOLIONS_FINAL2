<?php
header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
if (session_id() == '') 
    session_start(); 

if($_SESSION['usu']['idUsuario']!=""){

  $nombre=$_SESSION['usu']['Nombre'];
  $apellidos=$_SESSION['usu']['Apellidos'];
  $foto=$_SESSION['usu']['FotoPortada'];
  $fecha=date('d-m-y h:i:sa');



	echo "
			<div id='tag' class='tag' >
				<section>
				<header>
		<img src='../doc/fotoportada/$foto' id='fotoperfil' />   $nombre $apellidos $fecha
				</header>
				<form id='ftag' method='POST'>
				<article>
				Titulo: <input type='text' class='form-control' id='cab' name='cabecera'></input>
				</article>
				<article>
				Texto: <textarea cols='80' rows='3' id='text' type='text' class='form-control' name='texto'></textarea>
				<input type='hidden' name='latitud'/>
				<input type='hidden' name='longitud'/>
				</article>
				<footer>
				<input type='button' class='btn btn-lg btn-primary btn-block' onclick='enviartag();' value='publicar'></input>
				</footer>
				</section>
				</form>
			</div>	
		";
}
else{

  header("location: ../index.php");

}

?>
</html>