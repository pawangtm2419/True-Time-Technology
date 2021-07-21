<?php
include("config/connection.php"); 
include("incs/country.php");
/// registration =====> 
if(isset($_POST['register']))
{
$added_date = date("Y-m-d H:i:s");
$modified_date = date("Y-m-d H:i:s");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$preMatch = mysql_query("select email from register where email = '$email'");
$preMatch1 = mysql_fetch_array($preMatch);
$preEmail = $preMatch1['email'];
	if($preEmail != $email)
	{
	$queryReg=mysql_query("insert into register(fname, lname, gender, email, mobile, address, pincode, country, state, city, password, cpassword, added_date, modified_date) values ('$fname', '$lname', '$gender','$email', '$mobile', '$address', '$pincode', '$country', '$state', '$city', '$password','$cpassword', '$added_date', '$modified_date')");
		if(queryReg)
		{
		$msg = "You have registered successfully !";
		}
    }
	else
	{
	$msg = "This email id already exists";
	}
}

// login ===========>
 if(isset($_POST['login']))
 {  
        $emails = $_POST['emails'];
	$userinfo = $_SESSION['mzs'];
        $passwords = md5($_POST['passwords']);
	$loginQuery = mysql_query("SELECT * FROM register WHERE email='$emails' AND password='$passwords'");
	$fetchData = mysql_fetch_array($loginQuery);
	$preEmails = $fetchData['email'];
	if($preEmails == $emails)
	{
	$updateCart = mysql_query("update cart SET usremail='$preEmails' WHERE  userinfo='$userinfo'");
	$_SESSION['custFname'] = $fetchData['fname'];
	$_SESSION['custEmail'] = $fetchData['email'];
	$_SESSION['customerid'] = $fetchData['id'];
	//header('loaction:index.php');
	}
	else
	{
	$lmsg = "You are not a registered member, Please register first !";
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
        <h2>New user? <span> Create a shoppe account </span></h2>
        <div class="alert-danger"><?php echo $msg; ?></div>
        <div class="registration_form">
          <!-- Form -->
          <form id="registration_form" action="#" method="post" autocomplete="off" enctype="multipart/form-data">
            <div>
              <label>
              <input placeholder="first name:" name="fname" type="text" required autofocus>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="last name:" name="lname" type="text" required autofocus>
              </label>
            </div>
            <div class="sky-form">
              <div class="sky_form1">
                <ul>
                  <li>
                    <label class="radio left">
                    <input type="radio" value="male" name="gender">
                    <i></i>Male</label>
                  </li>
                  <li>
                    <label class="radio">
                    <input type="radio" value="female" name="gender">
                    <i></i>Female</label>
                  </li>
                  <div class="clearfix"></div>
                </ul>
              </div>
            </div>
            <div>
              <label>
              <input placeholder="email address:" name="email" type="email" required>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="Mobile Number:" maxlength="12" name="mobile" type="number" required>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="Address:" name="address" type="text" required autofocus>
              </label>
            </div>
 
            <div>
              <label>
                <select id="country" name="country" required>
                 <option value="">Select Country</option>
                 <?php foreach($countries as $key => $value){ ?>
					<option value="<?php echo $value; ?>"<?php if($selectdetail1['country'] == $value) echo 'selected';?>><?php echo $value; ?></option>
			     <?php }	?>
                </select>
              </label>
            </div>
            <div>
              <label>
                <select id="state" name="state" required>
                 <option value="">Select State</option>
                 <?php foreach($countries as $key => $value){ ?>
                   <option value="<?php echo $value; ?>"<?php if($selectdetail1['state'] == $value) echo 'selected';?>><?php echo $value; ?></option>
                   <?php }  ?>
                </select>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="City name:" name="city" type="text" required autofocus>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="Pin code:" name="pincode" type="number" maxlength="6" required autofocus>
              </label>
            </div>
            
            <div>
              <label>
              <input placeholder="password" name="password" type="password" required>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="retype password" name="cpassword" type="password" required>
              </label>
            </div>
            <div>
              <input type="submit" name="register" value="create an account" id="register-submit">
            </div>
            
          </form>
          <!-- /Form -->
        </div>
      </div>
      <div class="registration_left">
        <h2>Existing User</h2> 
        <div class="alert-danger"><?php echo $lmsg; ?></div>
        <div class="registration_form">
       
          <!-- Form -->
          <form id="registration_form" action="" method="post"  enctype="multipart/form-data" autocomplete="off">
            <div>
              <label>
              <input placeholder="email:" type="email" name="emails" required>
              </label>
            </div>
            <div>
              <label>
              <input placeholder="password" type="password" name="passwords" required>
              </label>
            </div>
            <div>
              <input type="submit" name="login" value="sign in" id="register-submit">
            </div>
            <div class="forget"> <a href="forget.php">Forgot your password</a> </div>
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
