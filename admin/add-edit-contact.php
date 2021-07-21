<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
$added_date = date("Y-m-d H:i:s");
$modified_date = date("Y-m-d H:i:s");

$compName=$_POST["compName"];
$compAddress=$_POST["compAddress"];
$phoneMain=$_POST["phoneMain"];
$phone=$_POST["phone"];
$emailMain=$_POST["emailMain"];
$email=$_POST["email"];
$fax=$_POST["fax"];
 
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `contact` where id='$rec_id'"));
}
if(isset($_POST["update"])){
$update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `contact` set `compName`='$compName', `compAddress`='$compAddress', `phoneMain`='$phoneMain', `phone`='$phone', `emailMain`='$emailMain', `email`='$email', `fax`='$fax', `modified_date`='$modified_date' where id='$rec_id'"))));

if($update) 
{

header("location:contact-mgmt.php");

} 
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Add/Edit Contact</h1>
<span class="footer-line"></span>
<div class="errordiv">
<?php
if ($_SESSION['msg']){echo '<div class="msg" style="cursor:pointer">'.$_SESSION['msg'].'</div>';$_SESSION['msg']='';unset($_SESSION['msg']);}
if ($_SESSION['errormsg']){echo '<div class="errormsg" style="cursor:pointer">'.$_SESSION['errormsg'].'</div>';$_SESSION['errormsg']='';unset($_SESSION['errormsg']);
}	
?>
</div>
<div class="menu_box" >
<ul>
<li><a href="welcome.php">Home</a></li>
<li><a href="contact-mgmt.php">Manage Contact</a></li>
<li><a href="add-edit-contact.php?action=add">Add Contact</a></li>
</ul>
</div>  
<div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit Contact</span></div>
<div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
<div class="box">
<form name="frm1" method="post" enctype="multipart/form-data">
<table width="100%" cellpadding="0" cellspacing="5">


<tr><td class="tdclass">Company Name : </td><td> 
<input type="text" placeholder="Enter Company Name" style="width:320px" value="<?php echo $sel_adm[0]["compName"];?>" name="compName" id="compName" class="textbox"/>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
<script type="text/javascript">
var f1 = new LiveValidation('compName');
f1.add(Validate.Presence);
</script>
</td>
</tr>
<tr><td class="tdclass">Company Address : </td><td><textarea name="compAddress" rows="7" cols="42" placeholder="Enter Address"><?php echo $sel_adm[0]["compAddress"];?></textarea>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
<script type="text/javascript">
var f1 = new LiveValidation('compAddress');
f1.add(Validate.Presence);
</script>
</td></tr>
<tr><td class="tdclass">Phone Main : </td><td> 
<input type="text" placeholder="Enter main number" style="width:320px" value="<?php echo $sel_adm[0]["phoneMain"];?>" name="phoneMain" id="phoneMain" class="textbox"/>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
<script type="text/javascript">
var f1 = new LiveValidation('phoneMain');
f1.add(Validate.Presence);
</script>
</td>
</tr>
<tr><td class="tdclass">Other Phones No. : </td><td> 
<input type="text" placeholder="Enter Phone Numbers" style="width:320px" value="<?php echo $sel_adm[0]["phone"];?>" name="phone" id="phone" class="textbox"/>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
 
</td>
</tr>
<tr><td class="tdclass">Main Email Address : </td><td> 
<input type="text" placeholder="Enter main email" style="width:320px" value="<?php echo $sel_adm[0]["emailMain"];?>" name="emailMain" id="emailMain" class="textbox"/>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
<script type="text/javascript">
var f1 = new LiveValidation('emailMain');
f1.add(Validate.Presence);
</script>
</td>
</tr>
<tr><td class="tdclass">Other Emails : </td><td>
<input type="text" placeholder="Enter Other Emails" style="width:320px" value="<?php echo $sel_adm[0]["email"];?>" name="email" id="email" class="textbox"/>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
 
</td>
</tr>
<tr><td class="tdclass">Fax Number : </td><td> 
<input type="text" placeholder="Enter Fax Number " style="width:320px" value="<?php echo $sel_adm[0]["fax"];?>" name="fax" id="fax" class="textbox"/>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
 
</td>
</tr>
  

<?php 
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'add' ){
if(isset($_POST["update"])){
$insert=mysql_real_escape_string(strip_tags(trim($db->fireQuery("insert into contact (`id`, `compName`, `compAddress`, `phoneMain`, `phone`, `emailMain`, `email`, `fax`, `added_date`, `modified_date`) values('', '$compName', '$compAddress', '$phoneMain', '$phone', '$emailMain', '$email', '$fax', '$added_date', '$modified_date')"))));
if($insert) 
{

header("location:contact-mgmt.php");

} 
}

}else{
	   }?>
<tr><td></td><td><input type="submit" name="update" class="button" id="Save"  value="Submit"/></td></tr>
</table>  </form></div>
<style type="text/css">
option{padding:3px;}
select{ padding:5px 5px 3px 5px; height:28px;}
</style>         
 
<div class="cboth"></div>
</div>
</div>
<div class="cboth"></div>
</div>
<div class="cboth" style="height:120px"></div>

<?php include_once("inc/dash-footer.php");?>