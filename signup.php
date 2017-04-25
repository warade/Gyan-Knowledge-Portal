<?php
	session_start();
	require("connection.php");
	require("functions.php");
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$homecity=$_POST['homecity'];
	$name=$_POST['name'];
	$skills=$_POST['skills'];
	$contact=$_POST['contact'];
	if(empty($username) && empty($password))
	{
		$_SESSION['msg_signup']="Fill the username and password";
		header("Location: index.php");
	}
	else if(empty($username))
	{
		$_SESSION['msg_signup']="Fill the username";
		header("Location: index.php");
	}
	else if(empty($password))
	{
		$_SESSION['msg_signup']="Fill the password";
		header("Location: index.php");
	}
	else
	{
		$sql="SELECT Username from users WHERE Username='$username'";
		$res=mysqli_query($db,$sql);
		if(!$res)
		{
			echo "error";
		}
		else
		{
			if(!mysqli_num_rows($res))
			{
				//$password=md5($password);
				$sql="INSERT into users (Username,Password,email,name,homecity,status,skills,contact) VALUES ('$username','$password','$email','$name','$homecity','active','$skills', '$contact')";
				$res=mysqli_query($db,$sql);
				if(!$res)
				{
					echo "error";
				}
				else
				{
					echo "signed up!";
					$_SESSION['username']=$username;
					getEverything($_SESSION['username']);
					header("Location: home.php");
				}
			}
			else
			{
				$_SESSION['msg_signup']="Username is already registered! Try another!";
				header("Location: index.php");
			}
		}
	}
	
	
?>