<?php
	session_start();
	include("functions.php");
	setInactive();
	session_unset();
	if(session_destroy())
	{
		header("Location: start.php");
	}
?>