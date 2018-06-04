<?php
    if (session_id() == "") session_start(); 
    include '../lib/lib1.php';
    $anuncio="<div id='contenido-anuncio'><h1>A LA ESPERA DE NUEVOS ANUNCIOS</h1></div>";
    
    //select id de anuncios en array
    //mostrar datos de uno de los anuncios de forma aleatoria
    if( $_SESSION['usu']['idUsuario']!=""){
       
        $coleccionIdAnuncios="SELECT idAnuncio FROM publicidad";
        
        conectarBD();
        $arrayIdAnuncios = array();
    $_SESSION['anuncio']['recuperado']="nada";
        if ($resultado= $conexion->query($coleccionIdAnuncios)) {
            
            while($row = $resultado->fetch_assoc()) {
                    $arrayIdAnuncios[] = $row;
            }
            $elegidos = array();
            $selAnuncio = array();
            
            for($x = 0; $x < 3; $x++) {
                $elegidos[$x]=rand(1, count($arrayIdAnuncios));
                $selAnuncios[$x] = "SELECT * FROM publicidad WHERE idAnuncio=$elegidos[0]";
            }
            
            
            $_SESSION['anuncio']['recuperado']=$selAnuncios[0];

             if ($resultado2= $conexion->query($selAnuncios[0])){
                
                 while($row = $resultado2->fetch_assoc()) {
                      //TODO: extraer del row el valor
                     //$anuncio.=$elegido;
                     $_SESSION['anuncio']['recuperado']=$row;
                     $anuncio = $_SESSION['anuncio']['recuperado']['titulo'].", "
                             .$_SESSION['anuncio']['recuperado']['descripcion'].", "
                             .$_SESSION['anuncio']['recuperado']['imagen'];
                     $_SESSION['anuncio']['salida']=$anuncio;
                    // echo "<div id='anuncio-top' style='background-color: #0e5f0e; margin-bottom: 20px; border-radius: 10px; padding: 10px; color: #fff;' class='sombraNegra'>Que anuncio</div>";
                     echo $anuncio;
                     
                }
             }
            
        }
        desconectarBD();
        
        
       // echo $anuncio;
    
    
    }else{
     echo $anuncio;   
    }
    
?>