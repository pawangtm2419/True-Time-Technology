<div class="header_bg">
  <div class="container">
    <div class="header">
      <div class="logo col-md-4"> <a href="index.php"><img src="images/logo.png" alt=""/> </a> </div>
      <!-- start header_right -->
      <div class="header_right col-md-8">
        <div class="col-md-12 right-header">
          <!--right link +language -->
          <div class="col-md-10 header-links">
            <ul>
              <li><a href="#">
                <?php if($_SESSION['custFname']){ echo "Welcome -"; echo $_SESSION['custFname'];} ?>
                </a></li>
              <?php
                $FotrQuery = mysql_query("select * from pgs where manucatg='headerTop' order by id desc LIMIT 3");
                 while($FotrQuery1 = mysql_fetch_array($FotrQuery))
                 {?>
              <li><a href="pages.php?pgid=<?php echo $FotrQuery1['id']; ?>"><?php echo str_replace('_', ' ', $FotrQuery1['pagenmae']); ?></a></li>
              <?php }?>
              <?php
			   if($_SESSION['custEmail']){
               echo "<li><a href='myaccount.php'>My Account</a></li>";
			   } 
			  ?>
              <?php
			   if($_SESSION['custEmail']){
               echo "<li><a href='logout.php'>Logout</a></li>";
			   }else{
              // echo "<li><a href='login.php'>Login</a></li>";
			   }
			  ?>
              <li><a href="#" class="currency"> <?php echo $_SESSION['man']; ?></a></li>
            </ul>
          </div>
          <div class="col-md-2 language" style="display:none;">
            <div id="google_translate_element"> </div>
          </div>
        </div>
        <!--end right link +language -->
        <!--right search +register -->
        <div class="col-md-12 search-area">
          <div class="col-md-8 search">
            <form name="frm-search" action="product-search.php" method="post" enctype="multipart/form-data">
              <div class="col-md-9 search-box nopadding">
                <input type="search" name="srchkey" class="form-control" placeholder="Search Products " />
              </div>
              <div class="col-md-3 search-btn nopadding">
                <button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i> SEARCH</button>
              </div>
            </form>
          </div>
          <div class="col-md-3 nopadding registers pull-right">
          <div class="social-icons">
          <a href="#" target="_blank"><img src="http://truetimetechnology.com/images/social/insta.png" alt="Instagram" title="facebook"></a>
                      <a href="#" target="_blank"><img src="images/social/fb.jpg" alt="facebook" title="facebook"></a>             <a href="#" target="_blank"><img src="images/social/twitter.jpg" alt="facebook" title="facebook"></a>             <a href="#" target="_blank"><img src="images/social/linkdin.PNG" alt="facebook" title="facebook"></a>    			</div>
                       </div>
          <div class="col-md-2 nopadding registers pull-right countItems" style="display:none;">
          <div class="social-icons">
                      <a href="#" target="_blank"><img src="images/social/fb.jpg" alt="facebook" title="facebook"></a>             <a href="#" target="_blank"><img src="images/social/twitter.jpg" alt="facebook" title="facebook"></a>             <a href="https://www.linkedin.com/home?trk=nav_responsive_tab_home" target="_blank"><img src="images/social/linkdin.PNG" alt="facebook" title="facebook"></a>    			</div>
                       </div>
          <div class="cartbos" style="display:none;"> </div>
        </div>
        <!--end right search +register -->
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <!-- start header menu -->
  <div class="menu-area">
  <div class="container">
  <ul class="megamenu skyblue">
    <li><a href="index.php">Home</a></li>
    <?php 
		    $selectcategory = mysql_query("select *from product group by category");
			while($selectcategory1 = mysql_fetch_array($selectcategory))
			{ 
			$carts = $selectcategory1['category'];
			?>
    <li class="grid"> 
    <a style="width:100%;" href="products.php?catg=<?php echo $selectcategory1['category'];?>"><?php echo str_replace("_"," ",$selectcategory1['category']); ?></a>
      <!--dropdown-->
      <?php  echo "<div class='megapanel'><div class='row'>";  ?>
      <div class="col1" style="width:100%;">
      <div class="h_nav" style="width:100%;">
      <?php 
						echo "<ul style='width:100%;'>"; 
					    $selectsubcategory = mysql_query("select distinct category,sub_category,title_url from product where category = '$carts'");
						while($selectsubcategory1 = mysql_fetch_array($selectsubcategory))
						{ ?>
    <li><a href="products.php?catg=<?php echo $selectsubcategory1['category'];?>&&subcatg=<?php echo $selectsubcategory1['sub_category'];?>&&titleurl=<?php echo $selectsubcategory1['title_url'];?>" style="width:100%;"><?php echo str_replace("_"," ",$selectsubcategory1['sub_category']); ?></a></li>
    <?php } echo "</ul>"; ?>
    </div>
    </div>
    <?php echo "</div></div>";?>
    <!--end dropdown-->
    </li>
    <?php } ?>
    <?php
		    $menuCat ="main-manu";
		    $selectmenupgs = mysql_query("select * from pgs where manucatg='$menuCat' AND status = '1' order by id asc LIMIT 2");
			 while($selectmenupgs1 = mysql_fetch_array($selectmenupgs))
			 {?>
    <li><a href="pages.php?pgid=<?php echo $selectmenupgs1['id']; ?>"><?php echo $selectmenupgs1['pagenmae']; ?></a></li>
    <?php } ?>
    <li><a href="contact-us.php">Contact Us</a></li>
  </ul>
</div>
</div>
<!--end header menu -->
</div>