<?php
function displayAllRecipes(){
    echo 'display all recipes';
    $usersAll = getAllUsers();
    $recipesAll = getAllRecipesOrdered();
    displayListRescipes($recipesAll, $usersAll);
    
}

function displayFormLog(){
    echo 'form LOG';
    $usersAll = getAllUsers();
    isUserLogged($_POST, $usersAll);
}

function routerDefault(){
    $usersAll = getAllUsers();
    isUserLogged($_POST, $usersAll);
}
