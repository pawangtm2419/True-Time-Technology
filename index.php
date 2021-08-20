<?php
 include("config/connection.php");		 
 $seoQuery = mysql_query("select *from seo where pageId='1' AND status='1'");
 $seoQuery1 = mysql_fetch_array($seoQuery);  			 
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  <link rel="manifest" href="manifest.json">
  <title><?php if($seoQuery1){ echo $seoQuery1['title']; } else { echo "True Time Technology";}?></title>
  <meta name="description" content="<?php echo $seoQuery1['description']; ?>">
  <meta name="keywords" content="<?php echo $seoQuery1['keyword']; ?>">
  <link rel="Icon" href="favicon.ico" type="image/x-icon">
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
  <script type='text/javascript' src="<?php echo $url; ?>js/jquery-1.11.1.min.js"></script>
  <link href="<?php echo $url; ?>css/style.css" rel='stylesheet' type='text/css'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo $url; ?>css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo $url; ?>css/megamenu.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="<?php echo $url; ?>css/flexslider.css" media="all">
  <link type="text/css" rel="stylesheet" href="<?php echo $url; ?>css/owl.carousel.css" media="screen">
  <script src="<?php echo $url; ?>js/menu_jquery.js"></script>
  <script type="text/javascript" src="<?php echo $url; ?>js/megamenu.js"></script>
  <script type="text/javascript" src="<?php echo $url; ?>js/owl.carousel.js"></script>
  <script src="<?php echo $url; ?>js/jquery-ui.min.js"></script>
  <script src="js/scripts.js"></script>
  <?php require_once("$url"."incs/scripts.php"); ?>
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
  <div class="container-fluid">
    <div class="main">
      <div class="content_top">
        <?php //require_once("$url"."incs/left-sidebar.php"); ?>
        <div class="main-content">
        <div class="col-md-12" style="padding:5px 0;">
        <div class="col-md-9" style="padding:0;">
          <!-- start slider -->
          <div class="flexslider">
            <ul class="slides">
          <?php
            $selectbanner = mysql_query("select * from banner where status = '1' order by id desc");
            while($selectbanner1 = mysql_fetch_array($selectbanner)) {
            ?>  
              <li> <img src="images/banner/800+400_<?php echo $selectbanner1['banner'];?>" alt="">
                <!-- <div class="desc">
                  <div class="container">
                    <h2 class="title">Outsourced Marketing Department for the MSME's.</h2>
                    <p>- We help you overcome the new challenges in Sales & Marketing.</p>
                  </div>
                </div>-->
              </li>          
            <?php } ?>
            </ul>
          </div>
          <!-- end  slider -->
        </div>
        <div class="col-md-3" style="padding:0;">
          <?php
              $selectadvertise = mysql_query("select * from advertise where status = '1' order by id asc");
              while($selectadvertise1 = mysql_fetch_array($selectadvertise)) {
            ?>
              <!--ads-->
                <div class="ads">
                <a href="#">
                  <img src="images/ads/<?php echo $selectadvertise1['image'];?>" alt="ads">
                </a>
                </div>
                <!--end ads-->
        <?php } ?>
        </div>
        </div>
          <div class="contents">
            <form name="frm-product" action="" method="post" enctype="multipart/form-data">
            <?php 
              $proCat = mysql_query("select distinct category from product where hstatus = '1' order by id asc");
              if(empty($proCat)) {
                echo "No Data Found !";
              } else {
                while($proCat1 = mysql_fetch_array($proCat)) {
                $catg = $proCat1['category'];
              ?>
            <!--carsual item-->
            <div class="products">          
              <h3 class="title-heading"><i class="fa fa-bars green-icons"></i> <?php echo str_replace('_', ' ', $catg); ?></h3>
              <div class="owl-portfolio owl-carousel">
                <?php
                  $proQuery = mysql_query("select * from product where category = '$catg' order by id desc");
                  while($proQuery1 = mysql_fetch_array($proQuery))
                  {
                  $proImg = str_replace(' ', '_', $proQuery1['sub_category']);
                  ?>
                <!--item-->
                <div class="item"> <a href="product-detail.php?product_id=<?php echo $proQuery1['id'];?>">
                  <div class="entry"> 
                  <img src="images/products/<?php echo $proQuery1['category'];?>/<?php echo $proImg;?>/250+250_<?php echo $proQuery1['product_image'];?>" class="proImg" data-src="images/products/<?php echo $proQuery1['category'];?>/<?php echo $proImg;?>/250+250_<?php echo $proQuery1['product_image'];?>" alt=""> 
                  </div>
                  </a>
                  <div class="image-caption">
                    <h3 class="owl-title">
                    <a href="product-detail.php?product_id=<?php echo $proQuery1['id'];?>"><?php echo $proQuery1['product_name'];?></a>
                    </h3>
                    <div class="meta">
                      
                      <div class="price"><i class="fa fa-usd"></i> <?php echo number_format($proQuery1['sale_price'], 2);?></div>
                      <div class="regprice"><i class="fa fa-usd"></i> <?php echo number_format($proQuery1['reg_price'], 2);?></div>
                    </div>  
                    <div class="owl-carousel-btn">
                    <a href="contact-us.php" class="btn read-more btn-sm btn-primary"style="color: #fff;background: #106e9c;">Get quote</a>
                    </div>
                  </div>
                  <!-- image caption -->
                </div>
                <!--/ item -->
                <?php } ?>
              </div>
            </div>
            <!--end carsual item-->
            </form>
            <?php }} ?>
          </div>
          <!--- ================== end content ================== -->
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <!-- footer_top -->
  <?php require_once("$url"."incs/footer.php"); ?>
  <!-- start slider -->
  <script src="<?php echo $url; ?>js/jquery.flexslider.js"></script>
  <script type="text/javascript">
    $('.flexslider').flexslider({
    animation: "fade",
    controlNav: true,
    start: function(slider) {
      $('body').removeClass('loading');
    }
    });
  </script>
  <script src="js/main.js"></script>

  </body>
</html>
