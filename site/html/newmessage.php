<?php 
require("utils.php");
session_start(); 
verify();
?>
<!DOCTYPE html>
<html>

	<link href="css/newmessage.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

		<?php include('nav.php'); ?>
	
        <h1 class="title">New Message</h1>

		<div class="center" style="width:500px;">
            <form method="post" action="newmessagescript.php" class="form-signin">
			    <div>
                    <input type="text" name="to" id="to" class="form-control" placeholder="To" required>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
				    <textarea type="text" name="message" id="message" class="form-control" placeholder="Message" required></textarea>
				    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
			    </div>
		    </form>
        </div>
	</body>
</html>