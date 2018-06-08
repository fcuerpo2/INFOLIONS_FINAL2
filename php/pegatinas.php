<?php
	session_start();

	header ( "Cache-Control: must-revalidate");
	$offset = 60 * 60 * 24 * 150; /*Aquí se especifica los dias*/
	$ExpireString = "Expires:" . gmdate("D, d M Y H: i: s", time () + $offset) . "GMT";
	header ($ExpireString);
  
  header("Content-Type: text/html;charset=iso-8859-1");

	$criterio="";
	if (isset($_GET['grupo']))
		{
		  $nom_grupo=$_GET['grupo'];
		}
	else
		{
		  $nom_grupo="";
		}
	if (isset($_GET['criterio']))
		{
		  $criterio=$_GET['criterio'];
		}
	else
		{
		  $criterio="";
		}
	$texto_grupo = "BUSCADOR DE PEGATINAS";
	switch($nom_grupo) 
		{
			case "TODAS":
				$texto_grupo = "BUSCADOR DE PEGATINAS";
				break;			
			case "DIB":
				$texto_grupo = "DIBUJOS VARIOS";
				break;
			case "MUS":
				$texto_grupo = "MUSICA";
				break;
			case "ANI":
				$texto_grupo = "ANIMALES";
				break;
			case "MAR":
				$texto_grupo = "MARCAS VARIAS";
				break;
			default:
				$texto_grupo = "BUSCADOR DE PEGATINAS";
				break;
		}

	/* variables */
 	$url = basename($_SERVER ["PHP_SELF"]);
	$limit_end = 12;
 	$pega_inicio = 0;
	$num_pag = 1;
	$init = ($ini-1) * $limit_end;
  	include "connect-DB-prod.php";    
	if ($nom_grupo == "" || $nom_grupo == "TODAS")
		{
			$consulta_pega_pers="Select * from grupos WHERE (grupo1 NOT LIKE '%CAMI%') AND (zona='') AND (categoria LIKE '%[Pegatina]%') ORDER by nombre DESC";
		}
	else
		{
			$consulta_pega_pers="Select * from grupos WHERE (grupo1='".$nom_grupo."') AND (zona='') AND (categoria LIKE '%[Pegatina]%') ORDER by nombre DESC";
		}
	if ($criterio != "")
		{
			$consulta_pega_pers="Select * from grupos WHERE (descripcion LIKE '%" . $criterio . "%' OR nombre LIKE '%" . $criterio . "%') AND (grupo1 NOT LIKE '%CAMI%') AND (zona='') AND (categoria LIKE '%[Pegatina]%') order by nombre DESC";
		}
      $consulta = $mysqli->query($consulta_pega_pers);
      mysqli_query("SET NAMES 'utf8'");
	  $lista_pegatinas = array();
      $total_pegatinas = mysqli_num_rows($consulta);
	  $total_paginas = ceil($total_pegatinas / $limit_end);      
			while ($row = mysqli_fetch_row($consulta))
				{
					array_push($lista_pegatinas,$row);
					// Miramos el numero de pagina
					if($_GET['pag'] == "" || $_GET['pag'] < 1)
						{	$num_pag = 1;
						}
					else
						{	$num_pag = $_GET['pag'];
						}
					$pega_inicio = ($limit_end * $num_pag) - $limit_end;
					if ($pega_inicio > $total_pegatinas)
						{ $pega_inicio = 0;
						  $num_pag = 1;
						}
					$ruta1 = "pegatinas/" . $lista_pegatinas[$pega_inicio][0] . ".png";
					$ruta2 = "pegatinas/" . $lista_pegatinas[$pega_inicio+1][0] . ".png";
					$ruta3 = "pegatinas/" . $lista_pegatinas[$pega_inicio+2][0] . ".png";
					$ruta4 = "pegatinas/" . $lista_pegatinas[$pega_inicio+3][0] . ".png";
					$ruta5 = "pegatinas/" . $lista_pegatinas[$pega_inicio+4][0] . ".png";
					$ruta6 = "pegatinas/" . $lista_pegatinas[$pega_inicio+5][0] . ".png";
					$ruta7 = "pegatinas/" . $lista_pegatinas[$pega_inicio+6][0] . ".png";
					$ruta8 = "pegatinas/" . $lista_pegatinas[$pega_inicio+7][0] . ".png";
					$ruta9 = "pegatinas/" . $lista_pegatinas[$pega_inicio+8][0] . ".png";
					$ruta10 = "pegatinas/" . $lista_pegatinas[$pega_inicio+9][0] . ".png";
					$ruta11 = "pegatinas/" . $lista_pegatinas[$pega_inicio+10][0] . ".png";
					$ruta12 = "pegatinas/" . $lista_pegatinas[$pega_inicio+11][0] . ".png";
				}
