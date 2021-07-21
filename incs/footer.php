<div class="footer_top">
 <div class="container">
	<div class="span_of_4">
		<div class="span1_of_4">
			<h4>Links</h4>
			<ul class="f_nav">
              <?php
                $FotrQuery = mysql_query("select * from pgs where manucatg='footer-sec1' order by id desc LIMIT 10");
                 while($FotrQuery1 = mysql_fetch_array($FotrQuery))
                 {?>
				<li><a href="pages.php?pgid=<?php echo $FotrQuery1['id']; ?>"><?php echo str_replace('_', ' ', $FotrQuery1['pagenmae']); ?></a></li>
              <?php }?>
			</ul>	
		</div>
		<div class="span1_of_4">
			<h4>Products</h4>
			<ul class="f_nav">
			 <?php
                $FotrQuery = mysql_query("select distinct category from product order by id desc LIMIT 10");
                 while($FotrQuery1 = mysql_fetch_array($FotrQuery))
                 {?>
				<li><a href="products.php?catg=<?php echo $FotrQuery1['category']; ?>"><?php echo str_replace('_', ' ', $FotrQuery1['category']); ?></a></li>
              <?php }?>
			</ul>	
			</ul>				
			 
		</div>
		<div class="span1_of_4">
			<h4>Company</h4>
			<ul class="f_nav">
				<?php
                $FotrQuery = mysql_query("select * from pgs where manucatg='footer-sec3' order by id desc LIMIT 10");
                 while($FotrQuery1 = mysql_fetch_array($FotrQuery))
                 {?>
				<li><a href="pages.php?pgid=<?php echo $FotrQuery1['id']; ?>"><?php echo str_replace('_', ' ', $FotrQuery1['pagenmae']);; ?></a></li>
              <?php }?>
			</ul>
			 			
		</div>
		<div class="span1_of_4" style="color:#444;">
			<h4>Get In Touch</h4>
<?php
 $FotrQuerys = mysql_query("select * from contact");
$FotrQuery1s = mysql_fetch_array($FotrQuerys);
?>
			 <div class="col-md-12 nopadding">
			<p><strong> Call us:</strong> <?php echo $FotrQuery1s['phoneMain']; ?> </p>
            <p><strong> Email us:</strong>  <?php echo $FotrQuery1s['emailMain']; ?> </p>
		</div>
		     <div class="col-md-12 nopadding">
			<h4>follow us </h4>
			<div class="social-icons">
             <?php
				 $smoQuery = mysql_query("select *from social where status='1'"); 		
				 while($smoQuery1 = mysql_fetch_array($smoQuery))	 
				 {?>
         <a href="<?php echo $smoQuery1['social_link']; ?>" target="_blank"><img src="images/social/<?php echo $smoQuery1['image']; ?>" alt="facebook" title="facebook"  /></a>    <?php } ?>
			</div>
		</div>
		</div>
		<div class="clearfix"></div>
		</div>
  </div>
</div>
<!-- footer -->
<div class="footer">
 <div class="container">
	<div class="copy">
<p class="link">Copyright &copy; 2020, True Time Technology, All rights reserved.|Designed by <a href="www.itpiller.in">ITPiller</a></p>
	</div>
 </div>
</div>
 