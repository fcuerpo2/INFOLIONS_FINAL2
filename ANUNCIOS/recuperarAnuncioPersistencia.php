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
            $elegido=rand(1, count($arrayIdAnuncios));
            $selAnuncio = "SELECT * FROM publicidad WHERE idAnuncio=$elegido";
             $_SESSION['anuncio']['recuperado']=$selAnuncio;

             if ($resultado2= $conexion->query($selAnuncio)){
                
                 while($row = $resultado2->fetch_assoc()) {
                      //TODO: extraer del row el valor
                     //$anuncio.=$elegido;
                     $_SESSION['anuncio']['recuperado']=$row;
                }
             }
            
        }
        desconectarBD();
        
        
        echo $anuncio;
    
    
    }else{
     echo $anuncio;   
    }
    
?>