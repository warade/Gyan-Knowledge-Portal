<?php
	session_start();
	include_once("connection.php");
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
	<div class="page-header" style="margin-top: -29px;">
  		<h1>Gyan <small> Debugging solutions </small></h1>
	</div>

	<div class="sign_up">
		<em  style="color: red;">
			<?php
				if(isset($_SESSION['msg_signup']))
				{
					echo "".$_SESSION['msg_signup'];
					unset($_SESSION['msg_signup']);
				}	
			?>
		</em>
		<form class="form-horizontal" method="POST" action="signup.php">
			<fieldset>

			<!-- Form Name -->
			<legend style="text-align: center;">Form Name</legend>

			<!-- text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Your full Name</label>
			  <div class="col-md-4">
			    <input id="textinput" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Email (optional)</label>  
			  <div class="col-md-4">
			  <input id="textinput" name="email" type="text" placeholder="Emal" class="form-control input-md">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Choose Username</label>  
			  <div class="col-md-4">
			  <input id="textinput" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Password input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="passwordinput">Password</label>
			  <div class="col-md-4">
			    <input id="passwordinput" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">City where you live</label>  
			  <div class="col-md-4">
			  <input id="textinput" name="homecity" type="text" placeholder="City" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Your skills</label>  
			  <div class="col-md-4">
			  <input id="textinput" name="skills" type="text" placeholder="Skills" class="form-control input-md" required="required">
			    
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Contact</label>  
			  <div class="col-md-4">
			  <input id="textinput" name="contact" type="text" placeholder="Contact" class="form-control input-md" required="required">
			    
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="singlebutton"></label>
			  <div class="col-md-4">
			    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
			  </div>
			</div>

			</fieldset>
		</form>

	</div><hr>
	<div class="log_in">
		<em  style="color: red;">
			<?php
			if(isset($_SESSION['msg_login']))
				{
					echo "".$_SESSION['msg_login'];
					unset($_SESSION['msg_login']);
				}			
			?>
		</em>
		<form class="form-horizontal" method="POST" action="login.php">
			<fieldset>

			<!-- Form Name -->
			<legend style="text-align: center;">Login</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="textinput">Username</label>  
			  <div class="col-md-4">
			  <input id="textinput" name="username" type="text" placeholder="Username" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Password input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="passwordinput">Password</label>
			  <div class="col-md-4">
			    <input id="passwordinput" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="singlebutton"></label>
			  <div class="col-md-4">
			    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Login</button>
			  </div>
			</div>

			</fieldset>
		</form>
	</div><hr>
</body>
</html>