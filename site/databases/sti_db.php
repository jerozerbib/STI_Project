<?php
$db = new SQLite3('./sti.db');
$res=$db->exec("CREATE TABLE USER (id INTEGER PRIMARY KEY, pseudo TEXT NOT NULL, passwd TEXT NOT NULL, validity INTEGER NOT NULL, roles TEXT NOT NULL);");
$res=$db->exec("CREATE TABLE CHAT (id INTEGER PRIMARY KEY, idsend INTEGER NOT NULL, idreceive INTEGER NOT NULL, subject TEXT NOT NULL, messages TEXT NOT NULL,  Timestamp DATETIME DEFAULT CURRENT_TIMESTAMP);");
$res=$db->exec("INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('admin', 'admin', '1' , 'admin');");
$res=$db->exec("INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('lio', 'lio', '1' , 'admin');");
$res=$db->exec("INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('jere', 'jere', '1' , 'admin');");
$res=$db->exec("INSERT INTO USER"."(pseudo, passwd, validity, roles)"."VALUES ('jee', 'jee', '1' , 'low');");
$db->close();

?>

