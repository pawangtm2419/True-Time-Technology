<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
$added_date = date("Y-m-d H:i:s");
	$modified_date = date("Y-m-d H:i:s");
	$brand_name = $_POST["brand_name"];
    $image=$_FILES['image']['name'];
$target_path = "../images/ads/";	

			$target_path = $target_path.$_FILES['image']['name'];
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `advertise` where id='$rec_id'"));
}
if(isset($_POST["update"])){
		  $update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `advertise` set `url`='$brand_name',`modified_date`='$modified_date' where id='$rec_id'"))));
		  if(!empty($_FILES['image']['name']))
			{
			move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
			$update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `advertise` set `image`='$image' where id='$rec_id'"))));
			}
		  
 if($update) 
	  {
			 
			 header("location:advertise-mgmt.php");


	   } 
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Add/Edit Advertise</h1>
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
      <li><a href="advertise-mgmt.php">Manage Advertise</a></li>
    <li><a href="add-edit-advertise.php?action=add">Add Advertise</a></li>
  </ul>
 </div>  
          <div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit Advertise</span></div>
            <div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
                 <div class="box">
                  <form name="frm1" method="post" enctype="multipart/form-data">
                  <table width="100%" cellpadding="0" cellspacing="5">

                     
                     <tr><td class="tdclass">Link : </td><td><input type="text" style="width:320px" name="brand_name" id="brand_name" class="textbox" value="<?php echo $sel_adm[0]["url"];?>" placeholder="Enter Ad Link Here"/>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('brand_name');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                     <tr><td class="tdclass">Image : </td><td><input type="file" style="width:320px" value="<?php echo $sel_adm[0]["image"];?>" name="image" id="image" class="textbox"/>
                     <?php if($rec_id != ""){?><img src="../images/ads/<?php echo $sel_adm[0]["image"]; ?>" height="50px" width="50px" /><?php } ?>
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
		  $insert = mysql_query("insert into advertise (url,image,added_date,modified_date) values('$brand_name','$image','$added_date','$modified_date')");
 if($insert) 
	  {
			
			 header("location:advertise-mgmt.php");

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