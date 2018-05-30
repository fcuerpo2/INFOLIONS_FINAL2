<?php 
include("../chat/config.php");
if(isset($_SESSION['user'])){
?>
 <div class='msgs' style='overflow: hidden;'>
  <?php include("../chat/msgs.php");?>
 </div>
<?php 
}
?>