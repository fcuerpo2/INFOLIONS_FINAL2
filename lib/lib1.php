
<?php

$conexion=null;

function conectarBD(){
			global $conexion;
	//VAMOS A CREAR LA CONSULTA DE LOS CLIENTES
			$servidor="qzw186.formadin.com";
			//dirección del servidor que contiene la base de datos
			$user="qzw186";//usuario administrador de la base de datos
			$pass="Qwerty1";//contraseña del administrador
			$db="qzw186"; //nombre de la base de datos
			//construimos el objeto que establece la conexión
			$conexion=new mysqli($servidor,$user,$pass,$db);
			//si el objeto genera un error, entonces muere
			if($conexion->connect_error){
		die("Error en la conexion con la base de datos ".$conexion->connect_error);
			}
			$conexion->set_charset("utf8");
}

function desconectarBD(){
			global $conexion;
		//cerramos la conexion
		$conexion->close();
}

	function verTablaClientesActivos(){
		global $conexion;

		$consulta1="SELECT * FROM CLIENTES WHERE Activo=true";
//Si el resultado tiene alguna fila entonces iniciamos sesión y exito
//sI el resultado no tienen fila entonces fracaso
//ejecutamos la consulta1 que corresponde a la comprobación del registro
	$resultado=$conexion->query($consulta1);	
	if($resultado->num_rows>0){
		
		$texto="<table id='mitabla' class='table table-striped table-bordered' style='width:80%; background-color: #ccc;'><thead><tr><th>Editar</th><th>Borrar</th><th>Nombre</th>";
		$texto.="<th>Apellidos</th><th>email</th><th>telefono</th>";
		$texto.="<th>Domicilio</th><th>NIF</th><th>login</th></tr></thead><tbody>";
	while($fila=mysqli_fetch_assoc($resultado)){
		$texto.="<tr><td><button onclick='editar(".$fila['idCliente'].");'><img src='./img/editar.png' width='25px'/></button ></td><td><button onclick='borrar(".$fila['idCliente'].");'><img src='./img/borrar.png' width='25px'/></button></td><td>".$fila['Nombre']."</td>";
		$texto.="<td>".$fila['Apellidos']."</td><td>".$fila['Email']."</td>";
		$texto.="<td>".$fila['Telefono']."</td><td>".$fila['Domicilio']."</td>";
		$texto.="<td>".$fila['DNI']."</td><td>".$fila['Usuario']."</td></tr>";
	}
		$texto.="</tbody></table>";

		return $texto;
	}
}

function verTags(){
      //creamos la consulta de seleccion del tag y le damos formato 
       //JSON Y LA RETORNAMOS
    $consulta="SELECT * FROM Tags order by Fecha DESC";

    conectarBD();
    $miArray = array();

    if ($resultado= $conexion->query($consulta)) {

    while($row = $resultado->fetch_assoc()) {
            $miArray[] = $row;
    }
  }
    desconectarBD();
    echo json_encode($miArray);

  }



?>