<?php
require("utils.php");
session_start(); 

$ids = $_SESSION['id']; 
$idr = getID(Input::str($_POST['to']));
$subject = SQLite3::escapeString(utf8_encode(Input::str($_POST['subject'])));
$message = SQLite3::escapeString(utf8_encode(Input::str($_POST['message'])));

addMessage($ids, $idr, $subject, $message);

header('Location: newmessage.php');
?>
