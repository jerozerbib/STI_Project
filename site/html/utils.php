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

    $stmt = $db->prepare ("SELECT COUNT(*) as count FROM USER WHERE pseudo = :pseudo AND passwd = :passwd");
    $stmt->bindValue(':pseudo', $pseudo, SQLITE3_TEXT);
    $stmt->bindValue(':passwd', $passwd, SQLITE3_TEXT);
    $rows = $stmt->execute();

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
    $stmt = $db->prepare ("SELECT * FROM USER WHERE pseudo = :pseudo AND passwd = :passwd");
    $stmt->bindValue(':pseudo', $pseudo, SQLITE3_TEXT);
    $stmt->bindValue(':passwd', $passwd, SQLITE3_TEXT);
    $rows = $stmt->execute();

    $row = $rows->fetchArray();
    $db->close();

    return $row;
}

/**
 * Get pseudo with the id.
 * @param $id
 * @return mixed
 */
function getUserPseudo($id){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $stmt = $db->prepare ("SELECT pseudo FROM USER WHERE id=:id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $rows = $stmt->execute();

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
    $stmt = $db->prepare ("SELECT id FROM USER WHERE pseudo = :pseudo");
    $stmt->bindValue(':pseudo', $pseudo, SQLITE3_TEXT);
    $rows = $stmt->execute();

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
    $stmt = $db->prepare ("UPDATE USER SET passwd=:passwd, validity=:validity, roles=:role WHERE id=:id");
    $stmt->bindValue(':passwd', $passwd, SQLITE3_TEXT);
    $stmt->bindValue(':validity', $validity, SQLITE3_INTEGER);
    $stmt->bindValue(':role', $role, SQLITE3_TEXT);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();

    $db->close();
}

/**
 * Update the password with a pseudo.
 * @param $pseudo
 * @param $passwd
 */
function updatePasswd($pseudo, $passwd){

    $db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }

    $stmt = $db->prepare ("UPDATE USER SET passwd=:passwd WHERE pseudo=:pseudo");
    $stmt->bindValue(':pseudo', $pseudo, SQLITE3_TEXT);
    $stmt->bindValue(':passwd', $passwd, SQLITE3_TEXT);
    $stmt->execute();
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
    $stmt = $db->prepare("INSERT INTO CHAT"."(idsend, idreceive, subject, messages, read)"."VALUES (:ids, :idr, :subject, :message, 1)");
    $stmt->bindValue(':ids', $ids, SQLITE3_INTEGER);
    $stmt->bindValue(':idr', $idr, SQLITE3_INTEGER);
    $stmt->bindValue(':subject', $subject, SQLITE3_TEXT);
    $stmt->bindValue(':message', $message, SQLITE3_TEXT);
    $stmt->execute();
    $db->close();
}

function alreadyRead($id){

$db = new SQLite3(DB_PATH);
    if(!$db) {
        echo $db->lastErrorMsg();
    }
    $stmt = $db->prepare("UPDATE CHAT SET read=0 WHERE id=:id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();
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
    $stmt = $db->prepare("DELETE FROM CHAT WHERE id=:id");
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();
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

function generateToken( $formName ){
    $secretKey = 'gsfhs154aergz2#';
    if ( !session_id() ) {
        session_start();
    }
    $sessionId = session_id();

    return sha1( $formName.$sessionId.$secretKey );

}

function checkToken( $token, $formName ){
    return $token == generateToken( $formName );
}

class  Input {
	static $errors = true;

	/**
 	* To check whether the inputs are empty or not
 	*/		
	static function check($arr, $on = false) {
		if ($on === false) {
			$on = $_REQUEST;
		}
		foreach ($arr as $value) {	
			if (empty($on[$value])) {
				self::throwError('Data is missing', 900);
			}
		}
	}

	/**
 	* To validate integers
 	*/
	static function int($val) {
		$val = filter_var($val, FILTER_VALIDATE_INT);
		if ($val === false) {
			self::throwError('Invalid Integer', 901);
		}
		return $val;
	}

	/**
 	* To escape html characters and trim a string
 	*/
	static function str($val) {
		if (!is_string($val)) {
			self::throwError('Invalid String', 902);
		}
		$val = trim(htmlspecialchars($val));
		return $val;
	}

	/**
 	* To convert any variable to boolean
 	*/
	static function bool($val) {
		$val = filter_var($val, FILTER_VALIDATE_BOOLEAN);
		return $val;
	}

	static function throwError($error = 'Error In Processing', $errorCode = 0) {
		if (self::$errors === true) {
			throw new Exception($error, $errorCode);
		}
	}
}



