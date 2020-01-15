<?php 
require("utils.php");
session_start(); 
verify();
verifyAdmin();

if(isset($_SESSION['fail']) && $_SESSION['fail'] == true){

	$message='Pseudo already exist';
	echo '<script type="text/javascript">alert("'.$message.'");</script>';
	$_SESSION['fail'] = false;
}
?>

<!DOCTYPE html>
<html>

	<link href="css/adduser.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

		<?php include('nav.php'); ?>

		<h1 class="title">Add User</h1> 
		
        <div class="adduserpad" style="width:500px;">
		<form method="post" action="adduserscript.php" class="form-signin">
			<div>
				<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" required autofocus>
                <input type="text" name="validity" id="validity" class="form-control" placeholder="Validity" required>
                <input type="text" name="roles" id="roles" class="form-control" placeholder="Role" required>
                <input type="password" name="passwd1" id="passwd1" class="form-control" placeholder="Password" required>
                <input type="password" name="passwd2" id="passwd2" class="form-control" placeholder="Confirm Password" required>
                <input type="hidden" name="csrf_token" value="<?php echo generateToken('add'); ?>"/>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
			</div>
		</form>
        </div>
	</body>
</html>