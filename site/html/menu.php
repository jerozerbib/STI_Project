<?php 
require("utils.php");
session_start(); 
verify();
?>

<!DOCTYPE html>
<html>

	<link href="css/menu.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

		<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav">
                    <li class="nav-item">
        				<a class="nav-link" href='#'>OSEF</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href='logout.php'>Logout</a>
      				</li>
    			</ul>
  			</div>
		</nav>	  
		</header>

		<h1 class="title">CHAT STI</h1>
		
	</body>
</html>
