<?php include("config/connection.php"); 
 $catg = $_GET['catg'];
 $subcatg = $_GET['subcatg'];
 $titleurl = $_GET['titleurl'];
 $seoQuery = mysql_query("select *from seo where pageId='4' AND status='1'");
 $seoQuery1 = mysql_fetch_array($seoQuery);  			 
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $catg." | "; echo $subcatg." | ";   if($seoQuery1){ echo $seoQuery1['title']; } else { echo "Omsarvainternational.com";}?></title>
<meta name="description" content="<?php echo $seoQuery1['description']; ?>" />
<meta name="keywords" content="<?php echo $seoQuery1['keyword']; ?>" />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="<?php echo $url; ?>js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="<?php echo $url; ?>css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- font awesome -->
<link href="<?php echo $url; ?>css/font-awesome.css" rel="stylesheet">
<link href="<?php echo $url; ?>css/font-awesome.min.css" rel="stylesheet">
<!-- start menu -->
<link href="<?php echo $url; ?>css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<!-- start slider -->
<link rel="stylesheet" href="<?php echo $url; ?>css/fwslider.css" media="all">
<!-- start carousel -->
<link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/owl.carousel.css" media="screen" />
<!-- start menu -->

<script src="<?php echo $url; ?>js/menu_jquery.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/megamenu.js"></script>
 
<!-- start carousel -->
<script type="text/javascript" src="<?php echo $url; ?>js/owl.carousel.js"></script>
<!-- custom -->
<script src="<?php echo $url; ?>js/jquery-ui.min.js"></script>
<script src="js/scripts.js"></script>
<?php require_once("$url"."incs/scripts.php"); ?>
<!-- start slider -->
<script src="<?php echo $url; ?>js/fwslider.js"></script>
<!--language -->
<script type="text/javascript">
function googleTranslateElementInit() {
 new google.translate.TranslateElement({
   pageLanguage: 'en',
   includedLanguages: 'af,sq,ar,hy,az,eu,be,bg,ca,zh-CN,zh-TW,hr,cs,da,nl,en,et,tl,fi,fr,gl,ka,de,el,ht,iw,hi,hu,is,id,ga,it,ja,ko,lv,lt,mk,ms,mt,no,fa,pl,pt,ro,ru,sr,sk,sl,es,sw,sv,th,tr,uk,ur,vi,cy,yi'
 }, 'google_translate_element');
}
</script>

<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
 
<!-- header -->
<?php require_once("$url"."incs/header.php"); ?>
<!--end header-->

<!-- content -->
<div class="container">
  <div class="main">
	<div class="content_top">
    <?php require_once("$url"."incs/left-sidebar.php"); ?>	
    	<div class="col-md-9 main-content">
          
          <!--- ================== content ================== -->
            <div class="products">
                    <div class="filters">
                    <?php
					 $proCount = 0;
					if($subcatg=="")
					 {
					 $coutQuery = mysql_query("select * from product where category='$catg' order by id desc");
					 }
					 else
					 {
					 $coutQuery = mysql_query("select * from product where category='$catg' AND sub_category ='$subcatg'  order by id desc");
					 }
					 while($coutQuery1 = mysql_fetch_array($coutQuery))
					 {
					 $proCount +=1;
					 }
					 
					?>
                        <a href="#"><h4><?php echo str_replace("_"," ",$catg); ?>  <span><?php if($subcatg){echo "- ".$subcatg;} ?> </span> </h4></a>
                            <ul class="w_nav">
                                    <li>Find Products- <span><?php echo $proCount; ?> Items</span> </h4></li>
                                   <!-- <li> <select class="form-control">
                                     <option value="">Low-Height</option>
                                     <option value="">Hight-Low</option>
                                    </select></li> 
                                    <div class="clear"></div>-->	
                         </ul>
                         <div class="clearfix"></div>	
                    </div>
                    <!-- product grid -->
							<?php
							if($subcatg=="")
							 {
							 $proQuery = mysql_query("select * from product where category='$catg' order by id desc");
							 }
							 else
							 {
							 $proQuery = mysql_query("select * from product where category='$catg' AND sub_category ='$subcatg'  order by id desc");
							 }
							 while($proQuery1 = mysql_fetch_array($proQuery))
							 {
							 $proImg = str_replace(' ', '_', $proQuery1['sub_category']);
							 ?>
                           <!-- item -->
                            <div class="grid1_of_4">
                                <div class="content_box"> 
                                  <div class="view view-fifth">
                                     <a href="product-detail.php?product_id=<?php echo $proQuery1['id'];?>">
                                     <img src="images/products/<?php echo $proQuery1['category'];?>/<?php echo $proImg;?>/250+250_<?php echo $proQuery1['product_image'];?>" class="lazyOwl" width="100%" alt="<?php echo $proQuery1['product_image'];?>"/>
                                     </a>
                                   </div>
                                   <div class="image-caption">
                                      <h3 class="owl-title"><a href="product-detail.php?product_id=<?php echo $proQuery1['id'];?>"><?php echo $proQuery1['product_name'];?></a></h3>
                                      <div class="meta">
                                         <div class="detail"><?php $overviews = $proQuery1['overview']; echo substr($overviews, 0,100);?>...</div>
                                         <div class="price"><i class="fa fa-usd"></i> <?php echo $proQuery1['sale_price'];?></div>
                                         <div class="regprice"><i class="fa fa-usd"></i> <?php echo $proQuery1['reg_price'];?></div>
                                      </div>  
                                      <div class="owl-carousel-btn" style="color: #fff;background: #106e9c;">
                                       <a href="contact-us.php" class="btn read-more btn-sm btn-primary"style="color: #fff;background: #106e9c;">Get quote</a>
                                      </div>
                                   </div>
                                    <div class="clearfix"></div>
                                </div>
                              <div class="clearfix"></div>
                            </div>
                           <!-- end item -->
                         <?php }  ?>  
                            
                         
                    <!-- end product grid -->
                        
               <div class="clearfix"></div>	
            </div>
          <!--- ================== end content ================== -->
            			
		</div>
		<div class="clearfix"></div>
	</div>
  </div>
</div>
<!-- footer_top -->
<?php require_once("$url"."incs/footer.php"); ?>	
</body>
</html>