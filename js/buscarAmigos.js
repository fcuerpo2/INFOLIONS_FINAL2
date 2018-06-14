function buscarAmigoContactos(){
    //$('#buscarAmigos').html('Amistad');
    $nId = $("#miId").val();
    $nEmail = $("#miEmail").val();
    //$("#buscarA").val()==1;    
      $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/buscarAmigos.php",
            data:{"email":$nEmail,"idUs":$nId},
            //data: "email=" + $nEmail + "idUs " + $nId,
            success: function(resp) {
                
                $('#buscarAmigos').html(resp);
                $('#buscarAmigos').css({"display": "grid"});
                $('#mostrarPerfilContactos').css({"display": "none"});
                $('#tags').css({"display": "none"});
                $('#perfiles').css({"display": "none"});
                //$('#anuncio-top').css({"display": "none"});
            }
    });
}
function verSolicitudesContactos(){
    //$('#buscarAmigos').html('Amistad');
    $nId = $("#miId").val();

    //$("#buscarA").val()==1;
    
      $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/buscarSolicitudes.php",
            data: "idUs=" + $nId,
            success: function(resp) {                
                $('#buscarAmigos').html(resp);
                $('#buscarAmigos').css({"display": "grid"});
                $('#mostrarPerfilContactos').css({"display": "none"});
                $('#tags').css({"display": "none"});
                $('#perfiles').css({"display": "none"});
                //$('#anuncio-top').css({"display": "none"});
            }
    });
}