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

		<?php include('navadmin.php'); ?>	

		<h1 class="title">Delete User</h1>
        
		<div class="centerform">
			<form method="post" action="deleteuseradmin.php">
				
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