<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
$added_date = date("Y-m-d H:i:s");
	$modified_date = date("Y-m-d H:i:s");
	$social_link = $_POST["social_link"];
    $image=$_FILES['image']['name'];
$target_path = "../images/social/";	

			$target_path = $target_path.$_FILES['image']['name'];
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `social` where id='$rec_id'"));
}
if(isset($_POST["update"])){
		  $update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `social` set `social_link`='$social_link',`modified_date`='$modified_date' where id='$rec_id'"))));
		  if(!empty($_FILES['image']['name']))
			{
			move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
			$update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `social` set `image`='$image' where id='$rec_id'"))));
			}
		  
 if($update) 
	  {
			 
			 header("location:social-mgmt.php");


	   } 
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Add/Edit Social Link</h1>
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
      <li><a href="social-mgmt.php">Manage Social Link</a></li>
    <li><a href="add-edit-social.php?action=add">Add Social Link</a></li>
  </ul>
 </div>  
          <div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit Social_Link</span></div>
            <div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
                 <div class="box">
                  <form name="frm1" method="post" enctype="multipart/form-data">
                  <table width="100%" cellpadding="0" cellspacing="5">

                     
                     <tr><td class="tdclass">Link : </td><td><input type="text" style="width:320px" value="<?php echo $sel_adm[0]["social_link"];?>" name="social_link" id="social_link" class="textbox" placeholder="Enter Social media Link"/>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('social_link');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                     <tr><td class="tdclass">Image : </td><td><input type="file" style="width:320px" value="<?php echo $sel_adm[0]["image"];?>" name="image" id="image" class="textbox"/>
                     <?php if($rec_id != ""){?><img src="../images/social/<?php echo $sel_adm[0]["image"]; ?>" height="50px" width="50px" /><?php } ?>
                             <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      
                  </td></tr>
                  
                  
                        	<td class="tdclass"></td>
                            <td>

                            </td>
                        </tr>
                         <?php 
						 if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'add' ){
                         if(isset($_POST["update"])){
    
    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
		  $insert = mysql_query("insert into social (social_link,image,added_date,modified_date) values('$social_link','$image','$added_date','$modified_date')");
 if($insert) 
	  {
			
			 header("location:social-mgmt.php");

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