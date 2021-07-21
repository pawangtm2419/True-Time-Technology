<?php
include("config/connection.php"); 
include("incs/country.php");
if($_SESSION['customerid']=="")
{
$_SESSION['redirect_to'] = $_SERVER['REQUEST_URI'];
 header('Location: login.php');
}
$customerid = $_SESSION['customerid'];
$selectdetail = mysql_query("select * from register where id = '$customerid'");
$selectdetail1 = mysql_fetch_array($selectdetail);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Account | Yousra Faishon</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
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
    <!-- start registration -->
    <div class="registration">
      <div class="registration_left">
        <h2>Checkout </span></h2>
        <div class="alert-danger"><?php echo $msg; ?></div>
        <div class="registration_form">
          <!-- Form -->
          <form id="registration_form" action="confirmation.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <div>
              <label>
              <input placeholder="first name:" name="fname" value="<?php echo $selectdetail1['fname'];?>" type="text" required autofocus>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="last name:" name="lname" value="<?php echo $selectdetail1['lname'];?>" type="text" required autofocus>
              </label>
            </div>
            <div class="sky-form">
              <div class="sky_form1">
                <ul>
                  <li>
                    <label class="radio left">
                    <input type="radio" value="male" name="gender" <?php if($selectdetail1['gender']=="male"){?>checked<?php } ?>>
                    <i></i>Male</label>
                  </li>
                  <li>
                    <label class="radio">
                    <input type="radio" value="female" name="gender" <?php if($selectdetail1['gender']=="female"){?>checked<?php } ?>>
                    <i></i>Female</label>
                  </li>
                  <div class="clearfix"></div>
                </ul>
              </div>
            </div>
            <div>
              <label>
              <input placeholder="email address:" name="email" type="email" value="<?php echo $selectdetail1['email'];?>" readonly="readonly" required>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="Mobile Number:" value="<?php echo $selectdetail1['mobile'];?>" maxlength="12" name="mobile" type="number" required>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="Address:" name="address" value="<?php echo $selectdetail1['address'];?>" type="text" required autofocus>
              </label>
            </div>
 
            <div>
              <label>
                <input placeholder="Country:" name="country" value="<?php echo $selectdetail1['country'];?>" type="text" required autofocus>
              </label>
            </div>
            <div>
              <label>
                <input placeholder="State:" name="state" value="<?php echo $selectdetail1['state'];?>" type="text" required autofocus>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="City name:" name="city" value="<?php echo $selectdetail1['city'];?>" type="text" required autofocus>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="Pin code:" name="pincode" value="<?php echo $selectdetail1['pincode'];?>" type="number" maxlength="6" required autofocus>
              </label>
            </div>
            <div>
              <input type="submit" name="submit" value="Checkout" id="register-submit">
            </div>
            
          </form>
          <!-- /Form -->
        </div>
      </div>
      
      <div class="clearfix"></div>
    </div>
    <!-- end registration -->
  </div>
</div>
<!-- footer_top -->
<?php require_once("$url"."incs/footer.php"); ?>
<script language="javascript">
	populateCountries("country", "state");
	populateCountries("country2");
</script>
</body>
</html>
