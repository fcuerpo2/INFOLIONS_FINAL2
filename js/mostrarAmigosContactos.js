$(document).ready(function(){  
    $nEmail = $("#aEmail").val();
    $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/mostrarAmigosContactos.php",
            data: "email=" + $nEmail,
            success: function(resp) {
                $('#amigosContactos').html(resp);
            }
        });    
    /* codigo para cargar contactos despues de 5 segundos*/
    setInterval(function(){ mostrarContactosNuevos() }, 5000);
    function mostrarContactosNuevos() {
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "../php/mostrarAmigosContactos.php",
            data: "email=" + $nEmail,
            success: function(resp) {
                $('#amigosContactos').html(resp);
            }
        });
    }    
});