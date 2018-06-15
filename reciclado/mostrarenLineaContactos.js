$(document).ready(function(){  
    $nEmail = $("#miEmail").val();
    /* codigo ajax para cargar contactos en principal desde el tiempo 0 segundo  */
    $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/mostrarenLineaContactos.php",
            data: "email=" + $nEmail,
            success: function(respuesta) {
                $('#enLineaContactos').html(respuesta);
            }
        });    
    /* codigo para cargar contactos despues de 5 segundos*/
    setInterval(function(){ mostrarContactosenLinea() }, 5000);
    function mostrarContactosenLinea() {
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/mostrarenLineaContactos.php",
            data: "email=" + $nEmail,
            success: function(respuesta) {
                $('#enLineaContactos').html(respuesta);
            }
        });
    }    
});