<?php
require("utils.php");
session_start();

if (!empty($_POST['csrf_token'])) {
    if (checkToken($_POST['csrf_token'], 'message') || checkToken($_POST['csrf_token'], 'messageReply') || checkToken($_POST['csrf_token'], 'messageDetail') ) {
        foreach($_POST['up'] as $update){

            if(isset($update)){

                $sub = substr($update, 0, 3);
                $id = substr($update, 4);

                echo $id;

                if($sub == 'rep'){

                    $_SESSION['idmessrep'] = $id;
                    header('Location: messagereply.php');

                }
                else if($sub == 'del'){

                    deleteMessage($id);
                    header('Location: message.php');

                }
                else if($sub == 'det'){

                    $_SESSION['idmessdet'] = $id;
                    header('Location: messagedetail.php');
                }
            }
        }
    } else{
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}