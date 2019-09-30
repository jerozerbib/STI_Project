<?php
require("utils.php");
session_start(); 

$ids = $_SESSION['id']; 
$idr = getID($_POST['recipient']);
$topic = SQLite3::escapeString($_POST['topic']);
$message = SQLite3::escapeString($_POST['message']);

addMessage($ids, $idr, $topic, $message);

header('Location: newmessage.php');
?>