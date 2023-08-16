<?php
session_start();

include "includes/config.php";

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$res = mysqli_query($connection,"SELECT * FROM users WHERE username='$username' AND password='$password' ");
	$result=mysqli_fetch_array($res);
	if($result) {
		$_SESSION["login"]="1";
		echo "index";
		header("location:index.php");
	}
	else {
		echo "login";
		header("location:login.php?err=1");
		
	}
}

?>