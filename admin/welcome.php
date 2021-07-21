<?php
include_once("inc/body.php");
include_once("admin/inc/checksession.inc.php");
?>
<div class="holder" style="background-color: black;">
    <?php include_once("inc/dash-header.php"); ?> 	
    <div class="cboth"></div>
    <div class="cantenar">
        <div class="cantent" style="border:0px solid;">
            <h1 style="color:white;">Dashboard</h1>
            <span class="footer-line"></span>
            <?php if ($_SESSION['msg1']) {
                echo '<div class="infomsg" style="cursor:pointer">' . $_SESSION['msg1'] . '</div>';
                $_SESSION['msg1'] = '';
                unset($_SESSION['msg1']);
            } ?>
          <br/><br/><br/>
            <br/><br/><br/><br/><br/><br/>
             <?php //include_once 'inc/left.php'; ?>        
            <div class="quick" style="width:950px;"><span style="margin-left: 10px;">Quick Access</span></div>
            <?php 
                                if(strtolower($_SESSION['admin_type'])==strtolower('Admin')){                                
                                ?>
                                <style type="text/css">
                                .menu_bar ul li{ width:150px; height:160px !important;}
                                </style>
            <div class="link-name-box menu_bar" style="width: 950px;float:right;height: 600px;">
                
                                <ul>
                                <li><a href="change-password.php"><img src="images/write.png" alt="" title="change password" /><br/><br/><br/><span style="color:black;">Change Password</span></a></li>
                                <li><a href="banner-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Banner Management</span></a></li>
                                <li><a href="category-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Category/Subcategory Management</span></a></li> 
                                <li><a href="product-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Product Management</span></a></li>
                                <li><a href="pgs-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Page Management</span></a></li> 
                              
                                <li><a href="advertise-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Advertise Management</span></a></li>
                               
                                   <li><a href="social-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Social Link Management</span></a></li>
                                <li><a href="seo-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">SEO Management</span></a></li>
                                <li><a href="contact-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Contacts Management</span></a></li>
                                <li><a href="order-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Customer Order Management</span></a></li>
                                <li><a href="customer-mgmt.php" style="margin-right: 0px;"><img src="images/write.png" alt="" title="" /><br/><br/><br/><span style="color:black;">Customer Management</span></a></li>
                                 </ul>  
                
            </div>
            
		 
            <?php }
            if(strtolower($_SESSION['admin_type'])==strtolower('HR')){
            ?>
            <div class="link-name-box menu_bar" style="width: 900px;float:right;height: 140px;">
                
                                <ul>
                                    <li><a href="change-password.php"><img src="images/write.png" alt="" title="change password" /><br/><br/><br/><span style="color:black;">Change Password</span></a></li>
                                      <li><a href="job-mgmt.php"><img src="images/write.png" alt="" title="Job Mgmt" /><br/><br/><br/><span style="color:black;">Job Mgmt</span></a></li>
                                      <li><a href="apply-mgmt.php"><img src="images/write.png" alt="" title="Job Apply Mgmt" /><br/><br/><br/><span style="color:black;">Job Apply Mgmt</span></a></li>
                                
                                </ul>
            </div>
            <?php } ?>
        </div> 
    </div>
    <div class="cboth"></div>
</div>
<div class="cboth" style="height:120px"></div>

<?php include_once("inc/dash-footer.php"); ?>