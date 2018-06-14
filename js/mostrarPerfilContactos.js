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
    }
  }
  xhttp.open("GET", "cancelarAmistad.php?sidUs="+miEmail+"&sidCon="+ cancelContacto, true);
  xhttp.send();

  $nEmail = $("#miEmail").val();
      $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/buscarAmigos.php",
            data: "email=" + $nEmail,
            success: function(resp) {
                $('#buscarAmigos').html(resp);
            }
    });
}

function anyadirPeticion(miEmail,solidContacto){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("buscarA").innerHTML = this.responseText;     
    }
  }
  xhttp.open("GET", "solicitarAmistad.php?sidUs="+miEmail+"&sidCon="+ solidContacto, true);
  xhttp.send();
/* */
  $nEmail = $("#miEmail").val();
    //$("#buscarA").val()==1;
    //$('#amigosContactos').css({"display": "none"});
      $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/buscarAmigos.php",
            data: "email=" + $nEmail,
            success: function(resp) {
                $('#buscarAmigos').html(resp);
            }
    });
  //$('.c').css({"pointer-events": "auto"});   
  //$('.a').css({"pointer-events": "none"});   
}
function cancelarSolicitud(emailContacto,sMiId){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("buscarA").innerHTML = this.responseText;     
    }
  }
  xhttp.open("GET", "cancelarSolicitud.php?semCon="+emailContacto+"&sMiId="+ sMiId, true);
  xhttp.send();
  verSolicitudesContactos();
}
function aceptarSolicitud(emailContacto,sMiId){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("buscarA").innerHTML = this.responseText;     
    }
  }
  xhttp.open("GET", "aceptarSolicitud.php?semCon="+emailContacto+"&sMiId="+sMiId , true);
  xhttp.send();
  verSolicitudesContactos();
}