<?php include("config/connection.php"); ?>
<?php
$email = $_POST['email'];
if(isset($_POST['submit']))
{
$selectregister = mysql_query("select * from register where email = '$email' && status = '1'");
$selectregister1 = mysql_fetch_array($selectregister);
$pass = $selectregister1['password'];
if(mysql_num_rows($selectregister)>0)
{
$to = $email;

//Place here all field which you want to send 
$password = $pass;
//Subject which you want to send
$subject = "Forgot Password";

//By which mail id, you send  mail write here
$from = "$email";
  
//Detail fields write here
$body = "
PASSWORD        : $password";

//Print message which you want to print here
//echo "<div id=\"submitmessage\">Your enquery Sent successfuly!</div>";

//Check mail sent or not here
if(mail($to, $subject, $body, $from))
{
$mesage = "Password sent your registered email id";
}
//echo "Please fill all Fields.";
}
else
{
$mesage = "Incorrect Email Id";
}
}
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
        <h2>Forgot Your Password</h2> 
        <div class="alert-danger"><?php echo $mesage; ?></div>
        <div class="registration_form">
       
          <!-- Form -->
          <form id="registration_form" action="" method="post"  enctype="multipart/form-data" autocomplete="off">
            <div>
              <label>
              <input placeholder="email:" type="email" name="email" required>
              </label>
            </div>
            <div>
              <input type="submit" name="submit" value="Submit" id="register-submit">
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
