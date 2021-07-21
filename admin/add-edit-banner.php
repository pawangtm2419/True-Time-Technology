<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
$added_date = date("Y-m-d H:i:s");
$modified_date = date("Y-m-d H:i:s");
$product_name = $_POST["product_name"];
$banner=$_FILES['banner']['name'];
$target_path = "../images/banner/";	
$target_path = $target_path.$_FILES['banner']['name'];
include('function_banner.php');
// settings
$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
// thumbnail sizes
$sizes = array(800 => 400);

$ext = strtolower(pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION));
if (in_array($ext, $valid_exts)) {
/* resize image */
foreach ($sizes as $w => $h) {
$files[] = resize($w, $h);
}

}
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from banner where id='$rec_id'"));
}
if(isset($_POST["update"])){
$update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update banner set product_name='$product_name', modified_date='$modified_date' where id='$rec_id'"))));
if(!empty($_FILES['banner']['name']))
{

//move_uploaded_file($_FILES['banner']['tmp_name'], $target_path);
$update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update banner set banner='$banner' where id='$rec_id'"))));
}

if($update) 
{

header("location:banner-mgmt.php");


} 
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Add/Edit Banner</h1>
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
<li><a href="banner-mgmt.php">Manage Banner</a></li>
<li><a href="add-edit-banner.php?action=add">Add Banner</a></li>
</ul>
</div>  
<div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit Banner</span></div>
<div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
<div class="box">
<form name="frm1" method="post" enctype="multipart/form-data">
<table width="100%" cellpadding="0" cellspacing="5">


<tr><td><input type="hidden" style="width:320px" value="brand" name="brand_name" id="brand_name" class="textbox"/>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
<script type="text/javascript">
var f1 = new LiveValidation('title');
f1.add(Validate.Presence);
</script>
</td></tr>
<tr><td class="tdclass">Product Name : </td><td>
<select name="product_name" name="product_name" class="textbox" style="height:30px;">
<option value="" disabled selected>Select Product Name</option> 
<?php 
$selectproductname = mysql_query("select * from product order by id desc");
while($selectproductname1=mysql_fetch_array($selectproductname))
{
$pppp = $selectproductname1['id'];
?>
<option value="<?php echo $selectproductname1['id'];?>" <?php if($sel_adm[0]["product_name"]==$pppp) echo 'selected="selected"'; ?>><?php echo $selectproductname1['product_name'];?></option>
<?php } ?>
</select>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
<script type="text/javascript">
var f1 = new LiveValidation('title');
f1.add(Validate.Presence);
</script>
</td></tr>
<tr><td class="tdclass">Banner : </td><td><input type="file" style="width:320px" value="<?php echo $sel_adm[0]["banner"];?>" name="banner" id="banner" class="textbox"/>
<?php if($rec_id != ""){?><img src="../images/banner/800+400_<?php echo $sel_adm[0]["banner"]; ?>" height="50px" width="50px" /><?php } ?>
<span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>

</td></tr>


<td class="tdclass"></td>
<td>

</td>
</tr>
<?php 
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'add' ){
if(isset($_POST["update"])){



$insert = mysql_query("insert into banner(product_name,banner,added_date,modified_date) values('$product_name','$banner','$added_date','$modified_date')");
if($insert) 
{

header("location:banner-mgmt.php");

} 
}

}else{
					   }?>
<tr><td></td><td><input type="submit" name="update" class="button" id="Save"  value="Submit"/></td></tr>
</table>  </form></div>

<div class="cboth"></div>
</div>
</div>
<div class="cboth"></div>
</div>
<div class="cboth" style="height:120px"></div>

<?php include_once("inc/dash-footer.php");?>