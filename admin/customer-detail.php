<?php include("../config/connection.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Detail</title>
</head>

<body>
<?php
$id = $_REQUEST['id'];
$selectcus = mysql_query("select * from register where id = '$id'");
$selectcus1 = mysql_fetch_array($selectcus);
?>
<table width="571" border="1">
  <tr>
    <td width="147" height="33">First Name</td>
    <td width="408"><?php echo $selectcus1['fname'];?></td>
  </tr>
  <tr>
    <td height="33">Last Name</td>
    <td><?php echo $selectcus1['lname'];?></td>
  </tr>
  <tr>
    <td height="33">Email Id</td>
    <td><?php echo $selectcus1['email'];?></td>
  </tr>
  <tr>
    <td height="32">Mobile</td>
    <td><?php echo $selectcus1['mobile'];?></td>
  </tr>
  <tr>
    <td height="32">Address</td>
    <td><?php echo $selectcus1['address'];?></td>
  </tr>
  <tr>
    <td height="33">Country</td>
    <td><?php echo $selectcus1['country'];?></td>
  </tr>
  <tr>
    <td height="33">State</td>
    <td><?php echo $selectcus1['state'];?></td>
  </tr>
  <tr>
    <td height="33">City</td>
    <td><?php echo $selectcus1['city'];?></td>
  </tr>
  <tr>
    <td height="33">Pin Code</td>
    <td><?php echo $selectcus1['pincode'];?></td>
  </tr>
  <tr>
    <td height="33">Registration Date</td>
    <td><?php echo $selectcus1['added_date'];?></td>
  </tr>
</table>

</body>
</html>
