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

        if ($resultado= $conexion->query($coleccionIdAnuncios)) {
            while($row = $resultado->fetch_assoc()) {
                    $arrayIdAnuncios[] = $row;
            }
            $elegido=rand(0, count($arrayIdAnuncios));
             if ($resultado= $conexion->query($selAnuncio)){
                 while($row = $resultado->fetch_assoc()) {
                      
                     $anuncio=$row;
                }
             }
            
        }
        desconectarBD();
        
        
        echo $anuncio;
    
    
    }else{
     echo $anuncio;   
    }
    
?>