<?php
 echo 'bienvenu dans le ROOOOOOOTIIINNNG';
 echo $_SESSION['pageNav'];
    switch ($_SESSION['pageNav']) 
    {
        case 0: // dans le cas où $page vaut 0
            echo ' LE CAS DES RECETTEs';

            include("/Users/buutt/Documents/WEB-DEV/first-repository/recipeSite/views/recipes/listAllRecipesEnabled.php");
            echo 'Tout est inclus';
            $userAll = getAllUsers();
            $recipesAll = getAllRecipesOrdered();
            displayAllRescipes($recipesAll, $usersAll);
            break;
        
        case 1: // dans le cas où $page vaut 1
        echo 'Y a rien pour le moment';
        break;
        
        default:
        echo 'PAR DEFAULT';
        
    }

?>