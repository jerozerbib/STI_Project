<?php 
require("utils.php");
session_start(); 
verify();
verifyAdmin();
?>

<!DOCTYPE html>
<html>

	<link href="css/modifyuser.css" rel="stylesheet">
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

		<h1 class="title">Modify User</h1>

		<div class="center" style="width:500px;">
			<select name="people"  class="browser-default custom-select">
			<?php

				$db = new SQLite3(DB_PATH);
				if(!$db) {
					echo $db->lastErrorMsg();
				}
				$query="SELECT * FROM USER;";
				$result=$db->query($query);
				while($row= $result->fetchArray()){
					echo '<option value="'.$row['id'] .'">'. $row['pseudo'].'</option>';
				}
				$db->close();
			?>
			</select>
		</div>
	</body>
</html>