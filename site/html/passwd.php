<?php 
require("utils.php");
session_start(); 
verify();
?>

<!DOCTYPE html>
<html>

	<link href="css/passwd.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

    <?php include('nav.php'); ?>	

	<h1 class="title">Change Password</h1>

    	<div class="center" style="width:500px;">
        	<form method="post" action="passwdscript.php" class="form-signin">
				<div>
					<input type="password" name="passwd1" id="passwd1" class="form-control" placeholder="Password" required autofocus>
                	<input type="password" name="passwd2" id="passwd2" class="form-control" placeholder="Confirm Password" required>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
				</div>
			</form>
        </div>
	</body>
</html>