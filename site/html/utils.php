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


function insertDatabase($pseudo, $passwd){

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
        $query="INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('$pseudo','$passwd', '1' , 'regular');";
        $db->exec($query);
    }
    $db->close();

    return $numRows;
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

function insertDatabaseAdmin($pseudo, $validity, $roles, $passwd){

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

function changeStatut($pseudo, $validity){

    $db = new SQLite3(DB_PATH);

    if(!$db) {
        echo $db->lastErrorMsg();
    }
    
    $db->query("UPDATE USER SET validity='$validity' WHERE pseudo='$pseudo'");
    $db->close();
}

function read(){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
     } else {
        echo "Opened database successfully\n";
     }
    $query="SELECT * FROM USER;";
    $result=$db->query($query);
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
		
        header('Location: menu.php');
    }
}
?>