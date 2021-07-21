<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
$added_date = date("Y-m-d H:i:s");
	$modified_date = date("Y-m-d H:i:s");
	
    $pagenmae=$_POST["pagenmae"];
	$manucatg=$_POST["manucatg"];
	$pageurl=str_replace(' ', '-', $pagenmae);
    $description=$_POST["description"];
if(isset($_REQUEST["action"]) && $_REQUEST["action"] == 'edit' )
{
$rec_id=siteDecrypt($_REQUEST["id"]);
$sel_adm=$db->fetchAssoc($db->fireQuery("select * from `pgs` where id='$rec_id'"));
}
if(isset($_POST["update"])){
		  $update=mysql_real_escape_string(strip_tags(trim($db->fireQuery("update `pgs` set `pagenmae`='$pagenmae',`manucatg`='$manucatg',`pageurl`='$pageurl',`description`='$description',`modified_date`='$modified_date' where id='$rec_id'"))));
		  
 if($update) 
	  {
			 
			 header("location:pgs-mgmt.php");






	   } 
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Add/Edit Page</h1>
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
      <li><a href="pgs-mgmt.php">Manage Page</a></li>
    <li><a href="add-edit-pgs.php?action=add">Add Page</a></li>
  </ul>
 </div>  
          <div class="quick" style="width:900px;"><span style="margin-left: 10px;">Add/Edit Page</span></div>
            <div class="link-name-box menu_bar" style="width:900px;float:right;height:auto;">
                 <div class="box">
                  <form name="frm1" method="post" enctype="multipart/form-data">
                  <table width="100%" cellpadding="0" cellspacing="5">

                     
                     <tr><td class="tdclass">Select Menu : </td><td>
                     <select name="manucatg">
                    <option value="" disabled selected>Select Menu</option> 
                    <option value="main-manu" <?php if($sel_adm[0]["manucatg"]=="main-manu") echo 'selected="selected"'; ?>>Main-manu</option>
                    <option value="headerTop" <?php if($sel_adm[0]["manucatg"]=="headerTop") echo 'selected="selected"'; ?>>Header-top-link</option>
                    <option value="footer-sec1" <?php if($sel_adm[0]["manucatg"]=="footer-sec1") echo 'selected="selected"'; ?>>Footer-section 1</option>
                    <option value="footer-sec3" <?php if($sel_adm[0]["manucatg"]=="footer-sec3") echo 'selected="selected"'; ?>>Footer-section 3</option>
                    
                     
                    </select>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('pgsname');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass">Page Name : </td><td><input type="text" style="width:320px" value="<?php echo $sel_adm[0]["pagenmae"];?>" name="pagenmae" id="pagenmae" class="textbox" placeholder="Enter Page Name"/>
                               <span style="margin-left: 20px; color: #DD0826; line-height: 30px;"></span>
                      <script type="text/javascript">
			var f1 = new LiveValidation('pagenmae');
			f1.add(Validate.Presence);
		       </script>
                  </td></tr>
                  <tr><td class="tdclass"> Description : </td><td><script type="text/javascript" src="ckeditor/ckeditor.js"></script>
                   <textarea name="description" id="description" class="ckeditor"  style=" width:200px;"><?php echo $sel_adm[0]["description"];?></textarea>
                    
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
    
		  $insert=mysql_real_escape_string(strip_tags(trim($db->fireQuery("insert into pgs (`id`,`manucatg`,`pagenmae`,`pageurl`,`description`,`added_date`,`modified_date`) values 
              ('','$manucatg','$pagenmae','$pageurl','$description','$added_date','$modified_date')"))));
 if($insert) 
	  {
			
			 header("location:pgs-mgmt.php");

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