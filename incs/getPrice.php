<?php
include('../config/connection.php');
    $userinfo = $_SESSION['mzs'];
	$productid = $_POST['priceId'];
	$quantity = $_POST['nquity1'];
    $matchProId = mysql_query("SELECT * FROM cart WHERE userinfo='$userinfo' AND productid='$productid'");
    $resProId = mysql_fetch_array($matchProId);
    $preQuanity = $resProId['quantity'];
    $presale = $resProId['saleprice'];
	
	$newQuantity = $quantity ;
	$newTotal = $newQuantity * $presale;
	$updateOrder = mysql_query("update cart SET quantity='$newQuantity', total='$newTotal' WHERE  productid='$productid'");
?> 