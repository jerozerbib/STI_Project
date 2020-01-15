<?php 
require("utils.php");
session_start();

if (!empty($_POST['csrf_token'])) {
    if (checkToken($_POST['csrf_token'], 'passwd')) {
        $pseudo = $_SESSION['pseudo'];
        $passwd1 = $_POST['passwd1'];
        $passwd2 = $_POST['passwd2'];

        if (isset($passwd1) && isset($passwd2) && ($passwd1 == $passwd2)) {

            updatePasswd($pseudo, $passwd1);

            header('Location: message.php');
        } else {

            header('Location: passwd.php');
        }
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}