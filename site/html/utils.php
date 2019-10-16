<?php

const DB_PATH='/usr/share/nginx/databases/sti.db'; 

/*
* Verify if the couple pseudo password exist.
*/
function connect($pseudo, $passwd){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $rows = $db->query("SELECT COUNT(*) as count FROM USER WHERE pseudo = '$pseudo' AND passwd = '$passwd'");
    $row = $rows->fetchArray();
    $db->close();
    $numRows = $row['count'];

    return  $numRows;
}

/**
 * Get every fields form a user with a pseudo and a password.
 */
function getUser($pseudo, $passwd){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $rows = $db->query("SELECT * FROM USER WHERE pseudo = '$pseudo' AND passwd = '$passwd'");
    $row = $rows->fetchArray();
    $db->close();

    return $row;
}

/**
 * Get pseudo with the id.
 */
function getUserPseudo($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $rows = $db->query("SELECT pseudo FROM USER WHERE id = '$id'");
    $row = $rows->fetchArray();
    $db->close();

    return $row['pseudo'];
}

/**
 * Get the id with a pseudo.
 */
function getID($pseudo){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $rows = $db->query("SELECT id FROM USER WHERE pseudo = '$pseudo'");
    $row = $rows->fetchArray();
    $db->close();

    return $row['id'];
}

/**
 * Update an existing user.
 */
function updateUser($id, $validity, $role, $passwd){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $db->query("UPDATE USER SET passwd='$passwd', validity='$validity', roles='$role' WHERE id='$id'");
    $db->close();
}

/**
 * Update the password with a pseudo.
 */
function updatePasswd($pseudo, $passwd){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $db->query("UPDATE USER SET passwd='$passwd' WHERE pseudo='$pseudo'");
    $db->close();
}

/**
 * Delete a user with the id and all messages he receive.
 */
function deleteUser($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $db->query("DELETE FROM USER WHERE  id = '$id'");
    $db->query("DELETE FROM CHAT WHERE  idreceive = '$id'");
    $db->close();
}

/**
 * Insert a new user if the pseudo is not already used.
 */
function insertUser($pseudo, $validity, $roles, $passwd){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $rows = $db->query("SELECT COUNT(*) as count FROM USER WHERE pseudo = '$pseudo'");
    $row = $rows->fetchArray();
    $numRows = $row['count'];

    if($numRows == 0){
        $query="INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('$pseudo','$passwd', '$validity' , '$roles')";
        $db->exec($query);
    }
    $db->close();

    return $numRows;
}

/**
 * Return details message with the id
 */
function messageDetails($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $query="SELECT * FROM CHAT WHERE id='$id'";
    $result=$db->query($query);
	$row= $result->fetchArray();
    $db->close();

    return $row;
}

/**
 * Add a new message with an the sender id, receiver id, the subject and the message.
 */
function addMessage($ids, $idr, $subject, $message){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $query="INSERT INTO CHAT"."(idsend, idreceive, subject, messages, read)"."VALUES ('$ids','$idr', '$subject', '$message', 1)";
    $db->exec($query);
    $db->close();
}

function alreadyRead($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $query="UPDATE CHAT SET read=0 WHERE id='$id'";
    $db->exec($query);
    $db->close();
}

/**
 * Delete a message from the database with the id
 */
function deleteMessage($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $query="DELETE FROM CHAT WHERE id='$id'";
    $db->exec($query);
    $db->close();
}

/**
 * Verify if someone is connected or not to access pages
 */
function verify(){

    if (!isset($_SESSION['connec']) && $_SESSION['conec'] != true){
		
	    header('Location: index.php');
    }
}

/**
 * Verify if someone is an admin or not to access pages
 */
function verifyAdmin(){

    if (isset($_SESSION['roles']) && $_SESSION['roles'] != 'admin' ){
		
        header('Location: message.php');
    }
}
?>