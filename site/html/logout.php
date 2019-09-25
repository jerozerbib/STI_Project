<?php
require("utils.php");
session_start();
changeValidity($_SESSION['pseudo'], 0);
session_unset();
session_destroy();
header('location: index.php');

?>