<?php include("config/connection.php"); 
$product_id = $_REQUEST['product_id']; 
$seoQuery = mysql_query("select *from seo where pageId='3' AND status='1'");
$seoQuery1 = mysql_fetch_array($seoQuery); 
$seoQuery2 = mysql_query("select *from product where id = '$product_id' AND status='1'");
$seoQuery3 = mysql_fetch_array($seoQuery2);  			 
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $seoQuery3['category']." | ";  echo $seoQuery3['sub_category']." | "; if($seoQuery1){ echo $seoQuery1['title']; } else { echo "Omsarvainternational.com";}?></title>
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
<link rel="stylesheet" href="<?php echo $url; ?>css/picbox.css" media="all" />
<script type="text/javascript" src="<?php echo $url; ?>js/picbox.js"></script>
<!-- start carousel -->
<!-- start menu -->
<script src="<?php echo $url; ?>js/menu_jquery.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/megamenu.js"></script>
<?php require_once("$url"."incs/scripts.php"); ?>
<!-- start carousel -->
<script type="text/javascript" src="<?php echo $url; ?>js/owl.carousel.js"></script>
<!-- custom -->
<script src="<?php echo $url; ?>js/jquery-ui.min.js"></script>
<script src="js/scripts.js"></script>
<!-- start slider -->
<link rel="stylesheet" href="css/lightslider.css">
<script src="js/lightslider.js"></script>
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
        <?php	
			 $selectproduct = mysql_query("select * from product where id = '$product_id'");
			 $selectfreetoairproduct1 = mysql_fetch_array($selectproduct);
			 $disply_product_image = str_replace(' ', '_', $selectfreetoairproduct1["sub_category"]);
			 $sliderimage1 = $selectfreetoairproduct1['category'];
			 $sliderimage2 = $selectfreetoairproduct1['product_image'];
			 $hideproduct = $selectfreetoairproduct1['id'];
			?>
        <div class="col-md-6  min-hieght" style="background:#FFF; padding:5px;">
          <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
            <li data-thumb="images/products/<?php echo $sliderimage1; ?>/<?php echo $disply_product_image ; ?>/70+70_<?php echo $sliderimage2 ; ?>"> <a rel="lightbox-demo" href="images/products/<?php echo $sliderimage1; ?>/<?php echo $disply_product_image ; ?>/600+600_<?php echo $sliderimage2 ; ?>" title="Faishion"> <img src="images/products/<?php echo $sliderimage1; ?>/<?php echo $disply_product_image ; ?>/600+600_<?php echo $sliderimage2 ; ?>" /> </a> </li>
            <?php 
				$selectmultiimage = mysql_query("select * from multiimage where uid = '$product_id'");
				while($selectmultiimage1 = mysql_fetch_array($selectmultiimage))
				{
				?>
            <li data-thumb="<?php echo str_replace('../', '', $selectmultiimage1['imagepath']);?>"> <a rel="lightbox-demo" href="<?php echo str_replace('../', '', $selectmultiimage1['imagepath']);?>" title="Faishion"> <img src="<?php echo str_replace('../', '', $selectmultiimage1['imagepath']);?>" /> </a> </li>
            <?php }?>
          </ul>
        </div>
        <!--description -->
        <div class="col-md-6 min-hieght" style="background:#FFF; padding:5px;">
          <div class="desc1">
            <h3><?php echo $selectfreetoairproduct1['product_name'];?><span></h3>
            <span><strong></strong> <?php echo number_format($selectfreetoairproduct1['sale_price'],2);?> <i class=""></i></span><br/>
            <span class="regPrice"><strong>Reg. Price :</strong> <?php echo number_format($selectfreetoairproduct1['reg_price'],2);?> <i class="fa fa-usd"></i></span> <?php echo html_entity_decode($selectfreetoairproduct1['overview'],ENT_QUOTES); ?>
            <div class="btn_form"> <a href="contact-us.php" class="btn read-more btn-sm btn-primary"style="color: #fff;background: #106e9c;">Get quote</a></div>
          </div>
          <div class="call-md-12"> </div>
          <!--end social share-->
        </div>
        <div class="specification" style="margin-top:30px; background:#FFF; padding:5px; font-size:10px;">
          <!--<span style="font-size:12px; font-weight:bold;">Overview</span><br/><br/> -->
        </div>
        <div class="specification" style="margin-top:0px;background:#FFF;  padding:20px 5px 5px;font-size:10px;"> <span style="font-size:12px; font-weight:bold;">Specification</span><br/>
          <br/>
          <?php echo html_entity_decode($selectfreetoairproduct1['specification'],ENT_QUOTES); ?> </div>
      </div>
      <!--end content -->
      <!--- ================== end content ================== -->
      <form name="frm-product" action="" method="post" enctype="multipart/form-data">
        <!--posting data-->
        <input type="hidden" class="pimg<?php echo $selectfreetoairproduct1['id'];?>" name="pimg" value="images/products/<?php echo $sliderimage1; ?>/<?php echo $disply_product_image ; ?>/70+70_<?php echo $sliderimage2 ; ?>"  />
        <input type="hidden" class="pname<?php echo $selectfreetoairproduct1['id'];?>" name="pname" value="<?php echo $selectfreetoairproduct1['product_name'];?>" />
        <input type="hidden" class="pasale<?php echo $selectfreetoairproduct1['id'];?>" name="pasale" value="<?php echo $selectfreetoairproduct1['sale_price'];?>" />
        <input type="hidden" class="pareg<?php echo $selectfreetoairproduct1['id'];?>" name="pareg" value="<?php echo $selectfreetoairproduct1['reg_price'];?>" />
        <input type="hidden" class="quantity<?php echo $selectfreetoairproduct1['id'];?>" name="quantity" value="1" />
      </form>
      <!--end postion date-->
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!-- footer_top -->
<?php require_once("$url"."incs/footer.php"); ?>
</body>
</html>