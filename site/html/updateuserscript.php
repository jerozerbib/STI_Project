<?php
require("utils.php");
session_start();

if (!empty($_POST['csrf_token'])) {
    if (checkToken($_POST['csrf_token'], 'updateForm')) {
        // VALID TOKEN PROVIDED - PROCEED WITH PROCESS
        $id = $_SESSION['idadmin'];
        $validity = $_POST['validity'];
        $role = $_POST['roles'];
        $passwd = $_POST['passwd'];

        updateUser($id, $validity, $role, $passwd);
    }
}


header('Location: updateuserchoice.php');