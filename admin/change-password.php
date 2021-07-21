<?php
include_once("inc/body.php");  
include_once("admin/inc/checksession.inc.php"); 
$sel_uname=$db->fetchAssoc($db->fireQuery("select username from `admin` where id=".$_SESSION["user_id"].""));
if(isset($_POST["change"]))
{
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$select = mysql_query("select * from admin where password = '$old_password'");
	$select1 = mysql_fetch_array($select);
	$pass = $select1['password'];
	if($pass)
	{
	$update = mysql_query("update admin set password = '$new_password' where password = '$pass'");
	$msge = "Success";
	}
	else
	{
	$msge = "Invalid Intry";
	}
	
	
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Change Password</h1>
<span class="footer-line"></span>
<div class="errordiv">
<?php
if($msge)
{
echo '<div class="msg" style="cursor:pointer">'.$msge.'</div>';
}
?>
</div>

                     <div class="menu_box" >
  <ul>
    <li><a href="welcome.php">Home</a></li>
      <li><a href="change-password.php">Change Password</a></li>
  </ul>
 </div>
            <div class="quick" style=""><span style="margin-left: 10px;">Change Password</span></div>
            <div class="link-name-box menu_bar" style="width: 900px;float:right;height:320px;">
                
            <div class="box">
                 <form name="frm" method="post">
                    <table width="100%" border="0" cellpadding="0" cellspacing="5">
  <tr>
    <td width="40%" height="40px" align="right" style="padding-top:15px;">Username :</td>
    <td width="60%" height="20px"><input type="text" name="username" id="username" readonly class="textbox" value="<?php echo $sel_uname[0]['username'];?>"  />
                        </td>
  </tr>
  <tr>
    <td width="40%" height="40px" align="right" style="padding-top:15px;">Old Password :</td>
    <td width="60%" height="35px"><input type="password" name="old_password" id="old_password" class="textbox" value=""  />
                        <script type="text/javascript">
					 				var f2 = new LiveValidation('old_password');
					 				f2.add(Validate.Presence);
									</script></td>
  </tr>
  <tr>
    <td width="40%" height="40px" align="right" style="padding-top:15px;">New Password :</td>
    <td width="60%" height="35px"><input type="password" name="new_password" id="new_password" class="textbox" value=""  />
                        <script type="text/javascript">
					 				var f3 = new LiveValidation('new_password');
					 				f3.add(Validate.Presence);
									</script></td>
  </tr>
  <tr>
    <td width="40%" height="40px" align="right" style="padding-top:15px;">Confirm Password :</td>
    <td width="60%" height="35px"><input type="password" name="confirm_password" id="confirm_password" class="textbox" value=""  />
                         <script type="text/javascript">
					 				var f1 = new LiveValidation('confirm_password');
									f1.add(Validate.Presence);
                                                                        f1.add( Validate.Confirmation, { match: 'new_password' } );
		          					</script>
  </tr>
   <tr>
    <td width="40%" height="35px"></td>
   <td><input type="submit" name="change" id="change" class="button" value="Submit" /></td>
  </tr>
</table>
                 </form>
            </div> 
                
            </div>

</div>
<div class="cboth"></div>
</div>
<div class="cboth" style="height:120px"></div>

<?php include_once("inc/dash-footer.php");?>