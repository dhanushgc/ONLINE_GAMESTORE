<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>ORDERS | USB TOYS</title>
	<link rel="icon" href="res/TITLE.jpg" sizes="16x16">

	
</head>
<title>ORDERS | USB TOYS</title>
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
			<a href="home.php"> 
			<table><tr><td><img src="res/icons/logout2.png" /></td>
			<td>&nbsp;BACK</td></tr></table></a>
		</li>

		<li>&nbsp;</li>
		
	</ul>
</div>
<!-- BACK TO TOP-->
<a href="#" class="back-to-top">Back To Top </a>

<!--CONTENT-->

<div >
	<section class="container">
	<label>YOUR ORDERS &nbsp;&nbsp;</label>

	<?php
$cid = $_SESSION['username'];
$results = $mysqli->query(" CALL `Display_cus_orders`('$cid')");

if($results){ 
	$products_item = '<table border="1" bordercolor="white" style="color:white;"><th>ORDER_ID</th><th>DATE AND TIME</th><th>GAME NAME</th><th>PRICE</th><th>DistributorID</th>
	';//fetch results set as object and output HTML
	while($obj = $results->fetch_object())
	{
	$products_item .= <<<EOT
		<tr>
		<td><p align="center">{$obj->orderID}</p></td>
		<td><p align="center">{$obj->DT}</p></td>
		<td><p align="center">{$obj->Game_Name}</p></td>
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

