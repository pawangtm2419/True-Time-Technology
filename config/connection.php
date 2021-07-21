<?php
@session_start();
ob_start();
$lnk=mysql_connect("localhost","truetimeuse","YGVK9c&ke");
mysql_select_db("truetimedb",$lnk);
$url ="";
?>