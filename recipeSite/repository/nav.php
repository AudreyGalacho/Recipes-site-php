<?php
    function goToHome(){
        
        echo ' On est dans la fonction go home ';
        
        var_dump($_SESSION['pageNav']);
        $_SESSION['pageNav']='Recettes';
        echo $_SESSION['pageNav'];
        include_once('views/router.php');
        
    }
?>