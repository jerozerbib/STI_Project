<?php
require("utils.php");

session_start(); 

$pseudo = $_POST['pseudo'];
$passwd = $_POST['passwd'];

if(isset($pseudo) && isset($passwd)){
    
    if(connect($pseudo, $passwd) == 1){
            
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['connec'] = true;
        
		header('Location: menu.php');
    }
    else{
        echo '<script>alert("Fail")</script>';
	    header('Location: index.php');
    }
    exit();
}
?>
