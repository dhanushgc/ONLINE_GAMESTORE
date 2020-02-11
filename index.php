<?php
session_start();
if(isset($_SESSION['username'])){
	header("Location: home.php");
}
?>
 <html>
 <head>
<link rel="stylesheet" href="css/head.css">
<link rel="icon" href="res/TITLE.jpg" sizes="16x16">
<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
<script type="text/javascript" src="scripts/signupForm.js"></script>
<script type="text/javascript" src="scripts/loginForm.js"></script>
<title>USB TOYS | GAME STORE</title>
</head>
<body>
<h1><center><img src="res/TITLE.jpg"></center></h1>



<!-- LOGIN -->

<div id="login">
<form name="loginForm" method="post" action="login.php">
<table align="left" width="150%">
<tr>
	<td align="center">
		<h2>LOGIN</h2>
	</td>
</tr>
<tr>	
	<td>
		<input type="text" name="username" id="user" placeholder="email@example.com" required>
	</td>	
</tr>
<br>
<tr>	

	<td>
		<input type="password" name="password" id="pass" placeholder="Password" required>
	</td>
</tr>
<tr>
	
	<td>
		<input type="submit" name="login" value="Let me in.." class="click">
	</td>
</tr>
</table>
</form>
</div>


<!-- SIGNUP -->

<form name="signupForm" method="post" action="signup.php" id="signup" onsubmit="return ValidateFname() || ValidateLname() || ValidateEmail() || ValidateMobile() ">
<table align="right"> 
<tr>
	<td align="center" colspan="2">
		<h2>New Here? Register with us..</h2>
	</td>
</tr>
<tr>
	<td>
		<input type="text" name="fname" placeholder="First Name" required>	
	</td>
	<td>
		<input type="text" name="lname" placeholder="Last Name" required>
	</td>
</tr>

<tr>
	<td colspan="2">
		<input type="email" name="email" placeholder="Email" required>
	</td>
</tr>
<tr>
	<td colspan="2">
		<input type="text" name="phone" placeholder="Contact Number" required>
	</td>
</tr>
<tr>	
	<td colspan="2">
		<input type="password" name="password" placeholder="Password" required>
	</td>
</tr>
<tr>
	<td colspan="2">
		<input type="text" name="card" placeholder="Card number" required>
	</td>
</tr>

<tr>
<td colspan="2">
	<input type="submit" name="signup" value="Sign Up" class="click">
</td>
</tr>

</table>
</form>

</body>
</html>