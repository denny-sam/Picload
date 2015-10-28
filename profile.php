<?php 
	
	session_start();
	$user=$_SESSION["user"];
 ?>
<html>
<head>
<link rel="stylesheet" href="profile.css"/>
<title><?php echo $user ?></title>
<script type="text/javascript">window.onbeforeunload=function(){}</script>
</head>
<body>
<div class="header">
<table class="header-table">
	<tr>
	<td style="font-family:hobo std; ">	<?php echo $user; ?> <td style="font-size:30px;"><a href="main.html" style=" color:white; text-decoration:none;">PiCLoad</a></td><td> 
	<td><button class="choose">Choose File</button>
	<form style="display:inline; position:relative; left:-150px;" enctype="multipart/form-data" action=<?php echo "profile.php"?> method="POST">
	<input type="file" name="uploadbut" class="uploadbut" value="upload pic"><input type="submit" name="submit" class="submit" value="Upload"></form></td>
	</tr>
</table>
</div><div class="the-gap"></div>
<div class="pic-container">

<?php 
	
	$dbc = mysqli_connect('127.0.0.1','root','', 'picload') or die("Why this kolaveri, PHP. Just load for god's sake");
	$idf=1;
	$query="SELECT id from $user ORDER BY id DESC";
	$result=mysqli_query($dbc, $query);

	if($idlast=mysqli_fetch_assoc($result))
	{
	   $idlast=$idlast['id'];
	}
	
	while($idf<=$idlast)
	{
		$_SESSION["idf"]=$idf;
		
		echo "<img src=getimg.php?idf=$idf class='images'>";
		$idf++;
	}
	

	if(isset($_POST['submit']))
	{
	
	 
	if( $recieveimg= addslashes(file_get_contents($_FILES['uploadbut']['tmp_name']))){
	 
		
	 $filename=addslashes($_FILES['uploadbut']['name']); 
	 $inserting="Insert into $user values('','$filename','$recieveimg')";
	
 	 $lol=mysqli_query($dbc, $inserting);
	}else{header("location:profile.php");}}

	if(isset($lol))
	{
		header("Location:profile.php");
	}

	



?>
</div>
</body>
	  	
