<?php
	session_start();
	include_once("connection.php");
	include_once("functions.php");
	$id = $_GET['UserID'];
	$do=$_GET['do'];
	switch ($do) {
		case 'follow':
			follow_user($_SESSION['UserID'],$id);
			$msg= "You have followed a user!";
			break;
		
		case 'unfollow':
			unfollow_user($_SESSION['UserID'],$id);
			$msg= "You have unfollowed a user!";
			break;
	}
	header("Location: users.php");
?>