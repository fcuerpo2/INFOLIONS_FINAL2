<?php

header('Cache-Control: no-cache, must-revalidate'); // HTTP/1.1
header('Expires: Sat, 1 Jul 2000 05:00:00 GMT'); // Fecha en el pasado
if (session_id() === '') { session_start(); }

if($_SESSION['usu']['idUsuario']!=""){

  $nombre=$_SESSION['usu']['Nombre'];
  $apellidos=$_SESSION['usu']['Apellidos'];
  $foto=$_SESSION['usu']['FotoPortada'];
  $fecha=date('d-m-y h:i:sa');
  $nombre_fichero = '../doc/fotoportada/'.$foto;
echo "
   
<div id='perfiles' class='sombraNegra'>
                        <br>
                        <h3>PUBLICAR ANUNCIO</h3>
			<div id='tag' class='tag'>
				<section>
				<header style='display: flex; text-align: center; margin: 0 auto; width: 100%; max-width: 310px; margin-bottom: 15px;'>";
                                if (file_exists($nombre_fichero)) {
                                    echo "<img src='../doc/fotoportada/$foto' id='fotoperfil' class='escalar' alt='Foto de Perfil' title='Foto de Perfil' />";
                                }else{
                                    echo "<img src='../img/fotoportada-vacia.png' id='fotoperfil' class='escalar' alt='Sube una Foto de Perfil' title='Sube una Foto de Perfil' />";
                                }
                                echo "<span style='text-align:center; margin-top: 10px; width:100%'><span style='font-size:18px; font-weight: 700; text-shadow: 2px 2px 8px #9a96e4;'>$nombre $apellidos</span><br><span style='font-size: 12px; font-style: italic;'>$fecha</span></span>
				</header>
				<form class='needs-validation' novalidate id='formAnuncio' method='POST' style='margin-bottom:0px;'>
				<article>
				<input class='form-control' id='cab' name='cabecera' placeholder='Título' title='Título' style='margin-bottom:5px;' type='text' required>
				</article>
                                <article>
                                    <br>                
                                    <label class='btn btn-primary'>
                                        <span class='glyphicon glyphicon-camera'></span>
                                           &nbsp; &nbsp;Foto
                                           <input type='file' accept='image/*' onchange='subirFotoAnuncio();' id='fotoAnuncio' name='fotoAnuncio'  hidden>
                                    </label>    
                                </article>
                                    <br>
                                <article>
                                    <div id='fotoAnuncioSelect'>
                                    </div>
                                </article>
                                 <br>
				<article>
				<textarea cols='80' rows='3' required id='textDescripcion' type='text' class='form-control' name='textDescripcion' placeholder='Texto del anuncio. Si elijes foto no aparecerá este texto' title='Mensaje'></textarea>
				<input name='latitud' type='hidden'>
				<input name='longitud' type='hidden'>
				</article>
                                <br>
                                <article>
                                    <p>Inicio publicación:</p>
                                    <input id='date' type='date' name='fechaDesde'>
                                    <input id='time' type='time' name='horaDesde'>
                                </article>
                                 <article>
                                    <p>Fin publicación:</p>
                                    <input id='date' type='date' name='fechaHasta'>
                                    <input id='time' type='time' name='horaHasta'>
                                </article>
                                
				<footer>
				<input class='btn btn-lg btn-primary btn-block' onclick='publicarAnuncio();' value='Publicar' style='margin-top:10px;' id='botPubliTag' type='button'>
				</footer>
				</form></section>
                                
                                <!--
                                <div id='pruebasNombreFoto'>
                                    <input id='fotoAnuncioNombre' name='fotoAnunNombre' class='form-control' value='nombre' disabled='' type='text'>
                                </div> -->
			</div></div>
                                        ";

//enviartag()
}
?>