<?php 
require("utils.php");
session_start(); 
verify();
?>
<!DOCTYPE html>
<html>

	<link href="css/messagedetail.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<body>

	<?php include('nav.php'); ?>	
		
    <h1 class="title">Message Details</h1>

     <div class="diff">
            <?php
                $id = $_SESSION['idmessdet'];
                $db = new SQLite3(DB_PATH);
                if(!$db) {
                    echo $db->lastErrorMsg();
                }
                $query="SELECT * FROM CHAT WHERE id='$id';";
                $result=$db->query($query);
                while($row= $result->fetchArray()){
                    $_SESSION['alreadyread'] = $row['id'];
                    echo '<div>';
                    echo '<div style="padding-top: 20px;">Date : '.$row['Timestamp']. '</div>';
                    echo '<div>From : '.utf8_decode(getUserPseudo($row['idsend'])). '</div>';
                    echo '<div>Subject : '.utf8_decode($row['subject']).'</div>';
                    echo '<div>Message :</div>';
                    echo '<textarea class="form-control" style="width:300px; min-height:100px;" disabled>'.utf8_decode($row['messages']).'</textarea>';
                    echo '<form action="messagescript.php" method="post">';
                    echo '<input type="hidden" name="csrf_token" value="<?php echo generateToken(\'messageDetail\'); ?>"/>';
                    echo '<div style="width:300px;">';
                    echo '<button class="btn btn-primary btn-block" type="submit" name="up[]" value="rep_'.$row['id'].'">Reply</button>';
                    echo '</div>';
                    echo '<div style="width:300px;">';
                    echo '<button class="btn btn-primary btn-block" type="submit" name="up[]" value="del_'.$row['id'].'">Delete</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</form>';
                }
                $db->close();
                alreadyRead($_SESSION['alreadyread']);
            ?>
        </div>
	</body>
</html>