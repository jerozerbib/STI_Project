<?php
require("utils.php");
session_start();

if (isset($_SESSION['connec']) && $_SESSION['connec'] == true){
		
	header('Location: menu.php');
}

$pseudo = $_POST['pseudo'];
$passwd1 = $_POST['passwd1'];
$passwd2 = $_POST['passwd2'];

if(isset($pseudo) && isset($passwd1) && isset($passwd2) && ($passwd1 == $passwd2)){
      
    $ok = insertDatabase($pseudo, $passwd1);

    if($ok == 1){
        
        $_SESSION['fail'] = true;
        header('Location: register.php');
    }
    else{

        $_SESSION['fail'] = false;
        header('Location: index.php');
    }
}
else{
    
    header('Location: register.php');
}
exit();	
?>
