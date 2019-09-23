<?php 

session_start(); 

if (isset($_SESSION['connec']) && $_SESSION['connec'] == true){
		
	header('Location: menu.php');
}

?>

<!DOCTYPE html>
<html>
	
	<link href="css/register.css" rel="stylesheet">

	<body>

		<nav>
			<a href='index.php'>Login</a>
			<a href='register.php'>Register</a>
		</nav>
		<form method="post" action="login.php" class="form-signin">
			<div>
				<h1 class="title">Welcome</h1>
				<div name="center">
					<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
                	<input type="password" name="passwd" id="passwd" class="form-control" placeholder="Password" required>
					<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
				</div>
			</div>
		</form>
	</body>
</html>