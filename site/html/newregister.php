<?php
require("utils.php");
session_start();

if (isset($_SESSION['connec']) && $_SESSION['connec'] == true){
		
	header('Location: menu.php');
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$pseudo = $_POST['pseudo'];
$passwd1 = $_POST['passwd1'];
$passwd2 = $_POST['passwd2'];

if(isset($firstname) && isset($lastname) && isset($pseudo) && isset($passwd1) && isset($passwd2) && ($passwd1 == $passwd2)){
      
    $ok = insertDatabase($firstname, $lastname, $pseudo, $passwd1);

    if($ok == 1){

        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['fail'] = true;
        header('Location: register.php');
    }
    else{

        $_SESSION['fail'] = false;
        header('location: index.php');
    }
}
else{
    
    header('Location: register.php');
}
exit();	
?>
