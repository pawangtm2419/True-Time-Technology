<?php
 include("config/connection.php");		 
 $seoQuery = mysql_query("select *from seo where pgs_name='query' AND status='1'");
 $seoQuery1 = mysql_fetch_array($seoQuery);  
 // contact detail
 $mailQuery = mysql_query("select *from contact where status='1'");
 $mailQuery1 = mysql_fetch_array($mailQuery);
 $cphone = $mailQuery1['phoneMain'];
 $cemail = $mailQuery1['emailMain'];
 $ccomp = $mailQuery1['compName'];
 
// email sending
 $name = $_POST['name'];
 $comp =$_POST['company_name'];
 $email =$_POST['email'];
 $article =$_POST['article'];
 $phone =$_POST['phone'];
 $message =$_POST['message'];
 
 if(isset($_POST['submit']))
  {
  $body ='<html>
	   <head>
	   </head>
	     <body>
		   <table border="0" width="560" style="border:1px solid #DDDDDD; padding:2px;" cellpadding="5" cellspaccing="5">
			<tr><td width="40%"><a href="'.$url.'">
			<img src="'.$url.'images/logo.png" alt="logo" height="60" /></a></td>
			<td></td>
			<td><span style="line-height:23px;"><strong style="color:#FF0000;">Email Us: </strong>'.$cemail.'</span><br/>
			<span style="line-height:23px;"><strong style="color:#FF0000;">Call Us: </strong>'.$cphone.'</span></td>
			</tr>
			<tr><td colspan="3"><div style="height:1px; width:100%; background:#DDD;"></div></td></tr>
			<tr><td>Name </td><td>:</td><td>'.$name.'</td></tr>
			<tr><td width="40%">Name</td><td width="50">:</td><td>'.$comp.'</td></tr>
			<tr><td>Email </td><td>:</td><td>'.$email.'</td></tr>
			<tr><td>Phone </td><td>:</td><td>'.$phone.'</td></tr>
			<tr><td>Message </td><td>:</td><td>'.$message.'</td></tr>
			<tr><td><br/><br/><strong style="font-size:20px;">Regards</strong> <br/>
			 <span>'.$ccomp.'</strong><br/>
			 <span><strong>Call Us:</strong> '.$cphone.'</span><br/>
			 <span><strong>Email Us:</strong> '.$cemail.'</span><br/><br/><br/>
			</td><td>:</td><td></td></tr>
			<tr><td colspan="3" valign="middle"><div style=" padding:20px 0; border-top:1px solid #DDD; font-size:10px; width:100%; background:#DDD; text-align:center;">
		 Copyright &copy; 2015, All Rights Reserved By - '.$ccomp.'.
		 </div></td></tr>
	   </table>
	</body>
	</html>';
	//to send HTML mail, the Content-type header must be set:
	$headers='MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.$name.'' . "\r\n";
	$to = 'info@truetimetechnology.com';
	$subject = " ".$ccomp."  - Sign Up";
	//mail function
	$mail = mail($to, $subject, $body, $headers);
	 if(!$mail) {   
		$msg = "<h4 style='color:#00AA00; margin-bottom:20px;'>Error ! <span style='color:#FF6600;'>Please Try Again !</span></h4>"; 
	    } else {
        $msg = "<h4 style='color:#00AA00; margin-bottom:20px;'>Thank You,<span style='color:#FF6600;'> Your information has been sent.!</span></h4>";  
       }

 //end email sending
 }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>
<?php if($seoQuery1){ echo $seoQuery1['title']; } else { echo "truetimetechnology.com";}?>
</title>
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
        <!--- ================== content ================== -->
        <div class="products"style="background: #fff;">
          <div class="filters"> <a href="#">
            <h4>Contact Us</h4>
            </a>
            <div class="clearfix"></div>
          </div>
          <!-- product grid -->
          <div class="desc-pro">
            <?php				 
					 $proQuery1 = mysql_query("select *from contact where status='1'");
					 while($proQuery11 = mysql_fetch_array($proQuery1))
					 {
					 $fax = $proQuery11['fax'];
					 ?>
            <div class="col-md-12" style="border-bottom:1px dashed #DDD; margin-bottom:10px; padding-bottom:1em;">
              <h3 class="text-success"><?php echo $proQuery11['compName']; ?></h3>
              <ul class="list-unstyled">
                <li><?php echo html_entity_decode($proQuery11['compAddress'],ENT_QUOTES); ?></li>
                <li><strong class="text-success">Call Us :</strong> <?php echo $proQuery11['phoneMain']; ?><?php echo ', '.$proQuery11['phone']; ?></li>
                <li><strong class="text-success">Email Us :</strong> <?php echo $proQuery11['emailMain']; ?><?php echo ', '.$proQuery11['email']; ?></li>
                <?php if($fax){ echo "<li><strong class='text-success'>Fax No. :</strong> ".$proQuery11['fax'].'</li>'; } ?>
              </ul>
            </div>
            <?php }?>
          </div>
          <div class="desc-pro">
            <div class="filters"> <a href="#">
              <h4 style="text-transform:capitalize;">Get In Touch For Help</h4>
              </a>
              <div class="clearfix"></div>
            </div>
            <form name="conatct" action="?"  autocomplete="off" class="col-md-10 formFld nopadding" style="margin-top:20px;" method="post">
              <?php echo $msg; ?>
              <div class="col-md-12 form-group">
                <div class="col-md-4">Name :</div>
                <div class="col-md-8">
                  <input class="form-control" name="name" type="text" placeholder="Enter name" required="required" onKeyPress="return OnlyLetters(event);" />
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="col-md-4">Company Name :</div>
                <div class="col-md-8">
                  <input class="form-control" name="company_name" type="text" placeholder="Enter company name" required="required" />
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="col-md-4">Email:</div>
                <div class="col-md-8">
                  <input class="form-control" name="email" type="email" placeholder="Enter email Address" required="required" />
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="col-md-4">Article:</div>
                <div class="col-md-8">
                  <input class="form-control" name="article" type="article" placeholder="Enter article Number" required="required" />
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="col-md-4">Contact Number:</div>
                <div class="col-md-8">
                  <input class="form-control" name="phone" type="text" maxlength="15" placeholder="Enter contact nubmber" required="required" onKeyPress="return OnlyNumbers(event);" />
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="col-md-4">Quantity:</div>
                <div class="col-md-8">
                  <input class="form-control" name="quantity" type="quantity" placeholder="Quantity" required="required" />
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="col-md-4">Brief Description:</div>
                <div class="col-md-8">
                  <textarea cols="0" rows="0" class="form-control" name="message" placeholder="Enter some description here ..."></textarea>
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="col-md-4">&nbsp;</div>
                <div class="col-md-8">
                  <input id="submit" type="submit" name="submit" class="btn btn-success" value="Send Now !"  />
                </div>
              </div>
            </form>
          </div>
          <div class="container">
            <iframe src="" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
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