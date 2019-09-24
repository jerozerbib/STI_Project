<?php 
require("utils.php");
session_start(); 
verify();
verifyAdmin();
?>

<!DOCTYPE html>
<html>

	<link href="css/deleteuser.css" rel="stylesheet">
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

		<h1 class="title">Delete User</h1>
        
		<div class="centerform">
			<form method="post" action="delete.php">
				
				<?php
				$db = new SQLite3(DB_PATH);
				if(!$db) {
					echo $db->lastErrorMsg();
				}
				$query="SELECT * FROM USER;";
				$result=$db->query($query);
				while($row= $result->fetchArray()){
					echo '<div class="custom-control custom-checkbox">';
					echo '<input class="custom-control-input" type="checkbox" name="del[]" id="'.$row['id'] .'" value="'.$row['id'] .'">'."\n";
					echo '<label class="custom-control-label" for="'. $row['id'] .'">'. $row['pseudo'].'</label>'."\n";
					echo '</div>';
				}
				$db->close();
				?>

				<div>
					<button type="submit" class="btn btn-lg btn-primary btn-block">Delete</button>
				</div>
			</form>
		</div>
	</body>
</html>