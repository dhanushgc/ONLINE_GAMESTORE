<?php
	session_start();

	$db=mysqli_connect("localhost","root", "","videogamedb");
	if(isset($_POST['signup'])) {

		$fname = ($_POST['fname']);
		$lname = ($_POST['lname']);
		$password = ($_POST['password']);
		$email = ($_POST['email']);
		$phone = ($_POST['phone']);
		$card = ($_POST['card']);
		$sql;
		$password=md5($password);
		
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "Insert into customer(FNAME,LNAME,PhoneNum,EMAIL,PASSWORD,CARD) values ('$fname','$lname','$phone','$email','$password','$card')";

if (mysqli_query($db, $sql)) {
    echo "New record created successfully:";
	echo " $fname";
	header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

	}
?>
		