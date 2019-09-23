<?php

const DB_PATH='/Applications/MAMP/htdocs/site/databases/test.db'; 

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


function insertDatabase($firstname, $lastname, $pseudo, $passwd){

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
        $query="INSERT INTO USER"."(firstname, lastname, pseudo, passwd)"."VALUES ('$firstname','$lastname','$pseudo','$passwd');";
        $db->exec($query);
    }
    $db->close();

    return $numRows;
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
    echo "nickname\tpassewd\n";
    while($row= $result->fetchArray()){
        echo $row['id'] . "\t". $row['pseudo'] . "\t".
        $row['passwd'] ."\n";
    }
    $db->close();
}

?>