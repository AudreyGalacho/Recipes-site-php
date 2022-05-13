<?php
 function messageLog(){

     if (!isset($_SESSION['userLogged'])) {
         $messageWelcome ='';
         return $messageWelcome;
     } else {
        $messageWelcome = '<p> Bonjour '. $_SESSION['userLogged'].' bienvenu !!!</p>';
        echo $messageWelcome ;
        echo logOutButton();
        return;
     }
 }