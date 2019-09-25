<?php
$db = new SQLite3('test.db');
$res=$db->exec("CREATE TABLE USER (id INTEGER PRIMARY KEY, pseudo TEXT NOT NULL, passwd TEXT NOT NULL, validity INTEGER NOT NULL, roles TEXT NOT NULL);");
if($res){
    echo "Table created!!!\n";
}
else{
    echo "Oops!!! Something went wrong!!!";
}
$res=$db->exec("CREATE TABLE CHAT (id INTEGER PRIMARY KEY, idsend INTEGER NOT NULL, idreceive INTEGER NOT NULL, messages TEXT NOT NULL);");
if($res){
    echo "Table created!!!\n";
}
else{
    echo "Oops!!! Something went wrong!!!";
}
$res=$db->exec("INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('admin', 'admin', '1' , 'admin');");
if($res){
    echo "User created!!!\n";
}
else{
    echo "Oops!!! Something went wrong!!!";
}
$res=$db->exec("INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('lio', 'lio', '1' , 'low');");
if($res){
    echo "User created!!!\n";
}
else{
    echo "Oops!!! Something went wrong!!!";
}
$db->close();
?>

