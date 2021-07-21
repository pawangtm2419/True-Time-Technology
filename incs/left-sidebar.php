<div class="col-md-3 sidebar-area">
         <div class="sidebar">
          <h3 class="sidebar-title"><i class="fa fa-bars green-icons"></i> Products</h3>
           <ul id="accordions">
             <?php
              $selectfreetoair = mysql_query("select distinct category from product order by id asc");
			  while($selectfreetoair1 = mysql_fetch_array($selectfreetoair))
			  {
			  $categ = $selectfreetoair1['category'];
			  ?>
              <li><?php echo str_replace('_', ' ', $selectfreetoair1['category']);?></li>
               
              <ul>
              <?php
              $selectsub = mysql_query("select distinct category,sub_category,title_url from product where category = '$categ' order by id asc");
			  while($selectsub1 = mysql_fetch_array($selectsub))
			  {
			  ?>
              <li><a href='products.php?catg=<?php echo $selectsub1['category'];?>&&subcatg=<?php echo $selectsub1['sub_category'];?>&&titleurl=<?php echo $selectsub1['title_url'];?>'><span><?php echo $selectsub1['sub_category'];?></span></a></li>
              <?php } ?>
              </ul>
            <?php } ?> 
          </ul>
          </div>
          <?php
			$selectadvertise = mysql_query("select * from advertise where status = '1' order by id asc");
			while($selectadvertise1 = mysql_fetch_array($selectadvertise))
			{
			?>
             <!--ads-->
              <div class="ads">
               <a href="#">
                <img src="images/ads/<?php echo $selectadvertise1['image'];?>" alt="ads" />
               </a>
              </div>
              <!--end ads-->
			<?php } ?>
          
		</div>