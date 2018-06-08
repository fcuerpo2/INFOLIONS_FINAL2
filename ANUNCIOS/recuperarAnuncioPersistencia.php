<?php
    if (session_id() == "") session_start(); 
    include '../lib/lib1.php';
    $anuncio="<div id='contenido-anuncio'><h1>A LA ESPERA DE NUEVOS ANUNCIOS</h1></div>";
    
    //select id de anuncios en array
    //mostrar datos de uno de los anuncios de forma aleatoria
    if( $_SESSION['usu']['idUsuario']!=""){
       $anuncio="";
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
                $selAnuncios[$x] = "SELECT * FROM publicidad WHERE idAnuncio=$elegidos[$x]";
                
            
                $_SESSION['anuncio']['recuperado']=$selAnuncios[$x];

                if ($resultado2= $conexion->query($selAnuncios[$x])){
                
                while($row = $resultado2->fetch_assoc()) {
                     $_SESSION['anuncio']['recuperado']=$row;
                     
                    $anuncio.='<div class="row">';
                     if($x==0){ //Al primer anuncio y sólo al primero lo envolvemos en bootstrap para poder ternerlo en dos columnas
                        $anuncio.="<div class='col-sm-3'>";
                     }  
                     $anuncio.= "<h3 id='titul-anuncio'>"; $anuncio.=$_SESSION['anuncio']['recuperado']['titulo'];$anuncio.="</h3>";
                     $anuncio.="<br>";
                     $anuncio.="<img id='img-anuncio-top' src='../doc/fotosPublicidad/";
                     $anuncio.=$_SESSION['anuncio']['recuperado']['imagen'];
                     $anuncio.="' alt='no he podido acceder a la imagen' width='80%'  >";
                     if($x==0){
                        $anuncio.="</div>";
                        $anuncio.="<div class='col-sm-9'>";
                     } 
                     $anuncio.="<h4>"; $anuncio.=$_SESSION['anuncio']['recuperado']['descripcion'];$anuncio.="</h4>";
                     if($x==0){
                        $anuncio.="</div>";
                     }
                     $anuncio.="<br>";
                    $anuncio.="</div>";
                     //SEPARADOR
                     $anuncio.="PP%PSOE";     
                    // echo "<div id='anuncio-top' style='background-color: #0e5f0e; margin-bottom: 20px; border-radius: 10px; padding: 10px; color: #fff;' class='sombraNegra'>Que anuncio</div>"; 
                }
             }
            }
            $_SESSION['anuncio']['salida']=$anuncio;
            echo $anuncio;
        }
        desconectarBD();
        
        
       // echo $anuncio;
    
    
    }else{
     echo $anuncio;   
    }
    
?>