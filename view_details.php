<?php
	session_start();
	include_once("connection.php");
	include_once("functions.php");	
	$id = $_GET['UserID'];
	$everything=array();
	$sql="SELECT name,email,homecity,status,skills,contact from users where UserID='$id'";
	$res=mysqli_query($db,$sql);
	if(!$res)
	{
		echo "error";
	}
	else
	{
		if(mysqli_num_rows($res))
		{
			while($data=mysqli_fetch_object($res))
			{
				$everything[]= array('name'=> $data->name, 'email'=> $data->email, 'homecity'=> $data->homecity, 'status'=> $data->status, 'skills'=> $data->skills, 'contact'=> $data->contact );
			}
			if(count($everything))
			{
				
			}
			else
			{
				echo "there is no match";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Gyan
	</title>
	<link rel="stylesheet" href="style.css" type="text/css" />

	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
</head>
<body>


	<div class="page-header">
  		<h1>Gyan <small> Debugging solutions </small></h1>
	</div>
	<!-- Navbar (sit on top) -->
		<div class="w3-top">
		  <div class="w3-bar w3-white w3-wide w3-padding-8 w3-card-2">
		    <a href="#home" class="w3-margin-left w3-bar-item w3-button"><b>ABV</b> IIITM</a>
		    <!-- Float links to the right. Hide them on small screens -->
		    <div class="w3-right w3-hide-small">
		      <!--gotta change these-->
		      <a href="home.php" class="w3-bar-item w3-button">Profile</a>
		      <a href="timeline.php" class="w3-bar-item w3-button">Timeline</a>
		      <a href="following.php" class="w3-bar-item w3-button">Following</a>
		      <a href="followers.php" class="w3-bar-item w3-button">Followers</a>
		      <a href="users.php" class="w3-bar-item w3-button">Users</a>
		      <a href="logout.php" class="w3-bar-item w3-button w3-margin-right">Logout</a>
		    </div>
		  </div>
		</div>


	<!-- profile on home page -->
		<div class="profileup">
			<img src="images/userpic.png" style="border: 1px solid gray; float: left;background-color: white;" height="200px" width="200px"/>
			<div style="margin-left: 230px; color: gray;">
			<?php 
				foreach ($everything as $key => $value){
					echo "<h3><em>".$value['name']."</em></h3>";
					echo "<em>";
					echo "<label>Email:&nbsp;</label>".$value['email']."<br>";
					echo "<label>Homecity:&nbsp; </label>".$value['homecity']."<br>";
					echo "<label>Skills:&nbsp;</label>".$value['skills']."<br>";
					echo "<label>Contact:&nbsp; </label>".$value['contact']."<br>";
					if($value['status']=='active'){
						echo "<label>Status:&nbsp; </label>".$value['status']."<div style='background: rgb(66, 183, 42);border-radius: 50%;
						    display: inline-block;
						    height: 6px;
						    margin-left: 4px;
						    width: 6px;'></div>";
					}
					else{
						echo "<label>Status:&nbsp; </label>".$value['status']."";
					}
					echo "</em>";
				}
			?>
			</div>
		</div>

		<!-- maincontent starts here showing posts -->
	<div class="mainContent">
		<h1>Queries posted: </h1><hr>
		<?php
			$queries = show_lists_profile($id);
				if(count($queries)){
					foreach ($queries as $key => $value) {
					$listid = $value['ListID'];
					echo "<div id='posts'>";
					echo "".$value['ListURL']."<hr>";
					echo "<div id='like_button'>";
					echo "<img style=' margin-right: 5px; height: 40px; width: 50px;' src='images/like.png' />";
					echo "<a href='replies.php?ListID=$listid'>Reply</a>";
					echo "</div>";
					echo "</div>";	
				}
			}
			else{
				echo "No queries posted yet!";
			}
		?>
	</div>
</body>
</html>