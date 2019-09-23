<?php
$db = new SQLite3('test.db');
$res=$db->exec("CREATE TABLE USER (id INTEGER PRIMARY KEY, firstname TEXT NOT NULL, lastname TEXT NOT NULL, pseudo TEXT NOT NULL, passwd TEXT NOT NULL);");
if($res){
    echo "Table created!!!\n";
}
else{
    echo "Oops!!! Something went wrong!!!";
}
$db->close();
?>

