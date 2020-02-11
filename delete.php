<?php
	session_start();
    include_once("config.php");

			$code = ($_POST['g_code']);
			$genre = ($_POST['genre']);
	
	
$sql = "DELETE FROM $genre WHERE g_code='".$code."'"; 

if (mysqli_query($mysqli, $sql)) 
{
	echo '<script type="text/javascript">alert("GAME Deleted");</script>';
	header("Location:http://localhost/dbms_mini_project/remove_product.php");
} 
else 
{
	echo '<script type="text/javascript">alert("No such GAME Exists");</script>';
	header("Location:http://localhost/dbms_mini_project/remove_product.php");

}

?>
		