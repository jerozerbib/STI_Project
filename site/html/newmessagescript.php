<?php
require("utils.php");
session_start(); 

$ids = $_SESSION['id']; 
$idr = getID($_POST['recipient']);
$topic = $_POST['topic'];
$message = $_POST['message'];

addMessage($ids, $idr, $topic, $message);

header('Location: newmessage.php');
?>