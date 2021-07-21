<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
 

$active = $_REQUEST['active'];
if($active)
{
$updatestatus = mysql_query("update product set hstatus = '0' where category = '$active'");
}
$dactive = $_REQUEST['dactive'];
if($dactive)
{
$updatestatus = mysql_query("update product set hstatus = '1' where category = '$dactive'");
}
?>
<div class="holder">
<?php include_once("inc/dash-header.php");?> 	
<div class="cboth"></div>
<div class="cantenar">			
<div class="cantent">
<h1>Main Page Product Manage</h1>
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
            <form name="frm1" method="post">
                   
                     <div class="link-name-box menu_bar" style="width: 900px;float:right;height:40px;">
           
                
                <span class="block" style="width:650px; ">Category</span>
                    <span class="apply-icons" style="width:7%;">Modify</span>
                       </div>
            
            <?php
            $query = "select distinct category,hstatus from product order by id desc";
	    $pager = new PS_Pagination($query, rows_per_page, links_per_page,  "");
	    $rSet = $pager->paginate();
	    $select = $db->fetchAssoc($rSet);
            for($i=0;$i<count($select);$i++) {
	    ?>
            <div class="grid-box-data" style="width:898px;float:right;">
                <span class="block" style="width:650px; ;">
                  <?php echo $select[$i]["category"];?></span>
          
              <div class="apply-icons-1" style="width:7%;">
                 <ul>
                        <?php if($select[$i]["hstatus"]==1){?>
                        <li><a href="mainpgs-mgmt.php?active=<?php echo $select[$i]["category"];?>" style="background-image: none;float:left; text-decoration:none;">ACTIVE</a></li><?php } else {?>
                        <li><a href="mainpgs-mgmt.php?dactive=<?php echo $select[$i]["category"];?>" style="background-image: none;float:left; text-decoration:none;">INACTIVE</a></li>
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



</div>
<div class="cboth"></div>
</div>
<div class="cboth" style="height:120px"></div>

<?php include_once("inc/dash-footer.php");?>