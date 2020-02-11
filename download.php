<?php
session_start();
include_once("config.php");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="res/ThinkGeek-pt.png" sizes="16x16">
<title>DOWNLOAD | USBTOYS</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<style type="text/css">
	#logo{
			padding-top: 0.7%;						
			width: 14%;
			height: 9.65%;
			float: left;
			position: fixed;
			margin-left: 2px;
		}
</style>


</head>
<body>

<div id="logo">
	<a href="home.php">
		<img src="res/TITLE.jpg" width="100%">
	</a>
</div>

<h1 align="center" style="color:white;">DOWNLOAD</h1>
<div class="cart-view-table-back">

<!--form starts here-->

<form id="f" method="post" action="orders.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Name</th><th>Price</th><th>Subtotal</th></tr></thead>
  <tbody>
 	<?php
	if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			
			
			$g_name = $cart_itm["g_name"];			
			$price = $cart_itm["price"];
			$g_code = $cart_itm["g_code"];		
			$g_img = $cart_itm["g_img"];	
			$d_id = $cart_itm["DistributorID"];
			$subtotal = ($price); //calculate Price x Qty
			
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
		    echo '<tr class="'.$bg_color.'">';
		  
			echo '<td>'.$g_name.'</td>';			
			echo '<td>'.$currency.$price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			
            echo '</tr>';
			$total = ($subtotal); //add subtotal to total var
        }
		
		
	}
	
	
    ?>
<input type="hidden" name="g_name" value="<?php echo $g_name; ?>" />
<input type="hidden" name="did" value="<?php echo $d_id; ?>" />
<input type="hidden" name="cid" value="<?php echo $_SESSION['username'];?>" />
<input type="hidden" name="price" value="<?php echo $price; ?>" />

    <tr><td colspan="7">&nbsp;</td></tr>
    <tr><td colspan="6"><span style="float:right;text-align: right;">Amount Payable: &#8377; <?php echo sprintf("%01.2f", $total);?></span></td></tr>

    <tr align="center">
	<td><a href="home.php" class="button">BACK</a></td>	
	<td><a href="res/<?php echo $g_img ?>" onclick="document.getElementById('f').submit()" class="button" download> DOWNLOAD </a><td>
		<td></td>
    </tr>

    </tbody>
	
</table>

<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>

</div>



</body>
</html>