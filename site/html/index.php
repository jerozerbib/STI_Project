<?php 
session_start(); 

if (isset($_SESSION['connec']) && $_SESSION['connec'] == true){
		
	header('Location: menu.php');
}
?>

<!DOCTYPE html>
<html>
	
	<link href="css/index.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

		<nav class="navbar navbar-expand-lg navbar-inverse bg-dark">
			<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav">
      				<li class="nav-item">
        				<a class="nav-link" href='#'>Login</a>
      				</li>
    			</ul>
  			</div>
		</nav>	  
		
		<h1 class="title">HEIG STI</h1>
		<div class="center" style="width:500px;">
		<form method="post" action="login.php" class="form-signin">
			<div>
				<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
                <input type="password" name="passwd" id="passwd" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			</div>
		</form>
		</div>
	</body>
</html>