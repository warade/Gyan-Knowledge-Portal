<?php
	session_start();
	require("connection.php");
	require("functions.php");
	$reply=$_POST['reply'];
	$listid=$_SESSION['dummy_listid'];
	$username=$_SESSION['username'];
	if(!$reply)
	{
		$_SESSION['msg@home']="Sorry empty tweet not allowed! Add something!";
		header("Location: home.php");
	}
	else
	{
		$userid=$_SESSION['UserID'];
		$reply="".$_SESSION['username']." posted:<br>$reply";
		$sql="INSERT into replies (reply,ListID,Username) VALUES ('$reply','$listid','$username')";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error!";
		}
		else
		{
			echo "inserted!";
			header("Location: replies.php?ListID=$listid");
		}
	}
?>