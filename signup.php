
<?php
	session_start();
	$nuser = $_POST['nuser'];
	$npass = $_POST['npass'];
	$_SESSION["user"]=$nuser;

	$dbc=mysqli_connect('127.0.0.1','root','', 'picload') or die('Fuck off');

	$query1= "INSERT INTO picloaders VALUES('','$nuser','$npass')";

	$result=mysqli_query($dbc,$query1) or die(mysqli_error($dbc));
	
	$create="CREATE TABLE $nuser(
		 id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY not null,
		image_name varchar(40) not null,
		image longblob Not null
		)";

	$done=mysqli_query($dbc, $create) or die("Unable to make your profile");
	header("Location:profile.php");
	
	?>
