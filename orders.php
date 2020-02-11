<?php
session_start();
include_once("config.php");

        $cid = ($_POST['cid']);
		$did = ($_POST['did']);
        $g_name = ($_POST['g_name']);
        $date = date('Y-m-d H:i:s');
        $p = ($_POST['price']);
	


$sql = "INSERT INTO cus_orders (CustomerID,DT,Game_Name,DistributorID,price) VALUES ('$cid','$date','$g_name','$did','$p')";

if (mysqli_query($mysqli,$sql)){
	echo '<script type="text/javascript"> alert("NEW GAME ADDED. Add more!"); </script>';
	header("Location:http://localhost/dbms_mini_project/home.php");
} 
else 
{
	echo '<script type="text/javascript"> alert("Error Occured"); </script>';
	header("Location:http://localhost/dbms_mini_project/home.php");

}

?>