<?php
include("config/connection.php");
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$city=$_POST['city'];
$country=$_POST['country'];
$state=$_POST['state'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];
$customerid = $_SESSION['customerid'];
//-------------------/
$update = mysql_query("update register set fname = '$fname', lname = '$lname', email = '$email', mobile = '$mobile', address = '$address', country = '$country', state = '$state', city = '$city', pincode = '$pincode' where id='$customerid'");
}
$customerid = $_SESSION['customerid'];
$selectdetail = mysql_query("select * from register where id = '$customerid'");
$selectdetail1 = mysql_fetch_array($selectdetail);
$billaddress = $selectdetail1['address'].','.$selectdetail1['city'].','.$selectdetail1['state'].','.$selectdetail1['country'].','.$selectdetail1['pincode'];
$billfname = $selectdetail1['fname'];
$billlname = $selectdetail1['lname'];
$billemail = $selectdetail1['email'];
$billmobile = $selectdetail1['mobile'];
$productord = $_SESSION['productor'];
$_SESSION['orderid']= YOUSRA0000.$random5 = rand(10000,99999);
$orderid = $_SESSION['orderid'];
$totalpricecart = $_SESSION['tott'];
$pdescription = $_SESSION['reportout'];
$added_date = date("Y-m-d H:i:s");
$modified_date = date("Y-m-d H:i:s");
$insertcustomerorder = mysql_query("insert into customerorder(cusid,orderid,fname,lname,email,mobile,pdescription,totalprice,productnamee,address,paymentstatus,added_date,modified_date) values('$customerid','$orderid','$billfname','$billlname','$billemail','$billmobile','$pdescription','$totalpricecart','$productord','$billaddress','No','$added_date','$modified_date')");
$to = $billemail;

$subject = 'Invoice';

$headers = "From: " . strip_tags($billemail) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";

$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


