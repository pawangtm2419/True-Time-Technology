<?php 
include("config/connection.php");
$customerid = $_SESSION['customerid'];
$selectdetail = mysql_query("select * from register where id = '$customerid'");
$selectdetail1 = mysql_fetch_array($selectdetail);
$billaddress = $selectdetail1['address'];
$billfname = $selectdetail1['fname'];
$billlname = $selectdetail1['lname'];
$billemail = $selectdetail1['email'];
$billmobile = $selectdetail1['mobile'];
$productord = $_SESSION['productor'];
$orderid = $_SESSION['orderid'];
$totalpricecart = $_SESSION['tott'];
$pdescription = $_SESSION['reportout'];
 ?>
<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "";

// Merchant Salt as provided by Payu
$SALT = "";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in/_payment";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
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
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>

<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body onLoad="submitPayuForm()">
<!-- header -->
<?php require_once("$url"."incs/header.php"); ?>
<!--end header-->
<!-- content -->
 <div class="container">
  <div class="main">
    <!-- start registration -->
    <div class="registration">
      <div class="registration_left">
        <h2>Payu Form </span></h2>
        <div class="alert-danger"><?php echo $msg; ?></div>
        <div class="registration_form">
    <?php if($formError) { ?>
	
     
      
    <?php } ?>
    
          <form action="<?php echo $action; ?>" id="registration_form" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <div>
          <label>
          Amount: <input name="amount" type="text" value="<?php echo $totalpricecart; ?>" />
          </label>
          </div>
          <div>
          <label>
          First Name: <input name="firstname" type="text" id="firstname" size="40pt" value="<?php echo $billfname; ?>" />
        </label>
        </div>
        <div>
          <label>
          Email Id<input name="email" type="text" id="email" value="<?php echo $billemail; ?>" size="40pt" />
          </label>
          </div>
          <div>
          <label>
         Mobile: <input name="phone" type="text" value="<?php echo $billmobile; ?>" size="40pt" />
         </label>
         </div>
         <div>
          <label>
          Product Info: <input name="productinfo" type="text" value="<?php echo $productord; ?>" size="40pt" />
        
        </label>
        </div>
        
        <input name="surl" type="hidden" value="http://yusrafashion.com/success.php" size="64" />
        <input name="furl" type="hidden" value="http://yusrafashion.com/failure.php" size="64" />
        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
        <div>
          <label>
          Last name: <input name="lastname" type="text" id="lastname" value="<?php echo $billlname; ?>"  size="40pt"/>
          </label>
          </div>
          <div>
          <label>
        Address: <input name="address1" type="text" value="<?php echo $billaddress; ?>" />
        </label>
        </div>
        
          <?php if(!$hash) { ?>
            <input type="submit" value="Pay Now" />
          <?php } ?>
        
    </form>
    
	
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
