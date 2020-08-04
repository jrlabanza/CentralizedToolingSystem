<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
		<!--Programmer: Victor Nacino-->
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="lib/js/jquery.js"></script>
		<link rel="stylesheet" href="lib/css/jquery-ui.min.css">
        <link rel="stylesheet" href="style.css">
        <title>TESTING PRODUCTION RECORD</title>
    </head>

	<div class="navigationbar">
	<img src='img/ONHoriz-3DNoShad-Lg.jpg' style='height: 60px; border-radius: 5px 0px 0px 5px;'>
	<div class="navibutton" style='margin: -70px;'>
	<button class="mybutton" onclick="location.href='http://10.153.239.120/'">PROMIS</button>
	<button class="mybutton" onclick="location.href='/psir/index.php'">PSIR</button>
	<button class="mybutton" onclick="location.href='/gonogo/index.php'">GONOGO</button>
	<button class="mybutton" onclick="location.href='search.php'">SEARCH</button>
	</div>
	</div>
	<body>
	<div class="maincontent">

				<div class="logincontainer">
			<form id="formsubmit" action="authentication.php" method="post">
				<table  style='border: none;'>
				<caption><h2>Log in</h2></caption>
				<tr>
					<td  style='border: none;'>Username :</td>
					<td  style='border: none;'><select type="text" list="users" name='username' style='width: 200px;' >
					<option value="<?php if(!empty($_SESSION['login_user'])) {echo $_SESSION['login_user'];} ?>" selected/><?php if(!empty($_SESSION['login_user'])) {echo $_SESSION['login_user'];} ?></option>
					<?php include('names.php'); ?><?php unset($_SESSION['login_user']);?></td>
				</tr>
				<tr>
					<td  style='border: none;'>Password :</td>
					<td  style='border: none;'><input type='password' name='password' required style='width: 195px;' /></td>
				</tr>
				<tr>
					<td colspan='2' style='border: none;'><input style="width: 70px;" type='submit' name='login' value='Log in' /></td>
				</tr>
				</table>
			</form>
			</div>
		<div id="loginfooter"><p style="text-align: center; color: white; padding: 15px;">&#9400; TEST APPLICATIONS ENGG.</p></div>
		</div>
<?php
if(!empty($_SESSION['errMsg'])) {
	echo "<script type='text/javascript'> function errorpw(){ alert ('Invalid password! Please try again.'); }</script>";
	echo "<script type='text/javascript'>errorpw()</script>";
}
?>
<?php unset($_SESSION['errMsg']);?>
    </body>
</html>
