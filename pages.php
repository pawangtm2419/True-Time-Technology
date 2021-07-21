<?php include("config/connection.php"); 
 $pgids = $_GET['pgid'];
 $seoQuery = mysql_query("select *from seo where pageId='$pgids' AND status='1'");
 $seoQuery1 = mysql_fetch_array($seoQuery);  			 
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php if($seoQuery1){ echo $seoQuery1['title']; } else { echo "True Time Technology";}?></title>
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
   includedLanguages: 'en,hi'
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
			 $proQuery = mysql_query("select *from pgs where id='$pgids' AND status='1'");
			 $proQuery1 = mysql_fetch_array($proQuery);  
			 ?>
          <!--- ================== content ================== -->
            <div class="products">
                    <div class="filters">
                        <a href="#"><h4><?php echo $proQuery1['pagenmae']; ?></h4></a>
                         
                         <div class="clearfix"></div>	
                    </div>
                    <!-- product grid -->
				 <div class="desc-pro">
                    
                     <?php echo html_entity_decode($proQuery1['description'],ENT_QUOTES); ?>
                    
                  </div>
                         
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