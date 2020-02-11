<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Remove GAME | USB TOYS</title>
	<link rel="icon" href="res/TITLE.jpg" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar2.css">

	<link rel="stylesheet" type="text/css" href="css/content.css">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

	<style type="text/css">
		body{
			margin: 0;						
		}
		#logo{
			padding-top: 0.7%;						
			width: 14%;
			height: 62px;
			float: left;			
			position: fixed;
		}
		#addForm{
			padding-top: 10px;
			padding-left: 30px;
		}
	</style>
	
</head>

<body>

<div id="logo">
	<a href="admin.php">
		<img src="res/TITLE.jpg" width="100%">
	</a>
</div>

<div id="sidebar">
	<ul>
		<li>Welcome <?php echo $_SESSION['username'];?></li>
				
		<li>
			<a href="destroy.php"> 
			<table><tr><td><img src="res/icons/logout2.png" /></td>
			<td>&nbsp;Logout</td></tr></table></a>
		</li>
		<li>
			<a href="admin.php"> 
			<table><tr><td><img src="res/icons/logout2.png" /></td>
			<td>&nbsp;BACK</td></tr></table></a>
		</li>

		<li>&nbsp;</li>
		
	</ul>
</div>

<div id="navbar">
	<ul>
		<li><a href="inventory.php">Inventory</a></li>
		<li><a href="add_product.php">ADD GAMES TO DB</a></li>
		<li><a class="active" href="remove_product.php">REMOVE GAME FROM DB</a></li>
        <li><a href="sales.php">CUSTOMER ORDERS</a></li>
	</ul>
</div>


<!-- BACK TO TOP-->
<a href="#" class="back-to-top">Back To Top </a>

<!--CONTENT-->

<div  style="color: white;">
	<section class="container">

<!-- FORM -->
<div id="addForm">
<form id="productForm" method="post" action="delete.php">
<table width="45%"> 
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

<tr>
	<td>
		<label>GAME GENRE &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
	<select name="genre" form="productForm" style="color:black;">
  <option value="vr">VIRTUAL-REALITY</option>
  <option value="rpg">ROLE-PLAYING</option>
  <option value="fps">FIRST-PERSON-SHOOTING</option>
  <option value="racing">RACING</option>
  <option value="sports">SPORTS</option>
  <option value="wrestling">WRESTLING</option>
</select>
	</td>
</tr>


<tr>
	<td>
		<label>GAME Code &nbsp;&nbsp;</label>	
	</td>
	<td colspan="2">
		<input type="text" name="g_code" placeholder="Type here..." required>
	</td>
</tr>


<tr>
	<td colspan="3">&nbsp;</td>
</tr>

<tr>
<td>&nbsp;</td>
<td>
	<input type="submit" name="removeproduct" value="Remove GAME" class="click">
</td>
<td>&nbsp;</td>
</tr>

</table>
</form>
</div>


</section>
</div>

</body>
</html>