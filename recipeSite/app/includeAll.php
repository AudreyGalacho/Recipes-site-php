<?
//Connexion BDD
    include_once('app/database.php');

//Toutes les requêtes sql necessaire 
    include_once('repository/users.php');
    include_once('repository/recipes.php');
    include_once('repository/verifForms.php');

//Navigation Url
    include_once('views/routerDirection.php');
    include_once('views/routerRedir.php');

//Affichage
    include_once('views/recipes/displayRecipe.php');
    include_once('views/recipes/listAllRecipesEnabled.php');
    include_once('html/errorMessages.php');



    
