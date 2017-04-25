<?php
	session_start();
	require("connection.php");
	require("functions.php");
	$username=$_POST['username'];
	$password=$_POST['password'];
	//$password=md5($password);
	$sql="SELECT UserID from users where Username='$username' and Password='$password'";
	$res=mysqli_query($db,$sql);
	if(!$res)
	{
		echo "error!";
	}
	else
	{
		if(mysqli_num_rows($res))
		{
			echo "logged in!";
			$_SESSION['username']=$username;
			setActive();
			getEverything($_SESSION['username']);

			header("Location: home.php");
		}
		else
		{
			$_SESSION['msg_login']="Incorrect username and password!";
			header("Location: index.php");
		}
	}
?>