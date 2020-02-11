<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="res/TITLE.jpg" sizes="16x16">
<link rel="stylesheet" type="text/css" href="css/home.css">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<title>WELCOME TO USB TOYS | GAME STORE </title>
<style type="text/css">
		#logo{			
			width: 20.1%;
			float: left;
		}
		body{
			margin-top: 3em;
			margin-left: 3em;
		}
	</style>
</head>
<body bgcolor=black>
<div id="logo">
	<img src="res/TITLE.jpg" width="100%">
</div>

<div id=login>
	<a href="destroy.php"><span id="logoutButton">Log Out</span></a><br><br>
	<?php echo $_SESSION['username'];?>
</div>
<br>

<div id="header"> <strong>BROWSE BY GENRE</strong></div>

<table cellspacing="30px" cellpadding="10px">
<tr>

<td><div id="vr"> 
<a href="vr.php" style="text-decoration: none;">
<img class="circle" src="res/vr.jpg">
<p><strong>VIRTUAL REALITY GAMES</strong></p>
</a>
</div></td>

<td><div id="rpg">
<a href="rpg.php" style="text-decoration: none;">
<img class="circle" src="res/rpg.png">
<p><strong>ROLE-PLAYING GAMES</strong></p>
</a>
</div></td>

<td><div id="fps">
<a href="fps.php" style="text-decoration: none;">
<img class="circle" src="res/fps.jpg">
<p><strong>FIRST-PERSON SHOOTER-GAMES</strong></p>
</a>
</div></td>

</tr>

<tr>

<td><div id="racing"> 
<a href="racing.php" style="text-decoration: none;">
<img class="circle" src="res/racing.jpg">
<p><strong>RACING</strong></p>
</a>
</div></td>

<td><div id="sports">
<a href="sports.php" style="text-decoration: none;">
<img class="circle" src="res/sports.jpg">
<p><strong>SPORTS</strong></p>
</a>
</div></td>

<td><div id="wrestling">
<a href="wrestling.php" style="text-decoration: none;">
<img class="circle" src="res/wwe.jpg">
<p><strong>WRESTLING</strong></p>
</a>
</div></td>

</tr>

</table>

</body>
</html>