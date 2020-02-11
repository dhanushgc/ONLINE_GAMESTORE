<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>VIRTUAL REALITY GAMES</title>
	<link rel="icon" href="res/TITLE.jpg" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">

	<link rel="stylesheet" type="text/css" href="css/content.css">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

	<style type="text/css">
		body{
			margin: 0;						
		}
		#logo{
			padding-top: 0.7%;			
			background-color: #333;
			width: 14%;
			height: 9.65%;
			float: left;
			position: fixed;
		}
	</style>
	
</head>

<body>

<div id="logo">
	<a href="home.php">
		<img src="res/TITLE.jpg" width="100%" height="100%">
	</a>
</div>


<div id="sidebar">
	<ul>
		<li>Welcome <?php echo $_SESSION['username'];?></li>
		
		<li><a href="#cart"><table><tr><td><img src="res/icons/cart.png" /></td>
		<td>&nbsp;Shopping Cart</td></tr></table></a></li>
		
		<li><a href="#FREEGAMES"><table><tr><td></td>
		<td>&nbsp;FREE GAMES</td></tr></table></a></li>

		<li><a href="#PAID"><table><tr><td></td>
		<td>&nbsp;PAID GAMES</td></tr></table></a></li>
		

		<li>&nbsp;</li>

		<li><a href="download.php"><table><tr><td><img src="res/icons/checkout.png" /></td>
		<td>&nbsp;Checkout&nbsp;</td><td><img src="res/icons/new_page.png" /></td></tr></table></a></li>

		<li>
			<a href="view_orders.php"> 
			<table><tr><td><img src="res/icons/logout.png" /></td>
			<td>&nbsp;MY ORDERS</td></tr></table></a>
		</li>

		<li>
			<a href="destroy.php"> 
			<table><tr><td><img src="res/icons/logout2.png" /></td>
			<td>&nbsp;Logout</td></tr></table></a>
		</li>

		<li>&nbsp;</li>		
		
		<li><a href="https://docs.google.com/forms/d/12gX-2gz6ywPKx36MJFKdu8R00cXi-e_nVh9gOftvXGA/" target="_blank"><table><tr><td><img src="res/icons/request.png" /></td>
		<td>&nbsp;Request Here&nbsp;</td><td><img src="res/icons/new_page.png" /></td></tr></table></a></li>
	</ul>
</div>

<div id="navbar">
	<ul>
		<li><a class="active" href="vr.php">VIRTUAL REALITY GAMES</a></li>
		<li><a href="rpg.php">ROLE-PLAYING GAMES</a></li>
		<li><a href="fps.php">FIRST-PERSON SHOOTER-GAMES</a></li>
		<li><a href="racing.php">RACING</a></li>
		<li><a href="sports.php">SPORTS</a></li>
		<li><a href="wrestling.php">WRESTLING</a></li>		
	</ul>
</div>


<!-- BACK TO TOP-->
<a href="#" class="back-to-top">Back To Top </a>

<!--CONTENT-->

<div class="content">
	<section class="container">

	<!-- View Cart Box Start -->
	<div id="cart">
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	
	echo '<h3 style="color:white;">GAME DETAILS</h3>';
	echo '<form method="post" action="cartvr.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<thead style="color:white;"><th style="color:white;">NAME</th><th style="color:white;">DISTRIBUTER</th><th style="color:white;">REMOVE</th></tr></thead>';
	echo '<tbody>';


	$total =0;
	$b = 0;


	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		
		$g_name = $cart_itm["g_name"];
	    $d_id = $cart_itm["DistributorID"];
		$price = $cart_itm["price"];
		$g_code = $cart_itm["g_code"];
		$g_img = $cart_itm["g_img"];
	
		
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe



		echo '<tr class="'.$bg_color.'">';
		
		echo '<td style="color:white;">'.$g_name.'</td>';
		echo '<td style="color:white;">'.$d_id.'</td>';
		echo '<td style="color:white;"><input type="checkbox" name="remove_code[]" value="'.$g_code.'" /> Remove</td>';
		echo '</tr>';
		
	}

	echo '<tr><td>&nbsp;</td></tr>';
	echo '<tr>';
	
	echo '<td>&nbsp;</td>';
	echo '<td>';
	echo '<button type="submit" id="myButton">Update</button></td>';


	echo '<td><a href="download.php" id="myButton" style="align: center;">DOWNLOAD</a>';
	echo '</td>';
	echo '</tr>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	
}
?>
</div>

<!-- View Cart Box End -->

<!-- Products List Start FREE -->
<h3>FREE GAMES</h3>
<div class="row" id="FREEGAMES">
<?php
$results = $mysqli->query("SELECT g_name, g_code, g_img, price, DistributorID FROM vr WHERE price='FREE'");
if($results){ 
$products_item = '<ul style="list-style-type: none;">';
//fetch results set as object and output HTML

while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	
	<div class="col-sm-4">
	<div class="box">
	<li class="product">
	<form method="post" action="cartvr.php">	
	<img src="res/{$obj->g_img}">
	<p align="center">{$obj->g_name}</p>
	<p align="center" style="font-size: 1.2em;">{$currency}{$obj->price} </p>
	
	
	<input type="hidden" name="g_code" value="{$obj->g_code}" />
	
	
	
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />

	<div align="center">
		<button type="submit" class="add_to_cart" id="myButton">DOWNLOAD</button>
	</div>
	
	</form>
	</li>
	</div>
	</div>
	
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>    
</div>
<!-- Products List End FREE -->



<!-- Products List Start PAID -->
<h3>PAID GAMES</h3>
<div class="row" id="PAID">
<?php
$results = $mysqli->query("SELECT g_name, g_code, g_img, price, DistributorID FROM vr WHERE price!='FREE' ORDER BY g_id ASC");
if($results){ 
$products_item = '<ul style="list-style-type: none;">';
//fetch results set as object and output HTML

while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	
	<div class="col-sm-4">
	<div class="box">
	<li class="product">
	<form method="post" action="cartvr.php">	
	<img src="res/{$obj->g_img}">
	<p align="center">{$obj->g_name}</p>
	
	<p align="center" style="font-size: 1.2em;">{$currency}{$obj->price} </p>
	
	
	<input type="hidden" name="g_code" value="{$obj->g_code}" />
	<input type="hidden" name="d_id" value="{$obj->DistributorID}" />
	
	


	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />

	<div align="center">
		
		<button type="submit" class="add_to_cart" id="myButton">DOWNLOAD</button>
	</div>
	
	</form>
	</li>
	</div>
	</div>
	
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>    
</div>
<!-- Products List End PAID-->


</section>
</div>



<!--FOOTER-->

<footer class="container">
	<div class="row">	
		<p class="col-sm-6" style="color:black;">
			&copy; 2019 USB TOYS | Made with<i style="color: #fd4b4b;">&nbsp; &#9829; &nbsp;</i>in India
		</p>

		<ul class="col-sm-6">
			<li class="col-sm-1">
					<img src="res/social media/help.png">
				</a>
			</li>
			<li class="col-sm-1">
					<img src="res/social media/twitter.png">
				</a>
			</li>
			<li class="col-sm-1">
					<img src="res/social media/facebook.png">
				</a>
			</li>
			<li class="col-sm-1">
					<img src="res/social media/google-plus.png">
				</a>
			</li>
			<li class="col-sm-1">
					<img src="res/social media/instagram.png">
				</a>
			</li>
			<li class="col-sm-1">
				<img src="res/social media/youtube.png">
			</li>
		</ul>
	</div>
</footer>

</body>
</html>