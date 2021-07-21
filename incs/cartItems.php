<?php
include('../config/connection.php');
$userinfo = $_SESSION['mzs'];
$counts = mysql_query("SELECT count(*) as count FROM cart where userinfo='$userinfo'");
$count =mysql_fetch_row($counts);
?>
<?php if($count>0){ ?>
 <a href="#" class="pull-right register itnom" onclick="cartdetaiils();"><i class="fa fa-shopping-cart"></i> Items ( <?php echo $count[0];?> )</a> 
 <?php }else{ echo "0"; } ?> 