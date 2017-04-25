<?php
$db=mysqli_connect("localhost","root","","usrinfo");
	if(!$db)
	{
		echo "Error in connecting MYSQL<br>";
	}
	$dbname="cl_db";
	$btest=mysqli_select_db($db,$dbname);
	if(!$btest)
	{
		echo "not able to select the database!<br>";
	}
?>