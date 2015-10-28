<?php
	
	session_start();
	$idf=$_REQUEST["idf"];
	$user=$_SESSION["user"];

	$dbc = mysqli_connect('127.0.0.1','root','', 'picload') or die("no man again it sucks");
    
    if($image=mysqli_query($dbc,"select image From $user where id=$idf"))
    {
    	
	$img=mysqli_fetch_assoc($image);
	
	$image=$img['image'];

	header("Content-type: image/jpeg");
	echo $image;

	}else{
		
		echo mysqli_error($dbc);
	}
  

?>
