<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inventory | USB TOYS</title>
	<link rel="icon" href="res/TITLE.jpg" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="css/head.css">
	<link rel="stylesheet" type="text/css" href="css/sidebar2.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">

	<link rel="stylesheet" type="text/css" href="css/content.css">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

	<style type="text/css">
		
		#logo{
			padding-top: 0.7%;						
			width: 14%;
			height: 62px;
			float: left;	
			position: fixed;		
		}
		td{
			padding: 5px;
		}

		th{
			padding: 5px;
			font-size: 20px;
			text-align: center;
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
		<li><a class="active" href="inventory.php">Inventory</a></li>
		<li><a href="add_product.php">ADD GAMES TO DB</a></li>
		<li><a href="remove_product.php">REMOVE GAME FROM DB</a></li>
        <li><a href="sales.php">CUSTOMER ORDERS</a></li>
	</ul>
</div>


<!-- BACK TO TOP-->
<a href="#" class="back-to-top">Back To Top </a>

<!--CONTENT-->

<div class="content">
<!--vr-->

	<section class="container">
	<label>VIRTUAL-REALITY GAMES &nbsp;&nbsp;</label>
	<?php

	$results = $mysqli->query("SELECT g_id,g_code, g_name,price,DistributorID FROM vr  ORDER BY g_id ASC");
if($results){ 
$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>GAME_ID</th><th>GAME_CODE</th><th>GAME NAME</th><th>PRICE</th><th>DistributorID</th>
';//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<tr>
	<td><p align="center">{$obj->g_id}</p></td>
    <td><p align="center">{$obj->g_code}</p></td>
	<td><p align="center">{$obj->g_name}</p></td>
    <td><p align="center">{$currency}{$obj->price}</p></td>
	<td><p align="center">{$obj->DistributorID}</p></td>
	</tr>
		
EOT;
}
$products_item .= '</table>';
echo $products_item;
}
?>    
   
</div>
</section>

<!--rpg-->

<div class="content">
<section class="container">
	<label>ROLE-PLAYING-GAMES &nbsp;&nbsp;</label>
	<?php

	$results = $mysqli->query("SELECT g_id,g_code, g_name,price,DistributorID FROM rpg  ORDER BY g_id ASC");
if($results){ 
$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>GAME_ID</th><th>GAME_CODE</th><th>GAME NAME</th><th>PRICE</th><th>DistributorID</th>
';//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<tr>
	<td><p align="center">{$obj->g_id}</p></td>
    <td><p align="center">{$obj->g_code}</p></td>
	<td><p align="center">{$obj->g_name}</p></td>
    <td><p align="center">{$currency}{$obj->price}</p></td>
	<td><p align="center">{$obj->DistributorID}</p></td>
	</tr>
		
EOT;
}
$products_item .= '</table>';
echo $products_item;
}
?>    
   
</div>
</section>

<!--fps-->
<div class="content">
<section class="container">
	<label>FIRST-PERSION-SHOOTER &nbsp;&nbsp;</label>
	<?php

	$results = $mysqli->query("SELECT g_id,g_code, g_name,price,DistributorID FROM fps  ORDER BY g_id ASC");
if($results){ 
$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>GAME_ID</th><th>GAME_CODE</th><th>GAME NAME</th><th>PRICE</th><th>DistributorID</th>
';//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<tr>
	<td><p align="center">{$obj->g_id}</p></td>
    <td><p align="center">{$obj->g_code}</p></td>
	<td><p align="center">{$obj->g_name}</p></td>
    <td><p align="center">{$currency}{$obj->price}</p></td>
	<td><p align="center">{$obj->DistributorID}</p></td>
	</tr>
		
EOT;
}
$products_item .= '</table>';
echo $products_item;
}
?>    
   
</div>
</section>
<div class="content">
<!--racing-->

<section class="container">
	<label>RACING &nbsp;&nbsp;</label>
	<?php

	$results = $mysqli->query("SELECT g_id,g_code, g_name,price,DistributorID FROM racing  ORDER BY g_id ASC");
if($results){ 
$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>GAME_ID</th><th>GAME_CODE</th><th>GAME NAME</th><th>PRICE</th><th>DistributorID</th>
';//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<tr>
	<td><p align="center">{$obj->g_id}</p></td>
    <td><p align="center">{$obj->g_code}</p></td>
	<td><p align="center">{$obj->g_name}</p></td>
    <td><p align="center">{$currency}{$obj->price}</p></td>
	<td><p align="center">{$obj->DistributorID}</p></td>
	</tr>
		
EOT;
}
$products_item .= '</table>';
echo $products_item;
}
?>    
   
</div>
</section>

<!--sports-->
<div class="content">
<section class="container">
	<label>SPORTS &nbsp;&nbsp;</label>
	<?php

	$results = $mysqli->query("SELECT g_id,g_code, g_name,price,DistributorID FROM sports  ORDER BY g_id ASC");
if($results){ 
$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>GAME_ID</th><th>GAME_CODE</th><th>GAME NAME</th><th>PRICE</th><th>DistributorID</th>
';//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<tr>
	<td><p align="center">{$obj->g_id}</p></td>
    <td><p align="center">{$obj->g_code}</p></td>
	<td><p align="center">{$obj->g_name}</p></td>
    <td><p align="center">{$currency}{$obj->price}</p></td>
	<td><p align="center">{$obj->DistributorID}</p></td>
	</tr>
		
EOT;
}
$products_item .= '</table>';
echo $products_item;
}
?>    
   
</div>
</section>

<!--wrestling-->
<div class="content">
<section class="container">
	<label>WRESTLING &nbsp;&nbsp;</label>
	<?php

	$results = $mysqli->query("SELECT g_id,g_code, g_name,price,DistributorID FROM wrestling  ORDER BY g_id ASC");
if($results){ 
$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>GAME_ID</th><th>GAME_CODE</th><th>GAME NAME</th><th>PRICE</th><th>DistributorID</th>
';//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<tr>
	<td><p align="center">{$obj->g_id}</p></td>
    <td><p align="center">{$obj->g_code}</p></td>
	<td><p align="center">{$obj->g_name}</p></td>
    <td><p align="center">{$currency}{$obj->price}</p></td>
	<td><p align="center">{$obj->DistributorID}</p></td>
	</tr>
		
EOT;
}
$products_item .= '</table>';
echo $products_item;
}
?>    
   
</div>
</section>


</div>

</body>
</html>