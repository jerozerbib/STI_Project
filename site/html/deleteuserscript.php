<?php
require("utils.php");
session_start(); 

foreach($_POST['del'] as $checkbox){
    deleteUser(intval($checkbox));
}

header('Location: deleteuser.php');