<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
$added_date = date("Y-m-d H:i:s");
	$modified_date = date("Y-m-d H:i:s");
	
    $pgs_name=$_POST["pgs_name"];
	$pageId=$_POST["pageId"];
    $title=$_POST["title"];
	$description=$_POST["description"];
	$keyword=$_POST["keyword"];
	$analitics=$_POST["analitics"];
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `seo` where id='$rec_id'"));
}
if(isset($_POST["update"])){
		  $update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `seo` set `pgs_name`='$pgs_name',`pageId`='$pageId',`title`='$title',`description`='$description',`keyword`='$keyword',`analitics`='$analitics',`modified_date`='$modified_date' where id='$rec_id'"))));
		  
 if($update) 
	  {
			 
			 header("location:seo-mgmt.php");






	   } 
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Add/Edit SEO</h1>
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
      <li><a href="seo-mgmt.php">Manage SEO</a></li>
    <li><a href="add-edit-seo.php?action=add">Add SEO</a></li>
  </ul>
 </div>  
          <div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit SEO</span></div>
            <div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
                 <div class="box">
                  <form name="frm1" method="post" enctype="multipart/form-data">
                  <table width="100%" cellpadding="0" cellspacing="5">

                     
                     <tr><td class="tdclass">Select Page Name : </td><td><select name="pageId">
                    <option value="" disabled selected>Select Page Name</option> 
                    <?php
                    $sel="select distinct id,sub_category from product";
		     $sel1=mysql_query($sel);
		     while($sel2=mysql_fetch_array($sel1))
		     {
		     $dd=$sel2['id'];
	             ?>		
                    <option value="<?php echo $dd; ?>" <?php if($sel_adm[0]["pgs_name"]=="$dd") echo 'selected="selected"'; ?>><?php echo $sel2['sub_category']; ?></option>
                    <?php } ?>
                    <?php
                    $sel2="select distinct id, pageurl from pgs";
		     $sel1=mysql_query($sel2);
		     while($sel3=mysql_fetch_array($sel1))
		     {
		     $dd=$sel3['id'];
	             ?>		
                    <option value="<?php echo $dd; ?>" <?php if($sel_adm[0]["pgs_name"]=="$dd") echo 'selected="selected"'; ?>><?php echo $sel3['pageurl']; ?></option>
                    <?php } ?>
                    <option value="1">Home Page</option>
                    <option value="2">Contact Page</option>
                    <option value="3">Product Detail</option>
                    <option value="4">product</option>
                    </select>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  
                  <tr><td class="tdclass">Title : </td><td><textarea name="title" rows="7" cols="42" placeholder="Enter Title"><?php echo $sel_adm[0]["title"];?></textarea>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass">Description : </td><td><textarea name="description" rows="7" cols="42" placeholder="Enter Description"><?php echo $sel_adm[0]["description"];?></textarea>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass">Keyword : </td><td><textarea name="keyword" rows="7" cols="42" placeholder="Enter Keyword"><?php echo $sel_adm[0]["keyword"];?></textarea>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('title');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass">Google Analitics : </td><td><textarea name="analitics" rows="7" cols="42" placeholder="Enter Google Analitics Code"><?php echo $sel_adm[0]["analitics"];?></textarea>
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
		  $insert=mysql_real_escape_string(strip_tags(trim($db->fireQuery("insert into seo (`id`,`pageId`,`pgs_name`,`title`,`description`,`keyword`,`analitics`,`added_date`,`modified_date`) values 
              ('',$pageId, '$pgs_name','$title','$description','$keyword','$analitics','$added_date','$modified_date')"))));
 if($insert) 
	  {
			
			 header("location:seo-mgmt.php");

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