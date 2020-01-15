<?php
require("utils.php");
session_start();

if (!empty($_POST['csrf_token'])) {
    if (checkToken($_POST['csrf_token'], 'messageReply')) {
        $idr = $_SESSION['idsend'];
        $ids = $_SESSION['idreceive'];
        $subject = $_SESSION['subject'];
        $message = SQLite3::escapeString(utf8_encode(Input::str($_POST['message'])));
        addMessage($ids, $idr, $subject, $message);
    } else {
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

header('Location: message.php');
