<?php
include "../COMENTARIOS/mirarlikes.php";
for($i=0;$i<count($miArray);$i++){
$foto=$miArray[$i]['FotoPortada'];
echo "<div id='Tag-".$miArray[$i]['idTag']."' class='tag sombraNegra'><div id='Cabecera-".$miArray[$i]['idTag']."' class='cabecera'>";
$nombre_fichero = '../doc/fotoportada/'.$foto;
if (file_exists($nombre_fichero)) {
    echo "<img src='../doc/fotoportada/$foto' id='fotoperfil' onclick='verImagen(".$foto.")' class='escalar' alt='Foto de Perfil' title='Foto de Perfil' style='width: 40px; height: 40px;' />";
} else {
    echo "<img src='../img/fotoportada-vacia.png' id='fotoperfil' class='escalar' alt='Sin Foto de Perfil' title='Sin Foto de Perfil' style='width: 40px; height: 40px;' />";
}    
echo "&nbsp;&nbsp;&nbsp;".$miArray[$i]['Nombre']." ".$miArray[$i]['Apellidos']."      ".$miArray[$i]['Fecha']."</div>";
echo "<div id='Titulo-".$miArray[$i]['idTag']."' class='titulo'>".$miArray[$i]['Cabecera']."</div>";
echo "<div id='Texto-".$miArray[$i]['idTag']."' class='texto'>".$miArray[$i]['Texto']."</div>"; 
echo "<div id='Imagenes-".$miArray[$i]['idTag']."' class='imagenes' style='margin-top:10px;'>";
echo "<p class='imglist' style='max-width: 1000px;'>";
$totalFotos = 0;
$encontrado="NO";
for($MisFotos=0;$MisFotos<count($_SESSION['TodasFotos']);$MisFotos++)
{
    if ($_SESSION['TodasFotos'][$MisFotos]['IdTag'] == $miArray[$i]['idTag'])
    {
        if (file_exists("../doc/Imagenes/".$_SESSION['TodasFotos'][$MisFotos]['Ruta']))
        {
            echo "<a href='../doc/Imagenes/".$_SESSION['TodasFotos'][$MisFotos]['Ruta']."' data-fancybox='images'>
                <img src='../doc/Imagenes/".$_SESSION['TodasFotos'][$MisFotos]['Ruta']."' style='width:100%; height: auto; border-radius: 5px; margin-bottom: 10px; max-width: 200px;' />
              </a>";
        }
        else
        {
            echo "<a href='../img/Foto-NO-Disponible.jpg' data-fancybox='images'>
                <img src='../img/Foto-NO-Disponible.jpg' style='width:100%; height: auto; border-radius: 5px; margin-bottom: 10px; max-width: 200px;' />
              </a>";            
        }
    }
}
echo "</p>";
echo "</div>";
echo "<div id='Botones-".$miArray[$i]['idTag']."' class='botones' style='margin-top:10px;'>";
$totalLikes = 0;
$encontrado="NO";
for($z=0;$z<count($_SESSION['TodosLikes']);$z++)
{
    if ($_SESSION['TodosLikes'][$z]['IdComentario'] == $miArray[$i]['idTag'])
    {
        $totalLikes++;
        if ($_SESSION['TodosLikes'][$z]['IdUsuarioEnvia'] == $_SESSION['usu']['idUsuario'])
        {
            $encontrado="SI";
        }
    }        
}
if ($encontrado == "NO")
{
//        echo "<img src='../img/megusta.png' style='height:35px; opacity: 0.7;'>";
        echo "<img src='../img/megusta.png' class='escalar oscurecer' style='cursor: pointer; height:30px; width:30px; border-radius: 0px; opacity: 0.5;' onclick='ponerlike(".$miArray[$i]['idTag'].",".$apellidos=$_SESSION['usu']['idUsuario'].",".$miArray[$i]['idUsuario'].")' alt='¿ Te Gusta ?' title='¿ Te Gusta ?'>&nbsp;&nbsp;";
        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
}
else
{
        echo "<img src='../img/nomegusta.png' class='escalar' style='cursor:pointer; height:30px; width:30px; border-radius: 0px;' alt='Ya NO Me Gusta' title='Ya NO Me Gusta' onclick='quitarlike(".$miArray[$i]['idTag'].",".$apellidos=$_SESSION['usu']['idUsuario'].",".$miArray[$i]['idUsuario'].")'>&nbsp;&nbsp;";
        echo "<span style='vertical-align: -webkit-baseline-middle;'>Total Likes: <strong>".$totalLikes."</strong></span>";
}
//echo "<input type='button' class='btn btn-primary' value='Comentario'/>";
echo "</div>";
echo "<div class='comentarios' style='margin-top:15px;'>";

$totalComentarios = 0;
$encontrado="NO";
for($z=0;$z<count($_SESSION['TodosComentarios']);$z++)
{
    if ($_SESSION['TodosComentarios'][$z]['idTag'] == $miArray[$i]['idTag'])
    {
        $totalComentarios++;
        $encontrado="SI";
//        if ($_SESSION['TodosComentarios'][$z]['IdUsuarioEnvia'] == $_SESSION['usu']['idUsuario'])
//        {
//            $encontrado="SI";
//        }
    }        
}
if ($encontrado == "NO")
{
    echo "<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#PublicaComent-".$miArray[$i]['idTag']."'>( $totalComentarios ) Comentarios</button>
            <div id='PublicaComent-".$miArray[$i]['idTag']."' class='collapse' style='padding: 1px 10px 1px; border-radius:10px; background-color: #5cb85c; margin-bottom:0px; margin-top:5px;'>
                <form id='Form-Com-".$miArray[$i]['idTag']."' action='POST' style='margin-top: 10px;'>
                    <div class='formComents'>
                       <input type='text' id='cabecera-coment-".$miArray[$i]['idTag']."' placeholder='Titulo Comentario' class='form-control' style='margin-bottom: 5px;'>
                       <textarea cols='80' rows='3' id='mensaje-coment-".$miArray[$i]['idTag']."' type='text' class='form-control' placeholder='Mensaje Comentario' title='Mensaje Comentario'></textarea>
                       <input type='hidden' id='NumFormComent' value='".$miArray[$i]['idTag']."'>                           
                       <input type='button' class='btn btn-lg btn-primary btn-block' onclick='enviarcomentario(".$miArray[$i]['idTag'].");' value='Publicar Comentario' style='margin-top:10px;' id='botPubliCom-".$miArray[$i]['idTag']."'>                       
                    </div>
                </form>
            </div>";
}
else
{
    echo "<button type='button' class='btn btn-success' data-toggle='collapse' data-target='#BotComent-".$miArray[$i]['idTag']."'>( $totalComentarios ) Comentarios</button>
            <div id='BotComent-".$miArray[$i]['idTag']."' class='collapse show'>
              <div id='PublicaComent-".$miArray[$i]['idTag']."' style='padding: 1px 10px 1px; border-radius:10px; background-color: #5cb85c; margin-bottom:0px; margin-top:5px;'>
                <form id='Form-Com-".$miArray[$i]['idTag']."' action='POST' style='margin-top: 10px;'>
                    <div class='formComents'>
                       <input type='text' id='cabecera-coment-".$miArray[$i]['idTag']."' placeholder='Titulo Comentario' class='form-control' style='margin-bottom: 5px;'>
                       <textarea cols='80' rows='3' id='mensaje-coment-".$miArray[$i]['idTag']."' type='text' class='form-control' placeholder='Mensaje Comentario' title='Mensaje Comentario'></textarea>
                       <input type='hidden' id='NumFormComent' value='".$miArray[$i]['idTag']."'>                           
                       <input type='button' class='btn btn-lg btn-primary btn-block' onclick='enviarcomentario(".$miArray[$i]['idTag'].");' value='Publicar Comentario' style='margin-top:10px;' id='botPubliCom-".$miArray[$i]['idTag']."'>                       
                    </div>
                </form>
            </div>";
    for($z=0;$z<count($_SESSION['TodosComentarios']);$z++)
{
    if ($_SESSION['TodosComentarios'][$z]['idTag'] == $miArray[$i]['idTag'])
    {
        echo "<div id='TagComentario-".$_SESSION['TodosComentarios'][$z]['idComentario']."' class='tag sombraNegra' style='max-width: 85%; margin-top:15px;'><div id='CabeceraComent-".$_SESSION['TodosComentarios'][$z]['idComentario']."' class='cabeceracoment'>";
$nombre_fichero = '../doc/fotoportada/'.$_SESSION['TodosComentarios'][$z]['FotoPortada'];
if (file_exists($nombre_fichero)) {
    echo "<img src='../doc/fotoportada/".$_SESSION['TodosComentarios'][$z]['FotoPortada']."' id='fotoperfil' onclick='verImagen(".$_SESSION['TodosComentarios'][$z]['FotoPortada'].")' class='escalar' alt='Foto de Perfil' title='Foto de Perfil' style='width: 40px; height: 40px;' />";
} else {
    echo "<img src='../img/fotoportada-vacia.png' id='fotoperfil' class='escalar' alt='Sin Foto de Perfil' title='Sin Foto de Perfil' style='width: 40px; height: 40px;' />";
}    
echo "&nbsp;&nbsp;&nbsp;".$_SESSION['TodosComentarios'][$z]['Nombre']." ".$_SESSION['TodosComentarios'][$z]['Apellidos']."      ".$_SESSION['TodosComentarios'][$z]['Fecha']."</div>";
echo "<div id='TituloComent-".$_SESSION['TodosComentarios'][$z]['idComentario']."' class='titulo'>".$_SESSION['TodosComentarios'][$z]['Cabecera']."</div>";
echo "<div id='TextoComent-".$_SESSION['TodosComentarios'][$z]['idComentario']."' class='texto'>".$_SESSION['TodosComentarios'][$z]['Texto']."</div>"; 
echo "<div id='ImagenesComent-".$_SESSION['TodosComentarios'][$z]['idComentario']."' class='imagenes'></div>";
echo "</div>";              
    }        
}
echo "</div>";
}
echo "</div>";
echo "</div>";
}
?>
