<?php
ob_start();
@session_start();
include('../config/connection.php');
if(empty($_SESSION['mzs']))
{
 $loginStatus =$_SESSION['custEmail'];
 if($loginStatus)
 {
  $usremail=$_SESSION['custEmail'];
 }
 else
 {
  $usremail="";
 }
  $productid =$_POST['pid1'];
  $productname =$_POST['pname1'];
  $productimage =$_POST['pimg1'];
  $quantity =$_POST['qnti1'];
  $regprice =$_POST['pareg1'];
  $saleprice =$_POST['pasale1'];
  $total =  $saleprice * $quantity;
  $userinfo =  $_SESSION['mzs'] =(rand(1000,10000));
  date_default_timezone_set("Asia/Kolkata");
  $added_date = date("Y-m-d H:i:s"); //Returns IST
   
 //Add to cart
 if (isset($_POST["add1"]))
   {
   $matchProId = mysql_query("SELECT * FROM cart WHERE userinfo='$userinfo' AND productid='$productid'");
   $resProId = mysql_fetch_array($matchProId);
   $ProIds = $resProId['productid'];
   $IseInfos = $resProId['userinfo'];
   $preQuanity = $resProId['quantity'];
   $preTotal = $resProId['total'];
    if(($ProIds != $productid) && ($IseInfos != $userInfo) || ($ProIds == ""))
	{
     $addCart =mysql_query("INSERT INTO cart(usremail, userinfo, productid, productname, productimage, quantity, regprice, saleprice, total, added_date) values ('$usremail', '$userinfo', '$productid', '$productname', '$productimage', '$quantity', '$regprice', '$saleprice', $total, '$added_date')");
	   if($addCart)
	   {
	    $_SESSION['$userinfo']=$userinfo;
		//echo "inserted";
	   } // end insert status
	} // end if
	else
	{
    $newQuantity = $preQuanity + $quantity;
	$newTotal = $preTotal + $total;
	$updateOrder = mysql_query("update cart SET quantity='$newQuantity', total='$newTotal' WHERE  productid='$productid'");
	
	   if($updateOrder)
	   {
	    $_SESSION['$userinfo']=$userinfo;
		//echo "Update";
	   } // end update status
	   
	} // end else
	
   }//else{ echo "No Data";} // edn add to cart  
}
else
{
$loginStatus =$_SESSION['custEmail'];
 if($loginStatus)
 {
  $usremail=$_SESSION['custEmail'];
 }
 else
 {
  $usremail="";
 }
  $productid =$_POST['pid1'];
  $productname =$_POST['pname1'];
  $productimage =$_POST['pimg1'];
  $quantity =$_POST['qnti1'];
  $regprice =$_POST['pareg1'];
  $saleprice =$_POST['pasale1'];
  $total =  $saleprice * $quantity;
  $userinfo =  $_SESSION['mzs'];
  date_default_timezone_set("Asia/Kolkata");
  $added_date = date("Y-m-d H:i:s"); //Returns IST
   
 //Add to cart
 if (isset($_POST["add1"]))
   {
   $matchProId = mysql_query("SELECT * FROM cart WHERE userinfo='$userinfo' AND productid='$productid'");
   $resProId = mysql_fetch_array($matchProId);
   $ProIds = $resProId['productid'];
   $IseInfos = $resProId['userinfo'];
   $preQuanity = $resProId['quantity'];
   $preTotal = $resProId['total'];
    if(($ProIds != $productid) && ($IseInfos != $userInfo) || ($ProIds == ""))
	{
     $addCart =mysql_query("INSERT INTO cart(usremail, userinfo, productid, productname, productimage, quantity, regprice, saleprice, total, added_date) values ('$usremail', '$userinfo', '$productid', '$productname', '$productimage', '$quantity', '$regprice', '$saleprice', $total, '$added_date')");
	   if($addCart)
	   {
	    $_SESSION['$userinfo']=$userinfo;
		//echo "inserted";
	   } // end insert status
	} // end if
	else
	{
    $newQuantity = $preQuanity + $quantity;
	$newTotal = $preTotal + $total;
	$updateOrder = mysql_query("update cart SET quantity='$newQuantity', total='$newTotal' WHERE  productid='$productid'");
	
	   if($updateOrder)
	   {
	    $_SESSION['$userinfo']=$userinfo;
		//echo "Update";
	   } // end update status
	   
	} // end else
	
   }//else{ echo "No Data";} // edn add to cart
}
?>
