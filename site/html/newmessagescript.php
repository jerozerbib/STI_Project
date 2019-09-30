<?php
require("utils.php");
session_start(); 

$ids = $_SESSION['id']; 
$idr = getID($_POST['to']);
$subject = SQLite3::escapeString($_POST['subject']);
$message = SQLite3::escapeString($_POST['message']);

addMessage($ids, $idr, $subject, $message);

header('Location: newmessage.php');
?>