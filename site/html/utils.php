<?php

const DB_PATH='/usr/share/nginx/databases/test.db'; 

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

function updateUser($id, $validity, $role, $passwd){

    $db = new SQLite3(DB_PATH);

    if(!$db) {
        echo $db->lastErrorMsg();
    }
    
    $db->query("UPDATE USER SET passwd='$passwd', validity='$validity', roles='$role' WHERE id='$id'");
    $db->close();
}

function updatePasswd($pseudo, $passwd){

    $db = new SQLite3(DB_PATH);

    if(!$db) {
        echo $db->lastErrorMsg();
    }
    
    $db->query("UPDATE USER SET passwd='$passwd' WHERE pseudo='$pseudo'");
    $db->close();
}

function deleteUser($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }

    $db->query("DELETE FROM USER WHERE  id = '$id'");
    $db->close();
}

function insertUser($pseudo, $validity, $roles, $passwd){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }

    $rows = $db->query("SELECT COUNT(*) as count FROM USER WHERE pseudo = '$pseudo'");
    $row = $rows->fetchArray();
    $numRows = $row['count'];

    if($numRows == 0){
        $query="INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('$pseudo','$passwd', '$validity' , '$roles');";
        $db->exec($query);
    }
    $db->close();

    return $numRows;
}

function changeValidity($pseudo, $validity){

    $db = new SQLite3(DB_PATH);

    if(!$db) {
        echo $db->lastErrorMsg();
    }
    
    $db->query("UPDATE USER SET validity='$validity' WHERE pseudo='$pseudo'");
    $db->close();
}


function readMessage(){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
     } else {
        echo "Opened database successfully\n";
     }
    $query="SELECT * FROM CHAT ORDER BY Timestamp;";
    $result=$db->query($query);
	while($row= $result->fetchArray()){
					echo $row['messages']."\n";
	}
    $db->close();
}

function messageDetails($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $query="SELECT * FROM CHAT WHERE id='$id';";
    $result=$db->query($query);
	$row= $result->fetchArray();
    $db->close();

    return $row;
}

function addMessage($ids, $idr, $topic, $message){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }
    $query="INSERT INTO CHAT"."(idsend, idreceive, topic, messages)"."VALUES ('$ids','$idr', '$topic', '$message');";
    $db->exec($query);
    $db->close();
}

function deleteMessage($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "Opened database successfully\n";
    }
    $query="DELETE FROM CHAT WHERE  id = '$id';";
    $db->exec($query);
    $db->close();
}

function read(){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
     } else {
        echo "Opened database successfully\n";
     }
    $query="SELECT * FROM CHAT;";
    $result=$db->query($query);
	while($row= $result->fetchArray()){
                    echo  $row['idsend'] ."\t". $row['idreceive'] ."\t". $row['messages']."\r\n";
                    echo "</br>";
	}
    $db->close();
    return $result;
}

function verify(){

    if (!isset($_SESSION['connec']) && $_SESSION['conec'] != true){
		
	    header('Location: index.php');
    }
}

function verifyAdmin(){

    if (isset($_SESSION['roles']) && $_SESSION['roles'] != 'admin' ){
		
        header('Location: message.php');
    }
}
?>