//			echo "<pre>";
//			echo $total_pegatinas . " " . $total_paginas;
//			print_r($lista_pegatinas);
//			echo $lista_pegatinas[0][0];
//			echo "</pre>";
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pegatinas Online :: Pegatinas Vinilo, murales, impresion digital</title>
    <meta name="description" content="Web de venta de Pegatinas personalizadas en vinilo">
    <meta name="author" content="Rotulance">
  	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="icon" href="favicon-po.ico" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<style>
		.estoy_oculto {display:none;}
		.estoy_visible {display:block;}
		body { font-family: 'Open Sans', sans-serif;}
		a:link {text-decoration:none;}
		@font-face {
		    font-family: "PegaFont";
		    font-style: normal;
		    font-weight: normal;
		    src: url("fonts/Pegatinas.ttf") format("truetype");
					}
	</style>
	<script>
	function mostrar_menu_movil()
			{
				document.getElementById('DIV_MenuMovil').style.display = 'block';

			}
	function ocultar_menu_movil()
			{
				document.getElementById('DIV_MenuMovil').style.display = 'none';

			}
	function cambia_categoria(grupo)
			{	url = "pegatinas.php?pag=1&grupo=" + grupo;
				if (grupo == "Elige" || grupo == "")
					{	return false;
					}
				window.open(url,"_self");
			}
	function buscar()
			{	if (busca_pega.value == "")
					{	busca_pega.style.border="1px solid #FF0000";
						return false;
					}
				urlbusca = "pegatinas.php?pag=1&criterio=" + busca_pega.value;
				window.open(urlbusca,"_self");
				return false;
			}
	</script>
  </head>
  <body background="images/fondo-pegatinas2.png" style="background-repeat: no-repeat; background-size: cover; background-attachment:fixed;">
    <div class="container-fluid" style="max-width:970px; margin-top:5px;">
	<div class="row" id="logoutMovil" name="logoutMovil" style="text-align:right; display:none; padding-right:25px; padding-top:10px;">
<?php
	$saludo="";
	if (strlen($_SESSION['firstName_est']) < 13)
		{$saludo = "Hello, " . $_SESSION['firstName_est'];
		}
	else
		{$saludo = $_SESSION['firstName_est'];
		}
