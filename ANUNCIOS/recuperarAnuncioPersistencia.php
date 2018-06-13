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
                    $arrayIdAnuncios[] = $row['idAnuncio'];
            }
            $_SESSION['anuncio']['arrayIdAnuncios']=$arrayIdAnuncios;
            $elegidosN = array(); //Numero de orden 
            $selAnuncio = array();
            $elegidosV = array();
            
            for($x = 0; $x < 3; $x++) {
                do{
                    $elegidosN[$x]=rand(1, count($arrayIdAnuncios)-1);
                    //TODO : elegidoN[$x] ha de ser diferente al inmediatamente anterior
                    // y ha de ser diferente a los tres de la vez anterior  $_SESSION['anuncio']['elegidosA']
                
                    $elegidosV[$x]=$arrayIdAnuncios[$elegidosN[$x]];
                }while (noRepetirAnuncio($elegidosV[$x],$x,$elegidosV));
                
                
                
                
                $selAnuncios[$x] = "SELECT * FROM publicidad WHERE idAnuncio=$elegidosV[$x]";       
                $_SESSION['anuncio']['recuperado']=$selAnuncios[$x];

                if ($resultado2= $conexion->query($selAnuncios[$x])){
                
                while($row = $resultado2->fetch_assoc()) {
                     $_SESSION['anuncio']['recuperado']=$row;
                     
                    $anuncio.="<div class='row' style='margin-bottom:20px; text-align: center;'>";
                     if($x==0){ //Al primer anuncio y sólo al primero lo envolvemos en bootstrap para poder ternerlo en dos columnas
                        $anuncio.="<div class='col-sm-3' style='margin-left=15px; text-align: center;'>";
                     }  
                     $anuncio.= "<h3 id='titul-anuncio'>"; $anuncio.=$_SESSION['anuncio']['recuperado']['titulo'];$anuncio.="</h3>";
                     $anuncio.="<br>";
                     $anuncio.="<img id='img-anuncio-top' src='../doc/fotosPublicidad/";
                     $anuncio.=$_SESSION['anuncio']['recuperado']['imagen'];
                     $anuncio.="' alt='no he podido acceder a la imagen' width='80%'  >";
                     if($x==0){
                        $anuncio.="</div>";
                        $anuncio.="<div class='col-sm-6'>";
                        $anuncio.="<br><br><br>";
                     } 
                     $anuncio.="<h4>"; $anuncio.=$_SESSION['anuncio']['recuperado']['descripcion'];$anuncio.="</h4>";
                     if($x==0){
                        $anuncio.="</div>";
                        $anuncio.="<div class='col-sm-3'>";
                         $anuncio.= "<h3 id='titul-anuncio'>"; $anuncio.=$_SESSION['anuncio']['recuperado']['titulo'];$anuncio.="</h3>";
                         $anuncio.="<br>";
                         $anuncio.="<img id='img-anuncio-top' src='../doc/fotosPublicidad/";
                         $anuncio.=$_SESSION['anuncio']['recuperado']['imagen'];
                         $anuncio.="' alt='no he podido acceder a la imagen' width='80%'  >";
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
             
            $_SESSION['anuncio']['elegidosA']=$elegidosV;
            $_SESSION['anuncio']['salida']=$anuncio;
            echo $anuncio;
        }
        desconectarBD();
        
        
       // echo $anuncio;
    
    
    }else{
     echo $anuncio;   
    }
    
    function noRepetirAnuncio($aComparar, $x, $arrayIds){
        if($x==1){
            if($aComparar==$arrayIds[0]){
                return true;
            }
        }else if($x==2){
            if($aComparar==$arrayIds[1] ||$aComparar==$arrayIds[0] ){
                return true;
            }
        }
        
        if( $_SESSION['anuncio']['elegidosA'][0]===$aComparar){
          return true;  
        }else if( $_SESSION['anuncio']['elegidosA'][1]===$aComparar){
          return true;  
        }else if( $_SESSION['anuncio']['elegidosA'][2]===$aComparar){
          return true;  
        }
        //TODO : elegidoN[$x] ha de ser diferente al inmediatamente anterior
        // y ha de ser diferente a los tres de la vez anterior  $_SESSION['anuncio']['elegidosA']
        return false;
    }
    
?>