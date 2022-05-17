<?php
 function messageLog(){

     if (!isset($_SESSION['userLogged'])) {
         $messageWelcome ='';
         return $messageWelcome;
     } else {
        $messageWelcome = '<aside class="logMessage"> Bonjour '. $_SESSION['userLogged'].' bienvenu !!!';
        echo $messageWelcome ;
        echo logOutButton() . '</aside>';
        return;
     }
 }