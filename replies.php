<?php
	session_start();
	require("connection.php");
	require("functions.php");
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
	</header>
	<?php
		$listid = $_GET['ListID'];
		$_SESSION['dummy_listid']=$listid;
		$list = get_list($listid);
		echo "<div style='margin-left: 10px;'>";
		echo "<h1>Query</h1>";
		foreach ($list as $key => $value) {
			$topic= $value['ListURL'];
			$userid = $value['UserID'];
			echo "<h4 style='margin-left: 15px;'>".$topic."</h4>";
		}
		echo "</div><hr>";
	?>

	<!-- adding the post html code -->
		<img style="float: left; margin-left: 17%; margin-top: 9px;"  src="images/social1.png" />
		<div id="addlist">
			<form method="POST" action="add_reply.php">
				<textarea id="post_input" type="text" name="reply" placeholder="Answer the Query.." rows='5' cols="40" wrap=VIRTUAL></textarea>
				<input type="submit" value="Post" class="btn btn-primary" style="margin-left: 5px;" />
			</form>
		</div><br><br><br><br>

	<!-- maincontent starts here showing posts -->
	<div class="mainContent">
		<div>
			<em>
			
				<?php
									//$userids=getUserID();
									$replies= show_replies($listid);
									if(count($replies))
									{
										foreach ($replies as $key => $list) 
										{
											//$likeness=jugad($list['ListID']);
											//$_SESSION['listid_likes']=$list['ListID'];
											echo "<div id='posts'>";
											echo "".$list['reply']."<hr>";
											echo "<div id='like_button'>";
											echo "<img style=' margin-right: 5px; height: 40px; width: 50px;' src='images/like.png' />";
											echo "</div>";
										/*	if (!strcmp($likeness, 'like')) {
												echo "<a href='liking_action.php?ListID=$key&do=unlike'>Unlike</a>";
											}
											else
											{
												echo "<a href='liking_action.php?ListID=$key&do=like'>like</a>";
											}
											*/
											echo "</div>";	
										}
									}	
							
				?> 
			</em>
		</div>

	</div>
	
</body>
</html>