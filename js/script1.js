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
       
 }

  function enviartag(){

 if (navigator.geolocation){
  navigator.geolocation.getCurrentPosition(showPosition);
  }else{

  }
  	var tags="";

      var formdata = new FormData($('#ftag')[0]);
        $.ajax({
        type: 'POST',
        url: '../php/insertartag.php',
        data: formdata,
        contentType: false,
        processData: false,
        success:function(resultado){
       	objeto = JSON.parse(resultado); 
    	mostrarTags(objeto);
 		}
    });  

		document.getElementById("cab").value="";
		document.getElementById("text").value="";

 }

  function showPosition(){
  document.getElementById('latitud').value=position.coords.latitude;
  document.getElementById('longitud').value=position.coords.longitude;
 }

function mostrarTags(obj){

		obj.forEach(crearTags);
       	 document.getElementById("tags").innerHTML=t;
}


function crearTags(miTexto,index){
	var idTag=miTexto.idTag;
   t+="<div class='tag'><div class='cabecera'><img src='../doc/fotoportada/"+miTexto.FotoPortada+"' onclick='verImagen("+miTexto.FotoPortada+")  "+miTexto.Nombre+" "+miTexto.Apellidos+" "+miTexto.Fecha+"</div>";
   t+="<div class='titulo'>"+miTexto.Cabecera+"</div>";
   t+="<div class='texto'>"+miTexto.Texto+"</div>";
   t+="<div id='imagenes'></div><div id='botones'><input type='button' class='btn btn-primary' value='Me gusta'/><input type='button' class='btn btn-primary' value='Comentario'/></div>";
   t+="<div id='comentarios'></div></div>"; 
}

function verImagen(foto){
	alert("'../doc/fotoportada/"+foto);
	var ruta="../doc/fotoportada/"+foto;
//document.getElementById("imagen").style.visibility=true;
document.getElementById("imagen").innerHTML="<img src='"+ruta+"' width='200px'/>";

}