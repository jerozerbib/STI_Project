<?php
require("utils.php");
session_start(); 

$idr = $_SESSION['idsend'];
$ids = $_SESSION['idreceive'];
$topic = SQLite3::escapeString($_SESSION['topic']);
$message = SQLite3::escapeString($_POST['message']);

addMessage($ids, $idr, $topic, $message);

header('Location: message.php');
?>