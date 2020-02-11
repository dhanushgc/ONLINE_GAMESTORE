<?php
session_start();
include_once("config.php");

        $game = ($_POST['games']);
		$code = ($_POST['g_code']);
		$name = ($_POST['g_name']);
		$fees = ($_POST['price']);
        $g_img = ($_POST['g_img']);
        $d_id = ($_POST['DistributorID']);


$sql = "INSERT INTO $game (g_code,g_name,price,g_img,DistributorID) VALUES ('$code','$name','$fees','$g_img','$d_id')";

if (mysqli_query($mysqli,$sql)){
	echo '<script type="text/javascript"> alert("NEW GAME ADDED. Add more!"); </script>';
	header("Location:http://localhost/dbms_mini_project/add_product.php");
} 
else 
{
	echo '<script type="text/javascript"> alert("Error Occured"); </script>';
	header("Location:http://localhost/dbms_mini_project/add_product.php");

}

?>