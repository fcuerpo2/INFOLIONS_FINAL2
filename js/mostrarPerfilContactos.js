function perfilUsuario(envioId){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("mostrarPerfilContactos").innerHTML = this.responseText;
      document.getElementById("mostrarPerfilContactos").style.display="inline";
      document.getElementById("tags").style.display="none";
      document.getElementById("perfiles").style.display="none";
      //document.getElementById("anuncio-top").style.display="none";
      document.getElementById("buscarAmigos").style.display="none";
    }
  }
  xhttp.open("GET", "perfilContacto.php?eId="+envioId, true);
  xhttp.send();   
}
function cancelarPeticion(miEmail,cancelContacto){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("buscarA").innerHTML = this.responseText; 
      buscarAmigoContactos()    
    }
  }
  xhttp.open("GET", "cancelarAmistad.php?sidUs="+miEmail+"&sidCon="+ cancelContacto, true);
  xhttp.send();
  }

function anyadirPeticion(miEmail,miId,solidContacto){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("buscarA").innerHTML = this.responseText;     
      buscarAmigoContactos();
    }
  }
  xhttp.open("GET", "solicitarAmistad.php?sidUs="+miEmail+"&sidUsu="+ miId +"&sidCon="+ solidContacto, true);
  xhttp.send();
}

function cancelarSolicitud(emailContacto,sMiId){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("buscarAmigos").innerHTML = this.responseText;     
      verSolicitudesContactos()
    }
  }
  xhttp.open("GET", "cancelarSolicitud.php?semCon="+emailContacto+"&sMiId="+ sMiId, true);
  xhttp.send();
  //verSolicitudesContactos();
}

function aceptarSolicitud(emailContacto,sMiId){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("buscarAmigos").innerHTML = this.responseText;     
      verSolicitudesContactos()
    }
  }
  xhttp.open("GET", "aceptarSolicitud.php?semCon="+emailContacto+"&sMiId="+sMiId , true);
  xhttp.send();
  //verSolicitudesContactos();
}