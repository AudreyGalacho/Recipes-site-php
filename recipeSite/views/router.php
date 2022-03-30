<?php

function router($destination){
    echo ' ROOOOOOOTIIINNNG ';
    echo $_SESSION['pageNav'];
    
    if (isset($_SESSION['pageNav'])){
        $destination = $_SESSION['pageNav'];
    }   
    switch ($destination) 
    {
        case 'Recettes': // Acceuil
            echo ' LE CAS DES RECETTES ';

            include_once('recipes/listAllRecipesEnabled.php');
            
            
            $usersAll = getAllUsers();
            $recipesAll = getAllRecipesOrdered();
            displayAllRescipes($recipesAll, $usersAll);
            $_SESSION['pageNav'] = 'nop';
            break;
        
        case 'Contact': // Formulaire de contact
            echo ' Le formulaire de contact ';
            include_once('users/displayForms.php');
            $formContact = displayFormContact();
            echo $formContact;
            $_SESSION['pageNav'] = 'nop';
            break;

        case 'LOG':
            $usersAll = getAllUsers();
            isUserLogged($_POST, $usersAll);
            break;

        // case '': // 
        //     echo ' Le formulaire de recette ';
        //     include_once('users/displayForms.php');
        //     $formRecipe = displayFormRecipe();
        //     echo $formRecipe;
        //     $_SESSION['pageNav']='';
        //     break;
        
        default:
            echo 'PAR DEFAULT';
            $usersAll = getAllUsers();
            isUserLogged($_POST, $usersAll);
            break;
        
    }
}
