<?php
require("utils.php");
session_start(); 

$id = $_SESSION['idadmin'];
$pseudo = $_POST['pseudo'];
$validity = $_POST['validity'];
$role = $_POST['roles'];
$passwd= $_POST['passwd'];

updateUser($id, $pseudo, $validity, $role, $passwd);

header('Location: updateuserchoice.php');
?>