?>
			<A HREF="../contact" style="text-decoration:none;"><span class="nav_title" style="color:#ccc; text-align:right; background-color:rgba(14,14,14,0.5); padding:5px; border-radius:5px;">Support</span></a><FONT COLOR="#ccc">&nbsp;&nbsp;-&nbsp;</font>
			<A HREF="logout.php" style="text-decoration:none;"><span class="nav_title" style="color:#ccc; text-align:right; background-color:rgba(14,14,14,0.5); padding:5px; border-radius:5px;">Logout</span></a>
	</div>
	<div class="row">
		<?php include "logo.php"; ?>
	</div>
	<div id="steps" class="clear steplists_wrapper steplists_wrapper_ug" style="padding-top:5px; padding-bottom:0px;">
		<ul class="stepList" style="padding-left:0px; display:inline-table; margin-bottom:0px;">
			<li class=""><strong><a href="index.php" title="Home" style="text-decoration:none;"><span class="nav_icon_img"></span><img alt="Home" src="images/Icon-home.png"><br><span class="nav_title">Home</span></a></strong></li>
			<li class=""><strong><a href="nosotros.php" title="Nosotros" style="text-decoration:none;"><span class="nav_icon_img"></span><img alt="Nosotros" src="images/Icon-nosotros.png"><br><span class="nav_title">Nosotros</span></a></strong></li>
			<li class=""><strong><a href="clientes.php" title="Clientes" style="text-decoration:none;"><span class="nav_icon_img"></span><img alt="Clientes" src="images/Icon-clientes.png"><br><span class="nav_title">Clientes</span></a></strong></li>
			<li class="done"><strong class="active"><span class="nav_icon_img"></span><img alt="Pegatinas" src="images/Icon-pega.png"><br><span class="nav_title">Pegatinas</span></strong></li>
			<li class=""><strong><a href="mochilas.php" title="Mochilas" style="text-decoration:none;"><span class="nav_icon_img"></span><img alt="Mochilas" src="images/Icon-mural.png"><br><span class="nav_title">Mochilas</span></a></strong></li>
			<li class=""><strong><a href="trabajos.php" title="Trabajos" style="text-decoration:none;"><span class="nav_icon_img"></span><img alt="Trabajos" src="images/Icon-trabajos.png"><br><span class="nav_title">Trabajos</span></a></strong></li>
			<li class=""><strong><a href="presupuestos.php" title="Presupuestos" style="text-decoration:none;"><span class="nav_icon_img"></span><img alt="Presupuestos" src="images/Icon-presu.png"><br><span class="nav_title">Presupuestos</span></a></strong></li>
			<li class=""><strong><a href="contacto.php" title="Contacto" style="text-decoration:none;"><span class="nav_icon_img"></span><img alt="Contacto" src="images/Icon-contacto.png"><br><span class="nav_title">Contacto</span></a></strong></li>
		</ul>
	</div>
	<div class="col-md-12" id="menuMovil" style="display:none; padding:10px; width:100%; padding-bottom:10px; padding-top:0px;">
			<span style="font-size:14px; padding-left:5px; padding-top:5px; text-align:left; width:100%; background-color: rgba(14,14,14,0.5); margin-right:10px; border-radius:5px; cursor:default;"><font color="#FFFFFF"><B style="font-weight:700;"><?php echo str_pad(substr($_SESSION['saludo'],0,20),20); ?></B></font></span>
			<a href="#Menu" onclick="mostrar_menu_movil()">
				<img alt ="Menu" src="images/Icon-menu.png" onclick="this.src='images/Icon-menu1.png'" onmouseover="this.src='images/Icon-menu1.png'" onmouseout="this.src='images/Icon-menu.png'" style="width:35px; height:32px;">
			</a>
	</div>
	<div id="contenido">
		<div class="col-md-12" style="margin-top:0px; margin-bottom:0px; border-radius:5px; background-color:rgba(255,255,255,0.9); max-width:100%; padding:3px; width:100%; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; padding-bottom:0px;">
			<div class="col-md-3" style="padding-top:7px; text-align:center;">
				<span style="font-size:15px; padding: 5px; width:100%; line-height:2; font-family:pegaFont; padding-left:0px; padding-bottom:0px;"><font color="#E35A06"><?php echo $texto_grupo ?></font></span><br>
				<span style="font-size:13px; padding: 5px; width:100%; line-height:1; padding-left:0px; padding-top:0px;"><B style="font-weight:700;"><font color="#000000">Últimas pegatinas Subidas</font></B></span>
			</div>
			<div class="col-md-5" style="padding-top: 15px;">
				<form>
					<input type="text" class="form-control" id="busca_pega" name="busca_pega" placeholder="Buscar..." alt="Buscar Pegatinas" title="Buscar Pegatinas" value="<?php echo $criterio; ?>">
			</div>
			<div class="col-md-1" id="DIV_Icono_Buscar" style="text-align:left; padding-right:0px; padding-left:0px;">
				<a href="#" onclick="buscar()"><img id="IMG_Buscar" src="images/Icon-search.png" style="width:20px; padding-top:24px; padding-left:0px; padding-right:0px;"></a>
			</div>
			<div class="col-md-3" style="text-align:center;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><B style="font-weight:700;"><font color="#000000">Categorias:</font></b></span><BR>
					<select id="cat_pega" name="cat_pega" class="form-control" onchange="cambia_categoria(this.value);">
					<?php
						if ($criterio == "")
							{
					?>
						<option value="TODAS">Todas las Pegatinas</option>
						<option value="DIB">Dibujos varios</option>
						<option value="MUS">Musica</option>
						<option value="ANI">Animales</option>
						<option value="MAR">Marcas Varias</option>
						<option value="MARC">Marcas Coches</option>
						<option value="MARM">Marcas Motos</option>
						<option value="INF">Infantiles</option>
						<option value="TRI">Tribales</option>
						<option value="PER">Personajes</option>
						<option value="LOG">Logotipos</option>
						<option value="FLO">Flores y Plantas</option>
						<option value="PIC">Pictogramas</option>
						<option value="ORI">Orientales</option>
						<option value="DEP">Deportes</option>
						<option value="BAN">Banderas</option>
						<option value="TEX">Textos</option>
					</select>
					<SCRIPT>
						cat_pega.value = "<?php echo $nom_grupo; ?>";
						if (cat_pega.value == "")
							{	cat_pega.value="TODAS";
							}
					</script>
					<?php
							}
						else
							{
					?>
						<option value="BUSCADOR" selected>Buscador</option>
						<option value="TODAS">Todas las Pegatinas</option>
						<option value="DIB">Dibujos varios</option>
						<option value="MUS">Musica</option>
						<option value="ANI">Animales</option>
						<option value="MAR">Marcas Varias</option>
						<option value="MARC">Marcas Coches</option>
						<option value="MARM">Marcas Motos</option>
						<option value="INF">Infantiles</option>
						<option value="TRI">Tribales</option>
						<option value="PER">Personajes</option>
						<option value="LOG">Logotipos</option>
						<option value="FLO">Flores y Plantas</option>
						<option value="PIC">Pictogramas</option>
						<option value="ORI">Orientales</option>
						<option value="DEP">Deportes</option>
						<option value="BAN">Banderas</option>
						<option value="TEX">Textos</option>
					</select>
					<?php 
							}
					?>
				</form>
			</div>
		</div>
		<form role="form" method="POST">
			<?php $num_pega=$pega_inicio; ?>
			<?php
				if ($lista_pegatinas[$pega_inicio][0] == "")
					{
			?>
		<div class="col-md-12" style="margin-top:0px; background-color:rgba(255,255,255,0.9); max-width:100%; width:100%; padding-bottom:0px; padding:5px; padding-left:3px; padding-right:3px; text-align:center; min-height:150px; padding-top:50px; height:150px;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2; text-align:center;"><B style="font-weight:700;"><font color="#E35A06">No se encontraron resultados</font></b></span>
		</div>
			<?php
					}
				else
					{
			?>
		<div class="col-md-12" style="margin-top:0px; background-color:rgba(255,255,255,0.9); max-width:100%; width:100%; padding-bottom:0px; padding:5px; padding-left:3px; padding-right:3px;">
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio][0] ?>" onmouseover="document.getElementById('pegatina1').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina1').style.backgroundColor='#3F2B0A';">
			<div id="pegatina1" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio][0] . ".png"))
						{
							echo "<img src='" . $ruta1 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
				if ($lista_pegatinas[$pega_inicio+1][0] == "")
					{
			?>
			<div id="pegatina2" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+1][0] ?>" onmouseover="document.getElementById('pegatina2').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina2').style.backgroundColor='#3F2B0A';">
			<div id="pegatina2" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+1][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+1][0] . ".png"))
						{
							echo "<img src='" . $ruta2 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			<?php
					}
				if ($lista_pegatinas[$pega_inicio+2][0] == "")
					{
			?>
			<div id="pegatina3" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			</a>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+2][0] ?>" onmouseover="document.getElementById('pegatina3').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina3').style.backgroundColor='#3F2B0A';">
			<div id="pegatina3" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+2][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+2][0] . ".png"))
						{
							echo "<img src='" . $ruta3 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
					}
				if ($lista_pegatinas[$pega_inicio+3][0] == "")
					{
			?>
			<div id="pegatina4" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+3][0] ?>" onmouseover="document.getElementById('pegatina4').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina4').style.backgroundColor='#3F2B0A';">
			<div id="pegatina4" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+3][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+3][0] . ".png"))
						{
							echo "<img src='" . $ruta4 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			<?php
					}
			?>
			</a>
		</div>
			<?php
				if ($lista_pegatinas[$pega_inicio+4][0] != "")
					{
			?>
		<div class="col-md-12" style="margin-top:0px; background-color:rgba(255,255,255,0.9); max-width:100%; width:100%; padding-bottom:0px; padding:5px; padding-left:3px; padding-right:3px;">
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+4][0] ?>" onmouseover="document.getElementById('pegatina5').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina5').style.backgroundColor='#3F2B0A';">
			<div id="pegatina5" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+4][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+4][0] . ".png"))
						{
							echo "<img src='" . $ruta5 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
				if ($lista_pegatinas[$pega_inicio+5][0] == "")
					{
			?>
			<div id="pegatina6" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; margin-bottom:5px; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+5][0] ?>" onmouseover="document.getElementById('pegatina6').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina6').style.backgroundColor='#3F2B0A';">
			<div id="pegatina6" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+5][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+5][0] . ".png"))
						{
							echo "<img src='" . $ruta6 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
					}
				if ($lista_pegatinas[$pega_inicio+6][0] == "")
					{
			?>
			<div id="pegatina7" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; margin-bottom:5px; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+6][0] ?>" onmouseover="document.getElementById('pegatina7').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina7').style.backgroundColor='#3F2B0A';">
			<div id="pegatina7" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+6][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+6][0] . ".png"))
						{
							echo "<img src='" . $ruta7 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
					}
				if ($lista_pegatinas[$pega_inicio+7][0] == "")
					{
			?>
			<div id="pegatina8" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; margin-bottom:5px; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+7][0] ?>" onmouseover="document.getElementById('pegatina8').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina8').style.backgroundColor='#3F2B0A';">
			<div id="pegatina8" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; cursor:default; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+7][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+7][0] . ".png"))
						{
							echo "<img src='" . $ruta8 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php 
					}
			?>
		</div>
			<?php
				}
				if ($lista_pegatinas[$pega_inicio+8][0] != "")
					{
			?>
		<div class="col-md-12" style="margin-top:0px; background-color:rgba(255,255,255,0.9); max-width:100%; width:100%; padding:5px; padding-left:3px; padding-right:3px; padding-bottom:9px;">
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+8][0] ?>" onmouseover="document.getElementById('pegatina9').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina9').style.backgroundColor='#3F2B0A';">
			<div id="pegatina9" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+8][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+8][0] . ".png"))
						{
							echo "<img src='" . $ruta9 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
				if ($lista_pegatinas[$pega_inicio+9][0] == "")
					{
			?>
			<div id="pegatina10" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; margin-bottom:5px; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+9][0] ?>" onmouseover="document.getElementById('pegatina10').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina10').style.backgroundColor='#3F2B0A';">
			<div id="pegatina10" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+9][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+9][0] . ".png"))
						{
							echo "<img src='" . $ruta10 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
					}
				if ($lista_pegatinas[$pega_inicio+10][0] == "")
					{
			?>
			<div id="pegatina11" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; margin-bottom:5px; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+10][0] ?>" onmouseover="document.getElementById('pegatina11').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina11').style.backgroundColor='#3F2B0A';">
			<div id="pegatina11" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+10][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+10][0] . ".png"))
						{
							echo "<img src='" . $ruta11 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php
					}
				if ($lista_pegatinas[$pega_inicio+11][0] == "")
					{
			?>
			<div id="pegatina12" class="col-md-3" style="border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; margin-bottom:5px; display: none">
			</div>
			<?php
					}
				else
					{
			?>
			<a href="productos/<?php echo $lista_pegatinas[$pega_inicio+11][0] ?>" onmouseover="document.getElementById('pegatina12').style.backgroundColor='#E35A06';" onmouseout="document.getElementById('pegatina12').style.backgroundColor='#3F2B0A';">
			<div id="pegatina12" class="col-md-3" style="background-color:#3F2B0A; border-radius:5px; padding:5px; color:#fff; border-width:2px; text-align:center; border-right: rgba(255,255,255,0.9) 2px solid; border-left: rgba(255,255,255,0.9) 2px solid;">
				<span style="font-size:14px; padding: 5px; width:100%; line-height:2;"><font color="#FFFFFF"><?php echo $lista_pegatinas[$num_pega+11][0]; ?></font></span>
				<?php
					 if (file_exists("pegatinas/" . $lista_pegatinas[$pega_inicio+11][0] . ".png"))
						{
							echo "<img src='" . $ruta12 . "' width='100%' style='background-color: #CCC'>";
						}
					else
						{	echo "<img src='pegatinas/nodisponible.png' width='100%' style='background-color: #CCC'>";
						}
				?>
			</div>
			</a>
			<?php 
					}
			?>
		</div>
			<?php 
				}
			?>
		<div class="col-md-12" style="margin-top:0px; margin-bottom:0px; border-radius:5px; background-color:rgba(37,26,13,0.56); max-width:100%; padding:0px; width:100%; margin-bottom:10px; border-top-left-radius: 0px; border-top-right-radius: 0px; text-align:center;">
			<?php 
				if ($num_pag > $total_paginas)
					{
						$num_pag = $total_paginas;
					}
				if ($total_paginas > 1)
					{	echo "<ul class='pagination' style='margin:10px 0px; display:inline-block;'>";
						if ($num_pag != 1)
							{ echo "<li class='first' style='display:inline-block;'><a href='pegatinas.php?pag=1&grupo=" . $nom_grupo . "&criterio=" . $criterio . "' title='1'><<</a></li>";
							  echo "<li class='previous' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($num_pag - 1) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "' title='" . ($num_pag - 1) . "'><</a></li>";
							}
						else
							{ echo "<li class='first disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'><<</a></li>";
							  echo "<li class='previous disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'><</a></li>";
							}
						if (($num_pag - 2) > 2)
							{ if (($num_pag + 2) > $total_paginas)
								{
									$inicio_paginacion = ($total_paginas - 4);
								}
							  else
								{
									$inicio_paginacion = ($num_pag - 2);
								}
							}
						else
							{$inicio_paginacion = 1;
							}
						if ($total_paginas >= 1)
						{
						if ($num_pag == $inicio_paginacion)
							{	echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . $inicio_paginacion . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'><font color='#E35A06'>" . $inicio_paginacion . "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . $inicio_paginacion . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'>" . $inicio_paginacion . "</a></li>";
							}
						}
						if ($total_paginas >= 2)
						{
						if ($num_pag == ($inicio_paginacion + 1))
							{	echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 1) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'><font color='#E35A06'>" . ($inicio_paginacion + 1) . "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 1) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'>" . ($inicio_paginacion + 1) . "</a></li>";
							}
						}
						if ($total_paginas >= 3)
						{
						if ($num_pag == ($inicio_paginacion + 2))
							{	echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 2) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'><font color='#E35A06'>" . ($inicio_paginacion + 2) . "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 2) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'>" . ($inicio_paginacion + 2) . "</a></li>";
							}
						}
						if ($total_paginas >= 4)
						{
						if ($num_pag == ($inicio_paginacion + 3))
							{	echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 3) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'><font color='#E35A06'>" . ($inicio_paginacion + 3). "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 3) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'>" . ($inicio_paginacion + 3). "</a></li>";
							}
						}
						if ($total_paginas >= 5)
						{
						if ($num_pag == ($inicio_paginacion + 4))
							{	echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 4) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'><font color='#E35A06'>" . ($inicio_paginacion + 4). "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($inicio_paginacion + 4) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio . "'>" . ($inicio_paginacion + 4). "</a></li>";
							}
						}
						if ($num_pag == $total_paginas )
							{
								echo "<li class='next disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'>></a></li>";
								echo "<li class='last disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'>>></a></li>";
							}
						else
							{
								echo "<li class='next' style='display:inline-block;'><a href='pegatinas.php?pag=" . ($num_pag + 1) . "&grupo=" . $nom_grupo . "&criterio=" . $criterio ."' title='" . ($num_pag + 1) . "'>></a></li>";
								echo "<li class='last' style='display:inline-block;'><a href='pegatinas.php?pag=" . $total_paginas . "&grupo=" . $nom_grupo . "&criterio=" . $criterio ."' title='" . $total_paginas . "'>>></a></li>";
							}
					    echo "</ul>";
					}
				else
					{	echo "<ul class='pagination' style='margin:10px 0px; display:inline-block;'>";
						echo "<li class='first disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'><<</a></li>";
	 				    echo "<li class='previous disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'><</a></li>";
						echo "<li class='next' style='display:inline-block;'><a href='#'><font color='#E35A06'>1</font></a></li>";
						echo "<li class='next disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'>></a></li>";
						echo "<li class='last disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'>>></a></li>";		
						echo "</ul>";
					}
			 ?>
			
		</div>
			<?php
					}
			?>
		<div id="footer_pega" class="col-md-12" style="margin-top:0px; margin-bottom:0px; border-radius:5px; max-width:100%; padding:5px; width:100%; margin-bottom:10px; border-top-left-radius: 0px; border-top-right-radius: 0px; text-align:center;">
			<?php include "footer.php"; ?>
		</div>
		</form>
