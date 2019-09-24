<?php
require("utils.php");
session_start();

$pseudo = $_POST['pseudo'];
$validity = $_POST['validity'];
$roles = $_POST['roles'];
$passwd1 = $_POST['passwd1'];
$passwd2 = $_POST['passwd2'];

if(isset($pseudo) && isset($validity) && isset($roles) && isset($passwd1) && isset($passwd2) && ($passwd1 == $passwd2)){
      
    $ok = insertDatabaseAdmin($pseudo, $validity, $roles, $passwd1);

    if($ok == 1){
        $_SESSION['fail'] = true;
    }
    else{
        $_SESSION['fail'] = false;
    }
    header('Location: adduser.php');
}
else{
    
    header('Location: adduser.php');
}
exit();	
?>
