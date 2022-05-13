<?php
 function messageLog(){

     if (!isset($_SESSION['userLogged'])) {
         $messageWelcome ='';
         return $messageWelcome;
     } else {
        // var_dump($_SESSION['userLogged']);
        $messageWelcome = '<p> Bonjour '. $_SESSION['userLogged'].' bienvenu !!!</p>';
        echo $messageWelcome;
        return;
     }
 }