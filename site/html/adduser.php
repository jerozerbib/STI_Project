<?php 
require("utils.php");
session_start(); 
verify();
verifyAdmin();

if(isset($_SESSION['fail']) && $_SESSION['fail'] == true){

	$message='Pseudo already exist';
	echo '<script type="text/javascript">alert("'.$message.'");</script>';
}

?>

<!DOCTYPE html>
<html>

	<link href="css/adduser.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

		<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
    			<ul class="navbar-nav">
                    <li class="nav-item">
        				<a class="nav-link" href='adduser.php'>Chat</a>
      				</li>
                    <li class="nav-item">
        				<a class="nav-link" href='adduser.php'>AddUser</a>
      				</li>
                    <li class="nav-item">
        				<a class="nav-link" href='modifyuser.php'>ModifyUser</a>
      				</li>
                    <li class="nav-item">
        				<a class="nav-link" href='deleteuser.php'>DeleteUser</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href='logout.php'>Logout</a>
      				</li>
    			</ul>
  			</div>
		</nav>	  
		</header>

		<h1 class="title">Add User</h1> 
		
        <div class="adduserpad" style="width:500px;">
		<form method="post" action="newregisteradmin.php" class="form-signin">
			<div>
				<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
                <input type="text" name="validity" id="validity" class="form-control" placeholder="Validity" required>
                <input type="text" name="roles" id="roles" class="form-control" placeholder="Role" required>
                <input type="password" name="passwd1" id="passwd1" class="form-control" placeholder="Password" required>
                <input type="password" name="passwd2" id="passwd2" class="form-control" placeholder="Repeted Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
			</div>
		</form>
        </div>
	</body>
</html>