$message = '<div style="width:100%;min-height:100%;margin:10px auto;padding:0;background-color:#ffffff;font-family:Arial,Tahoma,Verdana,sans-serif;font-weight:299px;font-size:13px;text-align:center" bgcolor="#ffffff">
<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody><tr>
                <td width="10" bgcolor="#00436d" style="width:10px;background:linear-gradient(to bottom,#005587 0%,#00436d 89%);background-color:#00436d">&nbsp;</td>
                <td valign="middle" align="left" height="50" bgcolor="#00436d" style="background:linear-gradient(to bottom,#005587 0%,#00436d 89%);background-color:#00436d;padding:0;margin:0">
                        <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="http://yusrafashion.com/" target="_blank">
                            <img border="0" height="30" src="http://yusrafashion.com/images/logo.png" alt="yusrafashion.com" style="border:none" class="CToWUd">
                        </a>
                </td>
                <td valign="middle" align="right" height="50" bgcolor="#00436d" style="background:linear-gradient(to bottom,#005587 0%,#00436d 89%);background-color:#00436d;padding:0;margin:0">
                        
                </td>
                <td width="10" bgcolor="#00436d" style="width:10px;background:linear-gradient(to bottom,#005587 0%,#00436d 89%);background-color:#00436d">&nbsp;</td>
            </tr>
        </tbody></table>
        <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody><tr>
                <td valign="top" align="center" width="300">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#005387">
                            <tbody><tr>
                                <td valign="middle" align="right" width="20%" height="35" style="border-bottom:solid 1px #003a5e;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                        <img border="0" src="http://yusrafashion.com/images/track.jpg" alt="" class="CToWUd">
                                    </a>
                                </td>

                                <td valign="middle" width="30%" align="left" height="35" style="border-bottom:solid 1px #003a5e;border-right:solid 1px #1a6592;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                        <span style="font-size:11px;color:#99bacf;line-height:14px">TRACK</span><br> <span style="font-size:11px;color:#99bacf;line-height:14px">ORDER</span>
                                    </a>
                                </td>

                                <td valign="middle" align="right" width="20%" height="35" style="border-bottom:solid 1px #003a5e;border-left:solid 1px #003a5e;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                        <img border="0" src="http://yusrafashion.com/images/cancel.jpg" alt="" class="CToWUd">
                                    </a>
                                </td>

                                <td valign="middle" align="left" width="30%" height="35" style="border-bottom:solid 1px #003a5e;border-right:solid 1px #1a6592;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                        <span style="font-size:11px;color:#99bacf;line-height:14px">CANCEL</span><br> <span style="font-size:11px;color:#99bacf;line-height:14px">ORDER</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody></table>
                </td>
                <td valign="top" align="center" width="300">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#005387">
                            <tbody><tr>
                                <td valign="middle" align="right" width="20%" height="35" style="border-bottom:solid 1px #003a5e;border-left:solid 1px #003a5e;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                        <img border="0" src="http://yusrafashion.com/images/freereturn.jpg" alt="" class="CToWUd">
                                    </a>
                                </td>

                                <td valign="middle" align="left" width="30%" height="35" style="border-bottom:solid 1px #003a5e;border-right:solid 1px #1a6592;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                        <span style="font-size:11px;color:#99bacf;white-space:nowrap;line-height:14px">FREE &amp; EASY</span><br><span style="font-size:11px;color:#99bacf;line-height:14px">RETURNS</span>
                                    </a>
                                </td>

                                <td valign="middle" align="right" width="20%" height="35" style="border-bottom:solid 1px #003a5e;border-left:solid 1px #003a5e;padding:0;color:#ffffff">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                         <img border="0" src="http://yusrafashion.com/images/support.jpg" alt="" class="CToWUd">
                                    </a>
                                </td>

                                <td valign="middle" align="left" width="30%" height="35" style="border-bottom:solid 1px #003a5e;padding:0 0 0 5px">
                                    <a style="text-decoration:none;outline:none;display:block" href="http://yusrafashion.com/" target="_blank">
                                        <span style="font-size:11px;color:#99bacf;line-height:14px">CUSTOMER</span><br> <span style="font-size:11px;color:#99bacf;line-height:14px">SUPPORT</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody></table>
                </td>
            </tr>
        </tbody></table>
        <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody><tr>
                <td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9">
                        <p style="padding:0;margin:0;font-size:16px;font-weight:bold;font-size:13px"> Hi ' . $billfname . ',  </p><br>
                        <p style="padding:0;margin:0;color:#565656;font-size:13px"> Thank you for your order!</p><br>
                        <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">
                            We will send you another email once the items in your order have been shipped.
                            Meanwhile, you can check the status of your order on 
                            <a style="text-decoration:none" alt="yusrafashion.com" href="http://yusrafashion.com/" target="_blank"><span style="color:#666;font-size:13px"><span class="il">Malasart</span>.com</span></a>
                        </p><br>
                        <p style="text-align:center;padding:0;margin:0" align="center">
                            <a style="width:200px;margin:0px auto;background:linear-gradient(to bottom,#007fb8 1%,#6ebad5 3%,#007fb8 7%,#007fb8 100%);background-color:#007fb8;text-align:center;border:#004b91 solid 1px;padding:8px 0;text-decoration:none;border-radius:2px;display:block;color:#fff;font-size:13px" align="center" href="http://yusrafashion.com/" target="_blank">
                                <span style="color:#ffffff;font-size:13px;background-color:#007fb8">TRACK ORDER</span>
                            </a>
                        </p>
                </td>
            </tr>
        </tbody></table>
        <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody>
             <tr>
                <td align="left" valign="top" style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:20px 20px 0 20px" bgcolor="">
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0">
                                        <tbody><tr>
                                            <td colspan="4" width="100%" align="left" valign="top">
                                                    <p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">
                                                         Please find below, the summary of your order <a style="text-decoration:underline" href="http://yusrafashion.com/" target="_blank"><span style="color:#565656;font-size:13px">'.$orderid.'</span></a>
                                                    </p><br>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" align="left" valign="top">
                                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                                   <tbody><tr>
                                                       <td valign="middle" align="left" rowspan="2" style="white-space:nowrap;padding-right:5px;font-size:13px">
                                                             
                                                                                                                            
                                                                                                                       </td>
                                                       <td valign="middle" align="left" style="border-bottom:solid 2px #565656;width:90%">&nbsp;</td>
                                                   </tr>
                                                   <tr>
                                                       <td valign="middle" align="left">&nbsp;</td>
                                                   </tr>
                                                </tbody>
                                                </table>
                                            </td>
                                        </tr>
                        </tbody></table>
                </td>
            </tr>
            </tbody>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
                <tbody>
				<tr>
            <td><strong><center>Product</center></strong></td>
            <td><strong><center>Product Description</center></strong></td>
            <td><strong><center>Quantity</center></strong></td>
            <td><strong><center>Price</center></strong></td>
          </tr>
				'.$_SESSION['outpt'].'
            </tbody></table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
			<tbody><tr>
			<td valign="top" align="center" style="background-color:#ffffff;display:block;margin:0 auto;clear:both;padding:5px 20px 0 20px" bgcolor="#fff">
			<table border="0" cellspacing="0" cellpadding="0" width="100%" style="margin:0">
			<tbody><tr>
			<td colspan="4" align="center" valign="top" style="border-bottom:#ccc dashed 1px;padding:0 0 17px 0">
			<!--<p style="padding:4px 5px;background-color:#fffed5;border:1px solid #f9e2b2;color:#565656;margin:10px 0 0 0;text-align:center;font-size:12px">
			Will be delivered by Saturday, 2nd Aug 14
			</p>-->
			</td>
			</tr></tbody>
			</table>
			</td>
			</tr></tbody>
			</table>
			<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody><tr>
                <td valign="top" align="right" bgcolor="" style="clear:both;display:block;margin:0 auto;padding:10px 20px 0 20px;background-color:#ffffff">
                    <table cellspacing="0" cellpadding="0" width="100%">
                        <tbody><tr>
                            <td valign="top" align="right" style="border-top:2px solid #565656;border-bottom:1px solid #e6e6e6;padding:15px 0;margin:0;background-color:#f9f9f9">
                                                                <p style="padding:0;margin:0;text-align:right;color:#565656;line-height:22px;white-space:nowrap;font-size:21px">
                                    Total <span style="font-size:21px">Rs. '.$totalpricecart.'</span>
                                </p>
                          </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody></table>
