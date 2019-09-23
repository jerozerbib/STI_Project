<?php

require("utils.php");

session_start();

read();

?>
<!DOCTYPE html>
<html>
	<body>
		<form method="post" action="logout.php" class="form-signin">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Logout</button>
				</div>
			</div>
		</form>
	</body>
</html>
