<?php
 function messageLog(){

     if (!isset($_SESSION['userLogged'])) {
        // var_dump($_SESSION['userLogged']);

         $messageWelcome = include('html/users/userLogIn.php');
         return $messageWelcome;
     } else {
        $messageWelcome = '<aside class="logMessage"><p> Bonjour '. $_SESSION['userLogged'].' bienvenu !!!</p>';
        echo $messageWelcome ;
        echo logOutButton() . '</aside>';
        return;
     }
 }