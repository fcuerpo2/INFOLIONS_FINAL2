$(document).ready(function(){
/* mostrar a mis amigos */  
    $nEmail = $("#miEmail").val();
    $nId = $("#miId").val(); 
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/mostrarAmigosContactos.php",
            data: "idUs=" + $nId,
            success: function(resp) {
                $('#amigosContactos').html(resp);
            }
        });    
    /* codigo para cargar contactos despues de 5 segundos*/
        setInterval(function(){ mostrarAmigosContactos() }, 5000);
        function mostrarAmigosContactos() {
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "../php/mostrarAmigosContactos.php",
                //data:{"email":$nEmail,"idUs":$nId},
                //data: "email=" + $nEmail + "idUs=" + $nId,
                data: "idUs=" + $nId,
                success: function(resp) {
                $('#amigosContactos').html(resp);
                }
            });
        }
/* mostar numero de solicitudes de amistad */
setInterval(function(){ mostrarNumSolicitudAmistad() }, 5000);
        function mostrarNumSolicitudAmistad(){
            //$('#solicitudAmistad').html($nId);
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "../php/mostrarNumSolicitudAmistad.php",
                data: "miId=" + $nId,
                success: function(resp) {
                $('#solicitudAmistad').html(resp);
                }
            });
        }
/* fin de mostrar numero de solicitud de amistad */ 
/* mostar numero de contactos en linea  */
setInterval(function(){ mostrarNumContactosLinea() }, 5000);
        function mostrarNumContactosLinea(){
            //$('#solicitudAmistad').html($nId);
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "../php/mostrarNumContactosLinea.php",
                data:{"email":$nEmail,"idUs":$nId},
                //data: "email=" + $nEmail,
                success: function(resp) {
                $('#mensajeNumEnLinea').html(resp);
                }
            });
        }
/* fin de mostrar numero contactos en linea */ 
});