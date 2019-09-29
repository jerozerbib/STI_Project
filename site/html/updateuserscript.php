<?php
require("utils.php");
session_start(); 

$id = $_SESSION['idadmin'];
$validity = $_POST['validity'];
$role = $_POST['roles'];
$passwd= $_POST['passwd'];

updateUser($id, $validity, $role, $passwd);

header('Location: updateuserchoice.php');
?>