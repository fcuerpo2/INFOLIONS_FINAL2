<?php
    if (session_id() === "") { session_start(); }
?>
<div class="col-md-12 sombraNegra" style="margin-top:0px; margin-bottom:0px; border-radius:5px; max-width:100%; padding:0px; width:100%; margin-bottom:10px; text-align:center;">
			<?php 
				if ($_SESSION['NumPag'] > $_SESSION['total_paginas'])
					{
						$_SESSION['NumPag'] = $_SESSION['total_paginas'];
					}
				if ($_SESSION['total_paginas'] > 1)
					{	echo "<ul class='pagination' style='margin:10px 0px; display:inline-block;'>";
						if ($_SESSION['NumPag'] != 1)
							{ echo "<li class='first' style='display:inline-block;'><a href='principal.php?numpag=1#tags' title='1'><<</a></li>";
							  echo "<li class='previous' style='display:inline-block;'><a href='principal.php?numpag=" . ($_SESSION['NumPag'] - 1) . "#tags' title='" . ($_SESSION['NumPag'] - 1) . "'><</a></li>";
							}
						else
							{ echo "<li class='first disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'><<</a></li>";
							  echo "<li class='previous disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'><</a></li>";
							}
						if (($_SESSION['NumPag'] - 2) > 2)
							{ if (($_SESSION['NumPag'] + 2) > $_SESSION['total_paginas'])
								{
									$inicio_paginacion = ($_SESSION['total_paginas'] - 4);
								}
							  else
								{
									$inicio_paginacion = ($_SESSION['NumPag'] - 2);
								}
							}
						else
							{
                                                            $inicio_paginacion = 1;
							}
						if ($_SESSION['total_paginas'] >= 1)
						{
						if ($_SESSION['NumPag'] == $inicio_paginacion)
							{	echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . $inicio_paginacion . "#tags'><font color='#E35A06'>" . $inicio_paginacion . "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . $inicio_paginacion . "#tags'>" . $inicio_paginacion . "</a></li>";
							}
						}
						if ($_SESSION['total_paginas'] >= 2)
						{
						if ($_SESSION['NumPag'] == ($inicio_paginacion + 1))
							{	echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($inicio_paginacion + 1) . "#tags'><font color='#E35A06'>" . ($inicio_paginacion + 1) . "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($inicio_paginacion + 1) . "#tags'>" . ($inicio_paginacion + 1) . "</a></li>";
							}
						}
						if ($_SESSION['total_paginas'] >= 3)
						{
						if ($_SESSION['NumPag'] == ($inicio_paginacion + 2))
							{	echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($inicio_paginacion + 2) . "#tags'><font color='#E35A06'>" . ($inicio_paginacion + 2) . "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($inicio_paginacion + 2) . "#tags'>" . ($inicio_paginacion + 2) . "</a></li>";
							}
						}
						if ($_SESSION['total_paginas'] >= 4)
						{
						if ($_SESSION['NumPag'] == ($inicio_paginacion + 3))
							{	echo "<li class='next' style='display:inline-block;'><a href='princiapal.php?numpag=" . ($inicio_paginacion + 3) . "#tags'><font color='#E35A06'>" . ($inicio_paginacion + 3). "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($inicio_paginacion + 3) . "#tags'>" . ($inicio_paginacion + 3). "</a></li>";
							}
						}
						if ($_SESSION['total_paginas'] >= 5)
						{
						if ($_SESSION['NumPag'] == ($inicio_paginacion + 4))
							{	echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($inicio_paginacion + 4) . "#tags'><font color='#E35A06'>" . ($inicio_paginacion + 4). "</font></a></li>";
							}
						else
							{
			  					echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($inicio_paginacion + 4) . "#tags'>" . ($inicio_paginacion + 4). "</a></li>";
							}
						}
						if ($_SESSION['NumPag'] == $_SESSION['total_paginas'] )
							{
								echo "<li class='next disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'>></a></li>";
								echo "<li class='last disabled' style='display:inline-block;'><a href='#' onclick='return false;' style='cursor:default;'>>></a></li>";
							}
						else
							{
								echo "<li class='next' style='display:inline-block;'><a href='principal.php?numpag=" . ($_SESSION['NumPag'] + 1) . "#tags' title='" . ($_SESSION['NumPag'] + 1) . "'>></a></li>";
								echo "<li class='last' style='display:inline-block;'><a href='principal.php?numpag=" . $_SESSION['total_paginas'] . "#tags' title='" . $_SESSION['total_paginas'] . "'>>></a></li>";
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