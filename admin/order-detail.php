<?php include("../config/connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Detail</title>
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
 <script type="text/javascript">     
    function PrintDivv() {    
       var divToPrint = document.getElementById('divToInvoice');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
</head>

<body>
<?php
$id = $_REQUEST['id'];
$selectcus = mysql_query("select * from customerorder where id = '$id'");
$selectcus1 = mysql_fetch_array($selectcus);
?>
<table width="844" border="0">
  <tr>
    <td width="834" height="38" style="text-align:center; font-weight:bold; font-size:16px;">...Customer Oreder Detail...</td>
  </tr>
</table>

<table width="843" border="0">
<tr>
    <td width="192" height="33"><b>Order Id</b></td>
    <td width="641"><?php echo $selectcus1['orderid'];?></td>
  </tr>
  <tr>
    <td width="192" height="33"><b>First Name</b></td>
    <td width="641"><?php echo $selectcus1['fname'];?></td>
  </tr>
  <tr>
    <td height="33"><b>Last Name</b></td>
    <td><?php echo $selectcus1['lname'];?></td>
  </tr>
  <tr>
    <td height="33"><b>Email Id</b></td>
    <td><?php echo $selectcus1['email'];?></td>
  </tr>
  <tr>
    <td height="32"><b>Mobile</b></td>
    <td><?php echo $selectcus1['mobile'];?></td>
  </tr>
  <tr>
    <td height="32"><b>Total Price</b></td>
    <td><?php echo $selectcus1['totalprice'];?></td>
  </tr>
  <tr>
    <td height="32"><b>Product</b></td>
    <td><?php echo $selectcus1['productnamee'];?></td>
  </tr>
  <tr>
    <td height="32"><b>Address</b></td>
    <td><?php echo $selectcus1['address'];?></td>
  </tr>
  <tr>
    <td height="33"><b>Payment Status</b></td>
    <td><?php echo $selectcus1['paymentstatus'];?></td>
  </tr>
  <tr>
    <td height="33"><b>Order Date</b></td>
    <td><?php echo $selectcus1['added_date'];?></td>
  </tr>
</table>
<div id="divToPrint" style="display:none;">
<table width="844" border="0">
  <tr>
    <td width="188" height="67" style="text-align:center; font-weight:bold; font-size:16px;">To</td>
    <td width="640">&nbsp;</td>
  </tr>
  <tr>
    <td height="31"><b>Name:</b></td>
    <td><?php echo $selectcus1['fname'];?> <?php echo $selectcus1['lname'];?></td>
  </tr>
  <tr>
    <td height="33"><b>Address:</b></td>
    <td><?php echo $selectcus1['address'];?></td>
  </tr>
  <tr>
    <td height="33"><b>Mobile:</b></td>
    <td><?php echo $selectcus1['mobile'];?>;</td>
  </tr>
  <tr>
    <td height="36"><b>Product:</b></td>
    <td><?php echo $selectcus1['productnamee'];?></td>
  </tr>
  <tr>
    <td height="33"><b>Total Price:</b></td>
    <td><?php echo $selectcus1['totalprice'];?></td>
  </tr>
  <tr>
    <td height="34"><b>Order Date:</b></td>
    <td><?php echo $selectcus1['added_date'];?></td>
  </tr>
</table>

</div>
<div id="divToInvoice" style="display:none;">
<table width="840" style="border-bottom:1px solid #333333;">
  <tr>
    <td width="386" height="73"><img src="../images/logo.png"></td>
    <td width="438"><span style="float:right; font-weight:bold; font-size:16px;">Email: info@urbanglamour.in</span></td>
  </tr>
</table>
<table width="840" style="border-bottom:1px solid #333333;">
  <tr>
    <td width="386" height="73" style="font-weight:bold;">Order Id: <?php echo $selectcus1['orderid'];?><br/>Order Date: <?php echo $selectcus1['added_date'];?></td>
    <td width="438"><span style="float:right; font-weight:bold;">Address: <?php echo $selectcus1['address'];?></span></td>
  </tr>
</table>
<table width="840" style="border-bottom:1px solid #333333;">
<tr>
<td style="text-align:center; font-weight:bold;">Description</td>
<td style="text-align:center; font-weight:bold;">Amount</td>
</tr>
  <tr>
    
    <td style="text-align:center; font-weight:bold;"><?php echo $selectcus1['productnamee'];?></td>
    <td style="text-align:center; font-weight:bold;"><?php echo $selectcus1['totalprice'];?></td>
    
  </tr>
</table>
<table width="840" style="border-bottom:1px solid #333333;">
  <tr>
    <td width="386" height="73" style="font-weight:bold;">Total:</td>
    <td width="438"><span style="float:right; font-weight:bold;">Rs. <?php echo $selectcus1['totalprice'];?></span></td>
  </tr>
</table><br/><br/><br/>
<table width="840" border="0">
  <tr>
    <td style="font-weight:bold; float:right;">Signature</td>
  </tr>
</table>
</div>
<br/><br/><br/><br/>
<input type="button" value="Print Sticker" onclick="PrintDiv();" style="height:35px; width:100px; float:left;" />
<input type="button" value="Print Invoice" onclick="PrintDivv();" style="height:35px; width:100px; float:right;" />
</body>
</html>
