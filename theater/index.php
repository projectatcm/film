<?php
// base paths
$jsvendor = '../js/vendors';
$cssvendor = '../css/vendors';
$jscustom = '../js/custom';
$csscustom = '../css/custom';
session_start();
$loginid = $_SESSION['id'];
$logintype = $_SESSION['logintype'];
if($logintype === 'theater') {
  header('Location: ./home.php');
}

?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Film Booking</title>
    <script src="<?=$jsvendor?>/jquery-1.12.4.js" charset="utf-8"></script>
    <script src="<?=$jsvendor?>/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="<?=$cssvendor?>/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?=$cssvendor?>/bootstrap.min.css">
		<link rel="stylesheet" href="<?=$cssvendor?>/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$csscustom?>/adminlogin.css">
  </head>
  <body>
		<div class="login">
  		<div class="login-triangle"></div>
  			<h2 class="login-header">Log in</h2>
  			<form class="login-container"  action="../actions.php?action=userlogin" method="post">
				    <p><input type="text" placeholder="username" name='username'></p>
				    <p><input type="password" placeholder="Password" name="password"></p>
				    <p><input type="submit" value="Log in"></p>
  			</form>
		</div>
</body>
</html>
