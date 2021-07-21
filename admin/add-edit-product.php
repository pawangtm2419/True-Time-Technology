<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `product` where id='$rec_id'"));
$pid = $_REQUEST['pid'];
if($pid)
{
$mmmk = mysql_query("select * from multiimage where id = '$pid'");
$mmmk1 = mysql_fetch_array($mmmk);
$imgpaths = $mmmk1['imagepath'];
unlink($imgpaths);
$deletequery = mysql_query("delete from multiimage where id = '$pid'");
}
$cid = $_REQUEST['cid'];
if($cid)
{
$deletequery = mysql_query("delete from videourl where id = '$cid'");
}
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Product Management</h1>
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
    <li><a href="product-mgmt.php">Manage Product</a></li>
    <li><a href="add-edit-product.php?action=add">Add Product</a></li>
    <li><a href="mainpgs-mgmt.php">Manage Main Page Product</a></li>
  </ul>
 </div>  
          <div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit Product</span></div>
            <div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
                 <div class="box">
                  <form name="frm1" method="post" enctype="multipart/form-data" action="product-submit.php">
                  <input type="hidden" name="hide1" value="<?php echo $rec_id;?>">
                    <?php
					 $selpre=mysql_query("select * from product where id='$rec_id'");
					 $preids= mysql_fetch_array($selpre);
					 $priId= str_replace("_"," ",$preids['category']);
					 ?>
                  <table width="100%" cellpadding="0" cellspacing="5">

                     
                     <tr><td class="tdclass">Category : </td><td>
                     <select class="textbox" style="width:320px"  name="category" id="category" onchange='Checktype(this.value);'>
                    <option value="" disabled selected>Select Category</option> 
                    <?php
                    $sel="select distinct category from category";
					$sel1=mysql_query($sel);
					while($sel2=mysql_fetch_array($sel1))
					{
					$dd=$sel2['category'];
					?>
                    <option value="<?php echo $dd; ?>"><?php echo $sel2['category']; ?></option>
                    <?php } ?>
                     
                    </select> 
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
					   $(document).ready(function(){
	$('#category option').each(function(){
    if($(this).text() == '<?php echo $priId; ?>'){
        $(this).prop('selected', true).trigger('change');
      }
   });
});

			var f1 = new LiveValidation('category');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                     <tr><td class="tdclass">Product Sub Category : </td><td><select name="sub_category" class="textbox" style="width:320px" id="sub_category" onchange='CheckType(this.value);'>
                  <option value="" disabled selected>Select sub category</option> 
                    <?php
                    $sel="select distinct subcategory from subcategory";
					$sel1=mysql_query($sel);
					while($sel2=mysql_fetch_array($sel1))
					{
					$dd=$sel2['subcategory'];
					?>
                    <option value="<?php echo $dd; ?>" <?php if($sel_adm[0]["sub_category"]=="$dd") echo 'selected="selected"'; ?>><?php echo $sel2['subcategory']; ?></option>
                    <?php } ?>
                    
                    </select>
                  <tr><td class="tdclass">Product Name : </td><td><input type="text" placeholder="Enter Product Name" style="width:320px" value="<?php echo $sel_adm[0]["product_name"];?>" name="product_name" id="product_name" class="textbox"/>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass">Product Image : </td><td><input type="file"  style="width:320px" value="<?php echo $sel_adm[0]["product_image"];?>" name="product_image" id="product_image" class="textbox"/>
                     <?php if($rec_id != ""){?><img src="../images/products/<?php echo $sel_adm[0]["category"]; ?>/<?php echo $sel_adm[0]["title_url"]; ?>/70+70_<?php echo $sel_adm[0]["product_image"]; ?>" height="50px" width="50px" /><?php } ?>
                             <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      
                  </td></tr>
                  <tr><td class="tdclass">More Images : </td><td>
                  <?php if($rec_id != ""){
				  $selectmuliimage = mysql_query("select * from multiimage where uid = '$rec_id'");
				  while($selectmuliimage1 = mysql_fetch_array($selectmuliimage))
				  {
				  ?>
                  <div>
                  <img src="<?php echo $selectmuliimage1['imagepath'];?>" height="50px" width="50px" />&nbsp;&nbsp;&nbsp;&nbsp;<a href="add-edit-product.php?action=edit&&id=<?php echo siteEncrypt($sel_adm[0]["id"]);?>&&pid=<?php echo $selectmuliimage1['id']; ?>" style="text-decoration:none;">Remove</a>
                  </div>
				  <?php } } ?>
                  <div id="dvFile" style="float:left;"><input type="file" class="textbox" style="width:320px" name="item_file[]" ></div><div style="margin-left:0px;"><a href="javascript:_add_more();" title="Add more"><img src="plus_icon.gif" border="0"></a></div>
                             <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                  </td></tr>
                   <tr><td class="tdclass">Reg Price : </td><td><input type="text" placeholder="Enter reg price" style="width:320px" value="<?php echo $sel_adm[0]["reg_price"];?>" name="reg_price" id="reg_price" class="textbox"/>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass">Sale Price : </td><td><input type="text" placeholder="Enter sale price" style="width:320px" value="<?php echo $sel_adm[0]["sale_price"];?>" name="sale_price" id="sale_price" class="textbox"/>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass"> Overview : </td><td><script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                   <textarea name="overview" id="overview" class="ckeditor" rows="5" cols="5" style=" width:200px;"><?php echo $sel_adm[0]["overview"];?></textarea>
                    
                  </td></tr>
          <tr><td class="tdclass"> Specification : </td><td>
                   <textarea name="specification" id="specification" class="ckeditor" style=" width:200px;"><?php echo $sel_adm[0]["specification"];?></textarea>
                    
                  </td></tr>
                   
         <style type="text/css">
          .file_padd input[type="text"]{ padding:5px 10px; margin-bottom:2px;}
		  option{padding:3px;}
		  select{ padding:5px 5px 3px 5px; height:28px;}
		  .img_pad img{ margin-top:8px; margin-left:10px;}
         </style>         
                  
                  
                        	<td class="tdclass"></td>
                            <td>

                            </td>
                        </tr>
                         
                <tr><td></td><td><input type="submit" name="update" class="button" id="Save"  value="Submit"/></td></tr>
                  </table>  </form></div>

           <div class="cboth"></div>
</div>
 </div>
    <div class="cboth"></div>
</div>
<div class="cboth" style="height:120px"></div>
<script language="javascript">
<!--
	function _add_more() {
		var txt = "<br><input class='textbox' style='width:320px' type=\"file\" name=\"item_file[]\">";
		document.getElementById("dvFile").innerHTML += txt;
	}
	function validate(f){
		var chkFlg = false;
		for(var i=0; i < f.length; i++) {
			if(f.elements[i].type=="file" && f.elements[i].value != "") {
				chkFlg = true;
			}
		}
		if(!chkFlg) {
			alert('Please browse/choose at least one file');
			return false;
		}
		f.pgaction.value='upload';
		return true;
	}
//-->
</script>
 
<script type="text/javascript">
function CheckType(val){
 var element=document.getElementById('retype');
 if(val=='Select Type'||val=='Others')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script>
<script type="text/javascript">
function Checktype(val){
 var element=document.getElementById('retyp');
 if(val=='Select Type'||val=='other')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 

<?php include_once("inc/dash-footer.php");?>