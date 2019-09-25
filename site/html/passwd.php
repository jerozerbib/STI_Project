<?php 
require("utils.php");
session_start(); 
verify();

if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin' ){
		
	header('Location: menu.php');
}
?>

<!DOCTYPE html>
<html>

	<link href="css/passwd.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

    <header>
		<nav class="navbar navbar-expand-lg navbar-inverse bg-dark">
			<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav">
                    <li class="nav-item">
        				<a class="nav-link" href='menu.php'>Chat</a>
      				</li>
					<li class="nav-item">
						<a class="nav-link" href='passwd.php'>ChangePassword</a>
					</li>
      				<li class="nav-item">
        				<a class="nav-link" href='logout.php'>Logout</a>
      				</li>
    			</ul>
  			</div>
		</nav>	  
		</header>

		<h1 class="title">Change Password</h1>

        <div class="center" style="width:500px;">
        <form method="post" action="updatepasswd.php" class="form-signin">
			<div>
				<input type="password" name="passwd1" id="passwd1" class="form-control" placeholder="Password" required autofocus>
                <input type="password" name="passwd2" id="passwd2" class="form-control" placeholder="Confirm Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			</div>
		</form>
        </div>
	</body>
</html>