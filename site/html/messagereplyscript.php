<?php
require("utils.php");
session_start(); 

$idr = $_SESSION['idsend'];
$ids = $_SESSION['idreceive'];
$topic = $_SESSION['topic'];
$message = $_POST['message'];

addMessage($ids, $idr, $topic, $message);

header('Location: message.php');
?>