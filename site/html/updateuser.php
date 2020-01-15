<?php
require("utils.php");
session_start();

verify();
verifyAdmin();

if (!isset($_POST['choice'])) {
    header('Location: updateuserchoice.php');
}
?>

<!DOCTYPE html>
<html>

<link href="css/updateuser.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>

<?php include('nav.php'); ?>

<h1 class="title">Update User</h1>

<div class="center" style="width:500px;">
    <?php

    $choice = $_POST['choice'];

    $db = new SQLite3(DB_PATH);
    if (!$db) {
        echo $db->lastErrorMsg();
    }
    $query = "SELECT * FROM USER WHERE id='$choice';";
    $result = $db->query($query);
    $row = $result->fetchArray();

    $_SESSION['idadmin'] = $choice;


    if (!empty($_POST['csrf_token'])) {
        if (checkToken($_POST['csrf_token'], 'updateChoice')) {
            // valid form, continue
            echo '<form method="post" action="updateuserscript.php" class="form-signin">';
            echo '<div class="form-group row">';
            echo '<label for="pseudo "class="col-sm-2 col-form-label">Pseudo</label>';
            echo '<div class="col-sm-10">';
            echo '<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo" value="' . utf8_decode($row['pseudo']) . '" disabled="disabled" required autofocus>';
            echo '</div>';
            echo '</div>';
            echo '<div class="form-group row">';
            echo '<label for="validity"class="col-sm-2 col-form-label">Validity</label>';
            echo '<div class="col-sm-10">';
            echo '<input type="text" name="validity" id="validity" class="form-control" placeholder="Validity" value="' . $row['validity'] . '" required>';
            echo '</div>';
            echo '</div>';
            echo '<div class="form-group row">';
            echo '<label for="roles"class="col-sm-2 col-form-label">Role</label>';
            echo '<div class="col-sm-10">';
            echo '<input type="text" name="roles" id="roles" class="form-control" placeholder="Role" value="' . $row['roles'] . '" required>';
            echo '</div>';
            echo '</div>';
            echo '<div class="form-group row">';
            echo '<label for="passwd"class="col-sm-2 col-form-label">Password</label>';
            echo '<div class="col-sm-10">';
            echo '<input type="password" name="passwd" id="passwd" class="form-control" placeholder="Password"  value="' . $row['passwd'] . '" required>';
            echo '<input type="hidden" name="csrf_token" value="<?php echo generateToken(\'updateForm\'); ?>"/>';
            echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>';
            echo '</form>';
        } else {
            header('Location: index.php');
        }
    } else {
        header('Location: index.php');
    }

    $db->close();
    ?>
</div>
</body>
</html>