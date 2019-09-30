<?php
require("utils.php");
session_start(); 

$idr = $_SESSION['idsend'];
$ids = $_SESSION['idreceive'];
$subject = SQLite3::escapeString($_SESSION['subject']);
$message = SQLite3::escapeString($_POST['message']);

addMessage($ids, $idr, $subject, $message);

header('Location: message.php');
?>