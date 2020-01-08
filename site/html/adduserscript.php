<?php
require("utils.php");
session_start();

$pseudo = Input::str($_POST['pseudo']);
$validity = Input::int($_POST['validity']);
$roles = Input::str($_POST['roles']);
$passwd1 = Input::str($_POST['passwd1']);
$passwd2 = Input::str($_POST['passwd2']);

if(isset($pseudo) && isset($validity) && isset($roles) && isset($passwd1) && isset($passwd2) && ($passwd1 == $passwd2)){
      
    $ok = insertUser($pseudo, $validity, $roles, $passwd1);

    if($ok == 1){
        $_SESSION['fail'] = true;
    }
    header('Location: adduser.php');
}
else{
    
    header('Location: adduser.php');
}
?>
