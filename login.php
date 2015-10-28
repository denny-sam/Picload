<?php
	session_start();
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$dbc = mysqli_connect('127.0.0.1','root','', 'picload') or die('not allowed');
	$query="SELECT username,userpassword FROM picloaders WHERE username = '$user'";
	if($result = mysqli_query($dbc,$query))
	{
	$row = mysqli_fetch_array($result);

	if($row[1]==$pass)
	{	$_SESSION["user"]=$user;
		header("Location:profile.php");
	}else{
		echo "Invalid credentials";
		session_destroy();
		header("refresh:3; url=main.html");
		
	}

	}else{
		echo "Invalid credentials";
		session_destroy();
		header("refresh:2; url=main.html");

	}
?>
