var t="";
var objeto=null;

function miperfil(){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tags").innerHTML = this.responseText;
      document.getElementById("perfiles").style.display="none";
      document.getElementById("anuncio-top").style.display="none";
    }
  }
  xhttp.open("GET", "../php/perfil.php", true);
  xhttp.send();   
}
//-------------------------------------------------------------------------------------------------------------
//MÉTODOS DE PUBLICIDAD     nuevoAnuncio() --> método para presentar crear anuncio
//                          publicarAnuncio() --> método para crear en base de datos y volver a principal.php

function nuevoAnuncio(){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tags").innerHTML = this.responseText;
      document.getElementById("perfiles").style.display="none";
     // document.getElementById("anuncio-top").style.display="none";
    }
  }
 
  xhttp.open("GET", "../ANUNCIOS/anuncios.php", true);
  xhttp.send();   
}

function publicarAnuncio(){
if(confirm("¿Estás seguro que quieres publicar el anuncio?")){
        $.ajax({
        type: 'POST',
        url: '../php/subirAnuncio.php',
        contentType: false,
        processData: false,
        success:function(resultado){
          alert(resultado);
         window.location.assign("../principal.php");
         // document.getElementById('fotop').value=resultado;          
        }
    });
  }
}



function subirFotoAnuncio(){
    var textDescripcion = document.getElementById('textDescripcion');
if(confirm("¿Estás seguro que quieres subir una imagen? \n\
(imagen y descripcion son EXCLUYENTES)")){
    var formdata = new FormData($('#formAnuncio')[0]);
 
    $.ajax({
        type: 'POST',
        url: '../ANUNCIOS/fotoUp.php',
        data: formdata,
        contentType: false,
        processData: false,
        success:function(resultado){
          document.getElementById('fotoAnuncioSelect').innerHTML="<img src='../doc/fotosPublicidad/"+resultado+"' class='fotoAnuncio' alt='sin acceso a la foto'/>";
          document.getElementById('fotoAnuncioNombre').value=resultado;
          document.getElementById('textDescripcion').type='hidden';
        }
    });



  }else{
     //  textDescripcion.type='text';
  }
}

function compruebaCompatibilidadLocalStorage() {
    if (window.sessionStorage && window.localStorage) {
        alert('Tu navegador acepta almacenamiento local'); 
    } else {			
        alert('Lo siento, pero tu navegador no acepta almacenamiento local');		
             }
}
//------------------------------------------------------------------------------------------------------


function subirfoto(){
if(confirm("¿Estás seguro que quieres cambiar la foto?")){
    var formdata = new FormData($('#subir')[0]);
    
    $.ajax({
        type: 'POST',
        url: '../php/fichero.php',
        data: formdata,
        contentType: false,
        processData: false,
        success:function(resultado){
          document.getElementById('foto').innerHTML="<img src='../doc/fotoportada/"+resultado+"' width='200px'/>";
          document.getElementById('fotop').value=resultado;          
        }
    });



  }
}



function actualizar(){
if(confirm("¿Estás seguro que quieres actualizar los datos?")){
    var formdata = new FormData($('#datos')[0]);
        $.ajax({
        type: 'POST',
        url: '../php/actualizar.php',
        data: formdata,
        contentType: false,
        processData: false,
        success:function(resultado){
          alert(resultado);
         // document.getElementById('fotop').value=resultado;          
        }
    });
  }
}

function salir(){
if(confirm("¿Estás seguro que quieres salir?")){
        $.ajax({
        type: 'POST',
        url: '../php/salir.php',
        contentType: false,
        processData: false,
        success:function(resultado){
          alert(resultado);
         window.location.assign("../index.php");
         // document.getElementById('fotop').value=resultado;          
        }
    });
  }
}

function registrate(){
        $.ajax({
        type: 'POST',
        url: './php/registrate.php',
        contentType: false,
        processData: false,
        success:function(resultado){
        document.getElementById('acceso').innerHTML=resultado;     
        }
    });
 }

function registrar(){
      var formdata = new FormData($('#datos')[0]);
        $.ajax({
        type: 'POST',
        url: './php/registrar.php',
        data: formdata,
        contentType: false,
        processData: false,
        success:function(resultado){
          alert(resultado);
         window.location.assign("./index.php");         
        }
    });
 }

 function cargarmuro(){

        $.ajax({
        type: 'POST',
        url: '../php/tagform.php',
        contentType: false,
        processData: false,
        success:function(resultado){
        document.getElementById('perfiles').innerHTML=resultado;  

        }
    });
 if (navigator.geolocation){
  navigator.geolocation.getCurrentPosition(showPosition);
  }    
 }

  function enviartag(){

      document.getElementById("botPubliTag").value="Publicando...";
      var tags="";
      var formdata = new FormData($('#ftag')[0]);
        $.ajax({
        type: 'POST',
        url: '../php/insertartag.php',
        data: formdata,
        contentType: false,
        processData: false,
        success:function(resultado){
        document.getElementById("tags").innerHTML=resultado;            
//       	objeto = JSON.parse(resultado); 
//    	mostrarTags(objeto);
        document.getElementById("botPubliTag").value="Publicado";
 		}
    });  

		document.getElementById("cab").value="";
		document.getElementById("text").value="";

 }

  function showPosition(position){
  document.getElementById('latitud').value=position.coords.latitude;
  document.getElementById('longitud').value=position.coords.longitude;
 }

