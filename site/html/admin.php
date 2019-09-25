<?php 
require("utils.php");
session_start(); 
verify();
verifyAdmin();
?>

<!DOCTYPE html>
<html>

	<link href="css/admin.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

		<?php include('navadmin.php'); ?>

		<h1 class="title">CHAT STI</h1>
		
	</body>
</html>