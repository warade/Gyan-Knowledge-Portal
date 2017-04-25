<?php
	session_start();
	include_once("connection.php");
	include_once("functions.php");	
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
	<!-- profile on home page -->
		<div class="profileup">
			<img src="images/userpic.png" style="border: 1px solid gray; float: left;background-color: white;" height="200px" width="200px"/>
			<div style="margin-left: 230px; color: gray;">
				<h3><em><?php echo "".$_SESSION['name']."!"; ?></em> </h3>
				<em>
					<?php echo "<label>Username:&nbsp;</label>@".$_SESSION['username']; ?><br>
					<?php echo "<label>Homecity:&nbsp;</label>".$_SESSION['homecity']; ?><br>
					<?php echo "<label>Skills:&nbsp;</label>".$_SESSION['skills']; ?><br>
					<?php echo "<label>contact:&nbsp;</label>".$_SESSION['contact']; ?><br>
					<?php 
						  echo "<label>Status:&nbsp; </label>".$_SESSION['status']."<div style='background: rgb(66, 183, 42);border-radius: 50%;
						    display: inline-block;
						    height: 6px;
						    margin-left: 4px;
						    width: 6px;'></div>";
					?>
				</em>
			</div>
		<!-- navbar -->
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
		</div>
	</header>

	
	<!-- adding the post html code -->
		<img style="float: left; margin-left: 17%; margin-top: 9px;"  src="images/social1.png" />
		<div id="addlist">
			<form method="POST" action="add_list.php">
				<textarea id="post_input" type="text" name="listURL" placeholder="What are you thinking about??.." rows='5' cols="40" wrap=VIRTUAL></textarea>
				<input type="submit" value="Post" class="btn btn-primary" style="margin-left: 5px;" />
			</form>
		</div><br><br><br><br>


	


	<!-- maincontent starts here showing posts -->
	<div class="mainContent">
		<div>
		<!-- message if the lists are empty -->
	<em  style="color: red;">
			<?php
				if(isset($_SESSION['msg@home']))
				{
					echo "".$_SESSION['msg@home'];
					unset($_SESSION['msg@home']);
				}	
			?>
	</em>
			<em>
				<?php
							$posts= show_lists_profile($_SESSION['UserID']);
							if(count($posts))
							{

								foreach ($posts as $key => $list) {
									$listid = $list['ListID'];
									echo "<div id='posts'>";
									echo "".$list['ListURL']."<hr>";
									echo "<div id='like_button'>";
											echo "<img style=' margin-right: 5px; height: 40px; width: 50px;' src='images/like.png' />";
											echo "<a href='replies.php?ListID=$listid'>Reply</a>";
											echo "</div>";
									echo "</div>";	
								}
							}
							else
							{
								echo "You havent posted anything yet!";
							}
				?>
			</em>
		</div>

	</div><br><hr>
</body>
</html>