function mostrarTags(obj){

		obj.forEach(crearTags);
       	 document.getElementById("tags").innerHTML=t;
}


function crearTags(miTexto,index){
	var idTag=miTexto.idTag;
   t+="<div id='Tag-"+miTexto.idUsuario+"' class='tag sombranegra'><div class='cabecera'><img src='../doc/fotoportada/"+miTexto.FotoPortada+"' onclick='verImagen("+miTexto.FotoPortada+")' class='escalar'>&nbsp;&nbsp;&nbsp;&nbsp;"+miTexto.Nombre+" "+miTexto.Apellidos+" "+miTexto.Fecha+"</div>";
   t+="<div class='titulo' style='padding-bottom:3px;'>"+miTexto.Cabecera+"</div>";
   t+="<div class='texto' style='padding-bottom:3px;'>"+miTexto.Texto+"</div>";
   t+="<div id='imagenes'></div><div id='botones' style='margin-top:10px;'><input type='button' class='btn btn-primary' value='Me gusta'/>&nbsp;&nbsp;&nbsp;<input type='button' class='btn btn-primary' value='Comentario'/></div>";
   t+="<div id='comentarios'></div></div>"; 
}

function verImagen(foto){
	alert("'../doc/fotoportada/"+foto);
	var ruta="../doc/fotoportada/"+foto;
//document.getElementById("imagen").style.visibility=true;
document.getElementById("imagen").innerHTML="<img src='"+ruta+"' width='200px'/>";

}
function ponerlike(numTag,UserEnvia,UserRecibe)
{
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Botones-"+numTag).innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "../COMENTARIOS/ponerlike.php?NumTag="+numTag+"&UserEnvia="+UserEnvia+"&UserRecibe="+UserRecibe, true);
    xhttp.send();    
//    contenedor="Botones-"+numTag;
//    ruta="../COMENTARIOS/ponerlike.php?numTag="+numTag+"&UserEnvia="+UserEnvia+"UserRecibe="+UserRecibe;
//    alert(ruta);
//    document.getElementById(contenedor).load(ruta);
}

function quitarlike(numTag,UserEnvia,UserRecibe)
{
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Botones-"+numTag).innerHTML = this.responseText;
        }
    }
    xhttp.open("GET", "../COMENTARIOS/quitarlike.php?NumTag="+numTag+"&UserEnvia="+UserEnvia+"&UserRecibe="+UserRecibe, true);
    xhttp.send();    
}

var numero = 0;

// Funciones comunes
c= function (tag) { // Crea un elemento
   return document.createElement(tag);
}
d = function (id) { // Retorna un elemento en base al id
   return document.getElementById(id);
}
e = function (evt) { // Retorna el evento
   return (!evt) ? event : evt;
}
f = function (evt) { // Retorna el objeto que genera el evento
   return evt.srcElement ?  evt.srcElement : evt.target;
}

addField = function () {
   container = d('files');
   
   span = c('SPAN');
   span.className = 'file';
   span.id = 'file' + (++numero);

   field = c('INPUT');   
   field.name = 'archivos[]';
   field.type = 'file';
   
   a = c('A');
   a.name = span.id;
   a.href = '#';
   a.onclick = removeField;
//   a.innerHTML = "<span style='padding:5px; background-color:#0000ff; border-radius: 5px; color:#fff; text-decoration: none;'>Quitar</span><br />";
   a.innerHTML = 'QUITAR';

   span.appendChild(field);
   span.appendChild(a);
   container.appendChild(span);
}
removeField = function (evt) {
   lnk = f(e(evt));
   span = d(lnk.name);
   span.parentNode.removeChild(span);
}
  function enviarcomentario(NumForm){

      document.getElementById("botPubliCom-"+NumForm).value="Publicando Comentario...";
      MiCabecera=document.getElementById("cabecera-coment-"+NumForm).value;
      MiMensaje=document.getElementById("mensaje-coment-"+NumForm).value;
      var tags="";
//      var formdata = new FormData($('#Form-Com-'+NumForm)[0]);
        var formdata = new FormData($('#Form-Com-39')[0]);
        $.ajax({
        type: 'POST',
        url: '../php/insertarcoment.php?NumForm='+NumForm+'&Cabecera='+MiCabecera+'&Mensaje='+MiMensaje,
        data: formdata,
        contentType: false,
        processData: false,
        success:function(resultado){
//       	objeto = JSON.parse(resultado); 
//    	mostrarTags(objeto);
//        alert("Correcto: "+resultado);
        document.getElementById("tags").innerHTML=resultado;
        document.getElementById("botPubliCom-"+NumForm).value="Comentario Publicado";
 		}
    });  

//		document.getElementById("cab").value="";
//		document.getElementById("text").value="";

 }
