<html>
	<head>
		<title>EXITO EN EL ACCESO</title>
	</head>
	<body>
	<center>
	<?php
			session_start();
		if(isset($_SESSION['usuario']))
		{

			$usuario=$_SESSION['usuario'];
			echo "Hola ".$usuario;

			echo "<h1>FELICIDADES HAS ENTRADO EN LA PAGINA</h1>
					<img src='../img/exito.jpg' width='300px'/>
					</center> ";
			session_destroy();
		}else{

			header("Location:../index.php");


		}


			?>
	</body>

</html>