<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
$added_date = date("Y-m-d H:i:s");
	$modified_date = date("Y-m-d H:i:s");
	
    $category=$_POST["category"];
    $subcategory=$_POST["subcategory"];
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `subcategory` where id='$rec_id'"));
}
if(isset($_POST["update"])){
		  $update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `subcategory` set `category`='$category',`subcategory`='$subcategory',`modified_date`='$modified_date' where id='$rec_id'"))));
		  
 if($update) 
	  {
			 
			 header("location:subcategory-mgmt.php");






	   } 
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Add/Edit Sub category</h1>
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
    <li><a href="category-mgmt.php">Manage Category</a></li>
    <li><a href="add-edit-category.php?action=add">Add Category</a></li>
    <li><a href="subcategory-mgmt.php">Manage Subcategory</a></li>
    <li><a href="add-edit-subcategory.php?action=add">Add Subcategory</a></li>
 
  </ul>
 </div>  
          <div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit SEO</span></div>
            <div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
                 <div class="box">
                  <form name="frm1" method="post" enctype="multipart/form-data">
                  <table width="100%" cellpadding="0" cellspacing="5">

                     
                     <tr><td class="tdclass">Select Category : </td><td><select name="category" name="category">
                    <option value="" disabled selected>Select Category</option> 
                    <?php
                    $sel="select distinct category from category";
					$sel1=mysql_query($sel);
					while($sel2=mysql_fetch_array($sel1))
					{
					$dd=$sel2['category'];
					?>
                    <option value="<?php echo $dd; ?>" <?php if($sel_adm[0]["category"]=="$dd") echo 'selected="selected"'; ?>><?php echo $sel2['category']; ?></option>
                    <?php } ?>
                    
                     
                    </select>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  
                  <tr><td class="tdclass">Sub Category : </td><td><input type="text" placeholder="Enter sub category" style="width:320px" value="<?php echo $sel_adm[0]["subcategory"];?>" name="subcategory" id="subcategory" class="textbox"/>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <style type="text/css">
		  option{padding:3px;}
		  select{ padding:5px 5px 3px 5px; height:28px;}
         </style>         
                  
                  
                        	<td class="tdclass"></td>
                            <td>

                            </td>
                        </tr>
                         <?php 
						 if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'add' ){
                         if(isset($_POST["update"])){
		  $insert=mysql_real_escape_string(strip_tags(trim($db->fireQuery("insert into subcategory (`id`,`category`,`subcategory`,`added_date`,`modified_date`) values 
              ('','$category','$subcategory','$added_date','$modified_date')"))));
 if($insert) 
	  {
			
			 header("location:subcategory-mgmt.php");

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