<?php
    if (session_id() == "") session_start(); 
    include '../lib/lib1.php';
    $anuncio="A LA ESPERA DE NUEVOS ANUNCIOS";
    
    //select id de anuncios en array
    //mostrar datos de uno de los anuncios de forma aleatoria
    if( $_SESSION['usu']['idUsuario']!=""){
       
        $coleccionIdAnuncios="SELECT idAnuncio FROM publicidad";
        $selAnuncio = "SELECT * FROM publicidad WHERE idAnuncio=$elegido";
        conectarBD();
        $arrayIdAnuncios = array();
    $_SESSION['anuncio']['recuperado']="nada";
        if ($resultado= $conexion->query($coleccionIdAnuncios)) {
            
            while($row = $resultado->fetch_assoc()) {
                    $arrayIdAnuncios[] = $row;
            }
            $elegido=rand(0, count($arrayIdAnuncios));
           
             if ($resultado= $conexion->query($selAnuncio)){
                 $_SESSION['anuncio']['recuperado']=$elegido;
                 while($row = $resultado->fetch_assoc()) {
                      //TODO: extraer del row el valor
                     $anuncio=$elegido;
                     $_SESSION['anuncio']['recuperado']=$elegido;
                }
             }
            
        }
        desconectarBD();
        
        
        echo $anuncio;
    
    
    }else{
     echo $anuncio;   
    }
    
?>