<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody>
            <tr>
                <td valign="top" align="left" style="background-color:#ffffff;color:#565656;display:block;font-weight:300;margin:0;padding:0;clear:both" bgcolor="#ffffff">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td valign="top" align="left" style="padding:20px 20px 0 20px;margin:0">
                                <p style="margin:0;padding:0;color:#565656;font-size:13px">DELIVERY ADDRESS</p>
                                <p style="padding:0;margin:15px 0 10px 0;font-size:18px;color:#333333">
                                    '.$billfname.'  &nbsp;'.$billlname.'&nbsp;&nbsp;&nbsp; '.$billmobile.'
                                </p>
                                <p style="line-height:18px;padding:0;margin:0;color:#565656;font-size:13px">
                                    '.$billaddress.'
                                </p>
                            </td>
                        </tr>
                    </tbody></table>            
                </td>
            </tr>
            </tbody>
        </table>
<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody>
            <tr>
                <td valign="top" align="center" style="background-color:#ffffff;color:#565656;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both" bgcolor="#ffffff">
                    <table border="0" cellspacing="0" cellpadding="0" width="100%">
                            <tbody><tr>
                                   <td valign="middle" align="left" style="border-bottom:dashed 1px #e6e6e6;width:47%">&nbsp;</td>
                                   <td valign="middle" align="center" rowspan="2" style="width:30px">
                                       <img border="0" src="http://yusrafashion.com/images/greenimg.png" class="CToWUd">
                                   </td>
                                   <td valign="middle" align="left" style="border-bottom:dashed 1px #e6e6e6;width:47%">&nbsp;</td>
                            </tr>
                            <tr>
                                   <td valign="middle" align="left">&nbsp;</td>
                                   <td valign="middle" align="left">&nbsp;</td>
                            </tr>
                         </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="top" align="left" style="background-color:#ffffff;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;padding:0 20px 20px 20px" bgcolor="#ffffff">
                        <p style="margin:0px;padding:0px;line-height:20px;font-size:13px;color:#565656">As a part of go-green initiative we will not be sending the <span class="il">invoice</span> to you with the shipment. You will receive a soft copy of a <span class="il">invoice</span> as a part of the delivery confirmation email within 24 hours of the delivery completion.</p>
                </td>
            </tr>
            </tbody>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody>
             <tr>
                <td valign="top" align="center" style="border-top:#e6e6e6 solid 1px;border-bottom:#e6e6e6 solid 1px;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:10px 20px 15px 20px" bgcolor="">
                    <img border="0" src="http://yusrafashion.com/images/orderplace.jpg" alt="Order Placed - Processing - In-transit - Delivery" width="100%" style="min-height:auto;background-color:#f6f2e9;border:none;color:#565656;font-size:9px;width:100%" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 531px; top: 1106px;"><div id=":3ty" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" title="Download" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V"><div class="aSK J-J5-Ji aYr"></div></div></div>
                </td>
             </tr>
            </tbody>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
            <tbody><tr>
                <td valign="top" align="center" width="300" style="background-color:#f9f9f9">
                    <br>
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td valign="top" align="left" style="padding:0 10px 15px 20px;margin:0;border-right:dashed 1px #b3b3b3">
                                <p style="padding:0;margin:0 0 7px 0;font-size:16px;color:#565656">What Next?</p>
                                <p style="padding:0;margin:0;font-size:11px;color:#565656;line-height:20px">
                                    You will receive an email with your courier Tracking ID &amp; a link to track your order.
                                </p>
                            </td>
                       </tr>
                    </tbody></table>
                </td>
                <td valign="top" align="center" width="300" style="background-color:#f9f9f9">
                    <br>
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody><tr>
                            <td valign="top" align="left" style="padding:0 10px 15px 20px;margin:0">
                                <p style="padding:0;margin:0 0 7px 0;font-size:16px;color:#565656">Any Questions?</p>
                                <p style="padding:0;margin:0;font-size:11px;color:#565656;line-height:20px">
                                    Get in touch with our 24x7 
                                    <a style="text-decoration:underline" href="http://yusrafashion.com/contact-us.php" target="_blank"><span style="color:#666;font-size:11px">Customer Care</span></a>
                                     team.
                                </p>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
        </tbody></table>
        <table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border:solid 1px #e6e6e6;border-top:none">
            <tbody>
             <tr>
                <td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor="#F9F9F9">
                    <p style="padding:0;margin:0 0 7px 0">
                                <a title="yusrafashion.com" style="text-decoration:none;color:#565656" href="http://yusrafashion.com/" target="_blank"><span style="color:#565656;font-size:13px"><span class="il">Yusrafashion</span>.com</span></a>
                    </p>
                    <p style="padding:10px 0 0 0;margin:0;border-top:solid 1px #cccccc;font-size:11px;color:#565656">
                        24x7 Customer Support&nbsp; | &nbsp;Buyer Protection&nbsp; | &nbsp;Flexible Payment Options&nbsp; | &nbsp;Largest Collection
                    </p>
                </td>
             </tr>
            </tbody>
        </table>
    </div>';


mail($to, $subject, $message, $headers);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Malasart</title>
</head>

<body onload="document.confirmation.submit()">
<div style="margin:10% auto; text-align:center;">
<span><img src="images/logo.png"></span>
<h2>Please wait while we transfer you to paypal</h2>
<span><img src="images/progress_bar.gif"></span>
<form name="confirmation" id="confirmation" method="post" action="payuform.php">
<input type="hidden" name="country" value="<?php echo $country; ?>">
 
</form>

</div>

</body>
</html>
