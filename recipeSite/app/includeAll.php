<?
//Connexion BDD
    require('app/database.php');

//Toutes les requêtes sql necessaires 
    require('model/users.php');
    require('model/recipes.php');

//Navigation Url
    require('views/router_switcher.php');
//Security Log
    require('security/users.php');

//Affichage Recipes
    require ('views/html/recipes/displayRecipe.php');
    require('views/html/recipes/displayButtons.php');
    require('controller/recipes.php');

//Affichage autre
    
    include_once('views/html/windows/messages.php');



    
