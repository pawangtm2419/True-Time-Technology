<?php
include('../config/connection.php');
  $productId =$_POST['orderId'];
  if (isset($_POST["orderId"]))
   {
   $delOrder = mysql_query("delete from cart WHERE  id='$productId'");
   }
?>