</div>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
		function ocultar_error_miss()
			{
				document.getElementById('DIV_error_miss').style.display = 'none';

			}
		function mostrar_error_miss()
			{	
				document.getElementById('DIV_error_miss').style.display = "block";
			}
	</script>
	<script>
		// Funcion para cargar un contenido en un div mostrando un reloj de arena

	    function cargarContenidoReloj(pagina)
    	{
	        // cargamos el icono en el div donde ira el contenido
    	    $("#contenido").html("<CENTER><img src='images/clock.gif' class='clock' border='0' style='text-align:center; padding-top:20px;'/></CENTER>");
        	// cargamos la pagina pagina3.php en el div contenido
	        $("#contenido").load(pagina);
    	}
	</script>
	<script>
	$(document).ready(function(){
		$("#busca_pega").keyup(function(event){
	    if(event.keyCode == 13){
    	    if (busca_pega.value != "")
				{	buscar();
				}
	    						}
		});
	});
	</script>

<div id="DIV_error_miss" style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 12px; font-weight: normal;  background-color:rgba(16,31,68,0.9); color: #000000; display:none;" onclick="ocultar_error_miss()">
	<a href="#close" onclick="ocultar_error_miss()">
	<div style="position:absolute; top:30%;left:50%; width:300px; border-radius:5px; background-color:rgba(255,255,255,0.9); padding:15px; z-index:6; float:left;line-height:22px; margin:-2% 0px 0px -150px;">
		<center>
			<span style="font-size:14px;"><font color="#F59336">Information missing</font></span><BR><BR>
			<span style="color:#FFFFFF;font-size:15px; background-color: #101f44; border-radius:5px; padding:10px; width:100%; text-decoration:none; display:block; max-width:150px;"><FONT COLOR="#FFFFFF">Accept</FONT></span>
		</center>
	</div>
	</a>
</div>

<?php 
	$_GET['item_menu'] = "pegatinas";
	include "menu-movil.php"; 
	include "cookies.php";
?>
  </body>
</html>