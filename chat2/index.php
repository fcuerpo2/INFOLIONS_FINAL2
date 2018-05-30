<!DOCTYPE html>
<html lang="es">
 <head>
  <script src="jquery.min.js"></script>
  <script src="chat.js"></script>
  <link href="chat.css" rel="stylesheet"/>
 </head>
 <body id="MiBody">
<!--	
	<div class="tabs">
		<div class="tab" data-dip="chat">CHAT Infolions</div><div class="tab" data-dip="users">USUARIOS</div>
	</div>
-->	
	<div id="EspacioChat">
   		<div class="chat">
     		<?php 
	 			include("config.php");
	 			include("login.php");
     			if(isset($_SESSION['user'])){
      				include("chatbox.php");
     			}else{
      				$display_case=true;
      				include("login.php");
     			}
     		?>
   		</div>
	</div>
	<div>
		<form id="msg_form">
 	 		<input name="msg" type="text" placeholder="Mensaje..." />
 		</form>
<
	</div>
<!--	
    <div class="users" style='display:none'>
    	 <?php include("users.php");?>
    </div>
-->    
</body>
</html>