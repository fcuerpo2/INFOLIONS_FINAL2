<?php 
if (session_id() == "") {session_start(); }
include '../lib/lib1.php';
conectarBD(); 
/* @var $_POST type */
$email=$_POST['email'];
$time = 15 ;
// Momento que entra en línea
$date = time() ;
// Tiempo Limite de espera 
$limite = $date-$time*60 ;
// si se supera el tiempo limite (5 minutos) lo borramos
$fechaFuera=0;
$linea=0;
$enLinea=1;
$consulta="UPDATE usuarios SET FechaLogin='$fechaFuera', enLinea='$linea' WHERE FechaLogin < $limite";
$resultado=$conexion->query($consulta);
// tomamos todos los usuarios en linea
$resultado = mysqli_query($conexion, "SELECT Nombre, Apellidos, FotoPortada, Activo, FechaLogin FROM usuarios WHERE enLinea=$enLinea AND Email !='$email'");
// Si son los mismo actualizamos la tabla gente_online
$usuarios = $resultado->num_rows;

if ($resultado->num_rows>0) {
    //echo "entra >0";
    // output data of each row
    	while($row = $resultado->fetch_assoc()) {
			if($row['Activo']==1)
      {    		
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
    echo "no tienes Contactos";
}
$conexion->close();
 

?>