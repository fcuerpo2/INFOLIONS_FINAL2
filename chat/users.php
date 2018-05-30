<?php 
include("../chat/config.php");
$sql=$dbh->prepare("SELECT name FROM chatters");
$sql->execute();
		$aktip = "";
while($r=$sql->fetch()){
     if(isset($_SESSION['user'])){
	if($_SESSION['user'] == $r['name']){
		$aktip = "<a href='logout.php' class='keluar'>Salir</a>";
	}
	 }
 echo "<div class='user'>{$r['name']} $aktip</div>";
}
?>
