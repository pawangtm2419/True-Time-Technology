<?php
//include_once("../com/controller.php");
include_once("inc/body.php");
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    if ($username == "" && $password == "") {
        $_SESSION['msg'] = "Username & Password must Not Be Blank";
    } else {
            $result = $db->fireQuery("select * from `admin`  where `username`='".$username."' and `password`='".$password."' ");
            if ($rows = $db->fetchAssoc($result)){
            echo $_SESSION['user_id'] = $rows[0]['id'];
            echo $_SESSION['username'] = $rows[0]['username'];
            echo $_SESSION['admin_type'] = $rows[0]['admin_type'];
            echo $_SESSION['email'] = $rows[0]['email'];
            header("Location:welcome.php");
        }else {
            $_SESSION['msg'] = "Wrong Username or Password";
        }
    }
  }
  
?>
<?php //include_once("inc/header.php"); ?>
<div class="errordiv">
<?php if ($_SESSION['msg']) {
    echo '<div class="errormsg" style="cursor:pointer">' . $_SESSION['msg'] . '</div>';
    $_SESSION['msg'] = '';
    unset($_SESSION['msg']);
} ?>
</div>
<form name="frm" method="post">
    <div class="login-box-1">
        <div class="login-box">
            <div class="login-box-bg">
                <div class="login-box-size">
                    <h1 style="color:black;">Member Login</h1>
                    <input name="username" type="text"  class="text-box-1" placeholder="username" autofocus="autofocus" />
                    <input name="password" type="password"  class="text-box-2" placeholder="password" />
                    <div><input type="submit" name="login" value="Login" class="button" id="login" /></div>
                    
                   
                </div>
            </div>
            <div class="login-box-bottom-bg"></div>
        </div>
    </div>
</form>
<?php //include_once("inc/footer.php"); ?>
