<?php
include_once("../com/controller.php");
$db=new sqlConnection();
$title=$db->fetchAssoc($db->fireQuery("Select site_name from ".TBL_SITE_SETTING. ""));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link href="css/style.css" rel="stylesheet" media="screen" type="text/css" />
<link href="css/dashbord.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/adm.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/livevalidation.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>-->
</head>
<body style="background:#444">
