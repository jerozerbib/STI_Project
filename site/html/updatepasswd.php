<?php 
require("utils.php");
session_start(); 

$pseudo = $_SESSION['pseudo'];
$passwd1 = $_POST['passwd1'];
$passwd2 = $_POST['passwd2'];

if(isset($passwd1) && isset($passwd2) && ($passwd1==$passwd2)){

    updatePasswd($pseudo, $passwd1);

    header('Location: menu.php');
}
else{

    header('Location: passwd.php');
}
?>