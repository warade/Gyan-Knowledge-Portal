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
	<div id="userscontent" class="list-group">

		<table class="table">
	    <thead>
	      <tr>
	        <th>Name</th>
	        <th>Details</th>
	        <th>Status</th>
	      </tr>
	    </thead>
	    <tbody>
		<?php
			$followingids=getUserID();
			if(count($followingids)){
				foreach ($followingids as $key => $value) {
				echo "<tr>";
				$followingid = $value['UserID'];
				$info=get_info($followingid);
				if(count($info)){
					foreach ($info as $key => $data) {
					echo "<td>".$data['Username']."</td>";
					echo "<td><a href='view_details.php?UserID=$followingid'>view</a></td>";
					$status = get_status($data['Username']);
					echo $status;
					if($status){
						echo "<td>active<div style='background: rgb(66, 183, 42);border-radius: 50%;
						    display: inline-block;
						    height: 6px;
						    margin-left: 4px;
						    width: 6px;'></div></td>";
					}
					else{
						echo "<td>inactive</td>";
					}
				}
				
			}
			echo "</tr>";
			}
			}
			
		?>
	</tbody></table><br><hr>
	</div>
	
</body>
</html>