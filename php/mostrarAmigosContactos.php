<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
$email=$_POST['email'];
$resultado = mysqli_query($conexion, "SELECT Nombre, Apellidos, FotoPortada, Activo, FechaLogin FROM usuarios WHERE Email !='".$email."'"); 
if ($resultado->num_rows>0) {
    //echo "entra >0";
    // output data of each row
    	while($row = $resultado->fetch_assoc()) {
			if($row['Activo']==1 ){
    		//echo "estado";    
			//echo "estado: " . $row["estado"]. " - nombre: " . $row["nombre"]. " " . $row["img_perfil"]. "<br>";
      if($row['FotoPortada']!=NULL){  
			echo "  <div class='contacto' id='fotoContacto'>
                   		<a href=''><img src='../doc/fotoportada/" . $row['FotoPortada'] . "' class='imgContactos'></a>        
              </div>
              <div class='contacto' id='nombreContacto'>
                   		<a href=''><strong>" . $row['Nombre'] ." ". $row['Apellidos'] . "</strong></a>
                   		<p>" . $row['FechaLogin'] . "</p>
              </div>";
        }
        else{ 
      echo "  <div class='contacto' id='fotoContacto'>
                <a href=''><img src='../img/usuario.jpg' class='imgContactos'></a>        
              </div>
              <div class='contacto' id='nombreContacto'>
                <a href=''><strong>" . $row['Nombre'] ." ". $row['Apellidos'] . "</strong></a>
                      <p>" . $row['FechaLogin'] . "</p>
              </div>";            
        }    
    	}
	}
} 
else {
    echo "0 results";
}
$conexion->close();
 
/*
<div class='contacto' id =''>
            	       <a href="">"  . $row['img_perfil']. "</a>
                	</div>*/
?>