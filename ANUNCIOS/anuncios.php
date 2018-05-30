<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "
<div id='perfiles' class='sombraNegra'>
			<div id='tag' class='tag'>
				<section>
				<header style='display: flex; text-align: center; margin: 0 auto; width: 100%; max-width: 310px; margin-bottom: 15px;'><img src='../doc/fotoportada/12-carlos.jpg' id='fotoperfil' class='escalar' alt='Foto de Perfil' title='Foto de Perfil'>                          <span style='text-align:center; margin-top: 10px; width:100%'><span style='font-size:18px; font-weight: 700; text-shadow: 2px 2px 8px #9a96e4;'>Carlos  Acevedo Jiménez</span><br><span style='font-size: 12px; font-style: italic;'>30-05-18 05:00:26pm</span></span>
				</header>
				<form id='ftag' method='POST' style='margin-bottom:0px;'>
				<article>
				<input class='form-control' id='cab' name='cabecera' placeholder='Título' title='Título' style='margin-bottom:5px;' type='text'>
				</article>
				<article>
				<textarea cols='80' rows='3' id='text' type='text' class='form-control' name='texto' placeholder='Mensaje' title='Mensaje'></textarea>
				<input name='latitud' type='hidden'>
				<input name='longitud' type='hidden'>
				</article>
				<footer>
				<input class='btn btn-lg btn-primary btn-block' onclick='enviartag();' value='Publicar' style='margin-top:10px;' id='botPubliTag' type='button'>
				</footer>
				</form></section>
				
			</div></div>
                                        ";

?>

