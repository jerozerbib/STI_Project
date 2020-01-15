<?php 
require("utils.php");
session_start(); 
verify();
?>
<!DOCTYPE html>
<html>

	<link href="css/messagereply.css" rel="stylesheet">
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
                    $_SESSION['idsend'] = utf8_decode($row['idsend']);
                    $_SESSION['idreceive'] = utf8_decode($row['idreceive']);
                    $_SESSION['subject'] = utf8_decode($row['subject']);

                    ?>
                    <input type="text" name="to" id="to" class="form-control" value="To : <?php echo utf8_decode($pseudo) ?>" disabled="disabled" required>
                    <input type="text" name="subject" id="subject" class="form-control" value="Re : <?php echo utf8_decode($row['subject']) ?>" disabled="disabled" required>
                    <input type="hidden" name="csrf_token" value="<?php echo generateToken('messageReply'); ?>"/>
				    <textarea type="text" name="message" id="message" class="form-control" placeholder="Message" required></textarea>
				    <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
			    </div>
		    </form>
        </div>
	</body>
</html>