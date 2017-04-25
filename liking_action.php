<?php
	session_start();
	require("connection.php");
	include("functions.php");
	$userid=$_SESSION['UserID'];
	$listid=$_SESSION['listid_likes'];
	echo "$listid";
	$do=$_GET['do'];
	switch ($do) {
		case 'like':
			$sql="INSERT into likes (ListID,likeness,UserID) values ('$listid','like','$userid')";
			$res=mysqli_query($db,$sql);
			break;
		
		case 'unlike':
			$sql="DELETE from likes where UserID='$userid' and ListID='$listid' limit 1";
			$res=mysqli_query($db,$sql);
			break;
	}
	unset($_SESSION['listid_likes']);
	header("Location: timeline.php");
?>