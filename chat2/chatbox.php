<?php 
include("../chat2/config.php");
if(isset($_SESSION['user'])){
?>
 <div class='msgs' style='overflow: hidden;'>
  <?php include("../chat2/msgs.php");?>
 </div>
<?php 
}
?>