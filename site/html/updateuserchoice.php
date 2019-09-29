<?php 
require("utils.php");
session_start(); 
verify();
verifyAdmin();
?>

<!DOCTYPE html>
<html>

	<link href="css/updateuserchoice.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

		<?php include('nav.php'); ?>

		<h1 class="title">Update User</h1>

		<div class="center" style="width:500px;">
		<form method="post" action="updateuser.php">
			<select name="choice"  class="browser-default custom-select">
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
			<div>
					<button type="submit" class="btn btn-lg btn-primary btn-block">Choice</button>
			</div>
		</form>
		</div>
	</body>
</html>