<?php
include("config/connection.php");
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$orderid = $_SESSION['orderid'];
$ordrid = $_POST['ordrid'];
$salt="Jgjrvadvyr";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	       
           echo "Invalid Transaction. Please try again";
		   }
	   else {
           	   
          
          $insert = mysql_query("update customerorder set paymentstatus = 'Yes' where orderid = '$orderid'"); 
		  $inserts = mysql_query("update cart set paymentstatus = 'Yes' where usremail = '$email'"); 
		   }         
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Urban Glamour</title>
</head>

<body>
<div style="margin:10% auto; text-align:center;">
<span><img src="images/logo.png"></span>
<h2>Thank You. Your order is successfull</h2>
<h3>......Your Order ID for this transaction is <?php echo $_SESSION['orderid']; ?>.....</h3><br/>
<br/><br/>
<span>Click Here For <a href="index.php">Home</a></span>

</div>

</body>
</html>