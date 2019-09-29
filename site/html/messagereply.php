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
	
        <h1 class="title">Reply Message</h1>

		<div class="center" style="width:500px;">
            <form method="post" action="messagereplyscript.php" class="form-signin">
			    <div>
                    <?php

                    $row = messageDetails($_SESSION['idmessrep']);
                    $pseudo = getUserPseudo($row['idsend']);
                    $_SESSION['idsend'] = $row['idsend'];
                    $_SESSION['idreceive'] = $row['idreceive'];
                    $_SESSION['topic'] = $row['topic'];

                    ?>
                    <input type="text" name="recipient" id="recipient" class="form-control" value="<?php echo $pseudo ?>" disabled="disabled" required>
                    <input type="text" name="topic" id="topic" class="form-control" value="<?php echo $row['topic'] ?>" disabled="disabled" required>
				    <input type="text" name="message" id="message" class="form-control" placeholder="Message" required>
				    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
			    </div>
		    </form>
        </div>
	</body>
</html>