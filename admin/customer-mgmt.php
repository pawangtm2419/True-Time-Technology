<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
if( isset( $_POST["activate"] ) )
{
	$temp = new Product();
	$temp->checkActivate( $_POST );
}

if(isset($_REQUEST["action"]) && $_REQUEST['action'] == 'delete')
{
	$temp = new Product();
	$temp->deletePhoto( $_POST );
}
if( isset( $_POST["deactivate"] ) ) {
   $temp = new Product();
   $temp->checkDeactivate( $_POST );
}

if( isset( $_POST["delete"] ) ) {
   $checkAll = $_POST['checkAll'];
   foreach($checkAll as $idd)
   {
   $deletequery = mysql_query("delete from register where id = '$idd'");
   header("Location:customer-mgmt.php");
   }
}
$id = $_REQUEST['id'];
if($id)
{
$deletequery = mysql_query("delete from register where id = '$id'");
header("Location:customer-mgmt.php");
}
$act = $_REQUEST['act'];
if($act)
{
$updatestatus = mysql_query("update register set status = '0' where id = '$act'");
}
$dact = $_REQUEST['dact'];
if($dact)
{
$updatestatus = mysql_query("update register set status = '1' where id = '$dact'");
}
?>
<script type="text/javascript" src="src/jquery.min.js"></script>
  <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
      $(function() {
      $('a[rel*=facebox]').facebox({
          loadingImage: 'src/loading.gif',
          closeImage: 'src/closelabel.png'
      })
      })
  </script>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Customer Management</h1>
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
       <li><a href="customer-mgmt.php">Manage Customer</a></li>
  </ul>
 </div> 
           <div style="width:900px; background:#0099FF; margin:0 auto; line-height:40px; margin-left:50px;">
            <form action="" method="post" style="margin-left:10px; color:#FFFFFF; font-weight:bold; font-size:16px; letter-spacing:-.3px;">
            Search by Customer Name <input type="text" style="width:200px; height:24px; border-radius:3px; padding:0 10px;" name="searchproduct">
            <input type="submit" name="search" style="padding:3px 10px; border-radius:3px;" value="Search">
            </form>
            </div>
            <?php
            $searchproduct = $_POST['searchproduct'];
			?>
            <form name="frm1" method="post">
                   
                     <div class="link-name-box menu_bar" style="width: 900px;float:right;height:40px;">
           
                <span class="date"><a href="#" onclick="chunchall(this);return false" style="color:#FFFFFF;">Check all</a></span> <span class="block" style="width:150px;">First Name</span><span class="block" style="width:150px;">Last Name</span><span class="block" style="width:200px;">Email</span><span class="block" style="width:150px;">Mobile</span> <span class="apply-icons" style="width:12%;">Modify</span>
                       </div>
            
             <?php
			if($searchproduct)
			{
			$query = "select * from `register` where fname LIKE '%$searchproduct%' order by id desc";
			}
			else
			{
            $query = "select * from `register` order by id desc";
			}
	    $pager = new PS_Pagination($query, rows_per_page, links_per_page,  "");
	    $rSet = $pager->paginate();
	    $select = $db->fetchAssoc($rSet);
            for($i=0;$i<count($select);$i++) {
	    ?>
            <div class="grid-box-data" style="width:898px;float:right;">
                <span class="date"><input type="checkbox" class="checkBox" name="checkAll[]" value="<?php echo $select[$i]["id"];?>" />
    </span> <span class="block" style="width:150px; ;"><?php echo $select[$i]["fname"];?> </span><span class="block" style="width:150px; ;"><?php echo $select[$i]["lname"];?> </span><span class="block" style="width:150px; ;"><?php echo $select[$i]["email"];?> </span><span class="block" style="width:150px; ;"><?php echo $select[$i]["mobile"];?> </span>
                 
             
              <div class="apply-icons-1" style="width:12%;">
                 <ul>
        <li><a href="customer-detail.php?id=<?php echo $select[$i]["id"];?>" rel="facebox" style="background-image: none;float: left;"><img src="images/icon_detail.gif" alt="Edit" title="View" /></a></li>
        <li><a href="customer-mgmt.php?id=<?php echo $select[$i]["id"];?>" style="background-image: none;float:left;"><img src="images/delate-icon.png" alt="Delete" title="Delete" /></a></li>
        <?php if($select[$i]["status"]==1){?>
        <li><a href="customer-mgmt.php?act=<?php echo $select[$i]["id"];?>" style="background-image: none;float:left; text-decoration:none;">ACTIVE</a></li>
        <?php } else {?>
        <li><a href="customer-mgmt.php?dact=<?php echo $select[$i]["id"];?>" style="background-image: none;float:left; text-decoration:none;">INACTIVE</a></li>
        <?php } ?>
      </ul>
    </div></div>

  <?php } ?>
  <?php   if(empty($select)){ echo '<div class="total-rez" align="center" style="font-weight:bold;width:898px;float:right; color:#090;">No Records Found</div>';} ?>
<div class="total-rez" style="width:898px;float: right;">
<div class="total-rez-left">Showing results 1 - <?php echo count($select) ;?> of <?php echo count($select)?></div>
<div class="total-rez-right"><?php echo $pager->renderFullNav();  ?></div>
</div>
</div>
<div class="right-part-1">
<input type="submit" name="delete" value="Delete" class="gray-btn" title="Delete" style="cursor:pointer;margin-left:300px;"  />
                
            </div>


</div>
<div class="cboth"></div>
</div>
<div class="cboth" style="height:120px"></div>

<?php include_once("inc/dash-footer.php");?>
<script type="text/javascript">
/*<![CDATA[*/
function chunchall(obj){
var checkB=document.getElementsByName('checkAll[]'), i=0, b, c;
b=obj.firstChild.nodeValue=='Check all'?true:false;
while(c=checkB[i++]){c.checked=b;}
obj.firstChild.nodeValue=b?'Uncheck all':'Check all';
}
/*]]>*/
</script>