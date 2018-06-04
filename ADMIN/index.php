<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
if (session_id() === "") { session_start(); }
?>
<html lang="es">
<head>
	<title>InfoLions : Administrador</title>
	<link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script> 
	<script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<meta charset="UTF-8">
	    <!-- Custom styles for this template -->
    	<link href="../css/estilo1.css" rel="stylesheet">
    	<script src='../js/script1.js' type='text/javascript'></script>
</head>
<body class="login">
<div class="container-fluid">
    <div id='acceso' class='tag2'>
    	<form class="form-signin" action="./php/loginadmin.php" method="POST">
      		<img class="mb-4 fotologin" src="../img/reservoir.png" alt="" width="72" height="72">
      		<h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión ADMINISTRADOR</h1>
      		<label for="inputEmail" class="sr-only">Email</label>
      		<input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
      		<label for="inputPassword" class="sr-only">Contraseña</label>
      		<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      		<div class="checkbox mb-3">
        		<label>
          			<input type="checkbox" value="remember-me"> Recuérdame
        		</label>
      		</div>
      		<button class="btn btn-lg btn-primary btn-block" type="submit">Inicia Sesión</button>
      		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    	</form>
    </div>
</div>
	
</body>
</html>
