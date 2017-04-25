<?php
	session_start();
	require("connection.php");
	require("functions.php");
	$listurl=$_POST['listURL'];
	if(!$listurl)
	{
		$_SESSION['msg@home']="Sorry empty tweet not allowed! Add something!";
		header("Location: home.php");
	}
	else
	{
		$userid=$_SESSION['UserID'];
		$listurl="".$_SESSION['username']." posted:<br>$listurl";
		$sql="INSERT into lists (UserID,ListURL,stamp) VALUES ('$userid','$listurl',now())";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			echo "inserted!";
			header("Location: timeline.php");
		}
	}
?>