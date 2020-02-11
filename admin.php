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
<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/admin.css">
<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
<title>Admin | USB TOYS</title>
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

<div id=login style="float: right;">
	<a href="destroy.php"><span id="logoutButton">Log Out</span></a><br><br>
	<?php echo $_SESSION['username'];?>
</div>
<br>

<div id="header"> <strong>Select Option</strong> </div>

<table cellspacing="30px" cellpadding="5px">
<tr>
<td>
<div id="website">
	<table align='center"'>
	<tr>
	<td>
	<a href="home.php" target="_blank" style="text-decoration: none;">&nbsp;
	<img src="res/visit-website.png"></a>
	</td>

	<td>
	<a href="home.php" target="_blank" style="text-decoration: none;">
	<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;Visit Website</strong></p>
	</a>
	</td>

	<td>
	<a href="home.php" target="_blank" style="text-decoration: none;">&nbsp;
	<img src="res/new_page.png" style="width: 80px;"></a>
	</td>


	</tr>
	</table>
</div>
</td>
</tr>

<tr>
<td>
<div id="inventory">
	<table>
	<tr>
	<td>
	<a href="inventory.php" style="text-decoration: none;">&nbsp;
	<img src="res/inventory.png"></a>	
	</td>

	<td>
	<a href="inventory.php" style="text-decoration: none;">
	<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;View Inventory</strong></p>
	</a>
	</td></tr>
	</table>
</div>
</td>

</tr>
</table>

</body>
</html>