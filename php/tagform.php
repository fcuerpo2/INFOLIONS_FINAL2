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
				<header style='display: flex; text-align: center; margin: 0 auto; width: 100%; max-width: 310px; margin-bottom: 25px; margin-top: 5; padding: 5px; background-color: rgba(255, 255, 255, 0.40); border-radius: 10px;'>";
$nombre_fichero = '../doc/fotoportada/'.$foto;
if (file_exists($nombre_fichero)) {
    echo "<img src='../doc/fotoportada/$foto' id='fotoperfil' class='escalar' alt='Foto de Perfil' title='Foto de Perfil' />";
} else {
    echo "<img src='../img/fotoportada-vacia.png' id='fotoperfil' class='escalar' alt='Sube una Foto de Perfil' title='Sube una Foto de Perfil' />";
}    
        echo "                          <span style='text-align:center; margin-top: 10px; width:100%'><span style='font-size:18px; font-weight: 700; text-shadow: 2px 2px 8px #9a96e4;'>$nombre $apellidos</span><br /><span style='font-size: 12px; font-style: italic;'>$fecha</span></span>
				</header>
				<form id='ftag' method='POST' style='margin-bottom:0px;'>
				<article>
				<input type='text' class='form-control' id='cab' name='cabecera' placeholder='Título' title='Título' style='margin-bottom:5px;'></input>
				</article>
				<article>
				<textarea cols='80' rows='3' id='text' type='text' class='form-control' name='texto' placeholder='Mensaje' title='Mensaje'></textarea>                                
                                <dt style='border-radius:10px; padding: 5px 5px 1px 5px; background-color: #fff; margin-top: 5px; margin-bottom: 5px;'><label>Archivos Adjuntos:</label>   <a href='#' onclick='addField()' accesskey='5'><span style='font-size: 20px; vertical-align: sub;' class='glyphicon glyphicon-camera'></span></a></dt>
                                    <dd style='overflow: hidden; padding: 1px 5px 2px 5px; background-color: rgba(255, 255, 255, 0.80); border-radius: 10px;'><div id='files'></div></dd>
				<input type='hidden' name='latitud'/>
				<input type='hidden' name='longitud'/>
				</article>
				<footer>
				<input type='button' class='btn btn-lg btn-primary btn-block' onclick='enviartag();' value='Publicar' style='margin-top:10px;' id='botPubliTag'></input>
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